<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use App\Connection;
use App\Property;
use App\Translation;

class RetsFullImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RETSFullImport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs a full import of the RETS database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Schema::dropIfExists('properties');

        foreach(Connection::all() as $connection)
        {
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl($connection->url)
            ->setUsername($connection->username)
            ->setPassword($connection->password)
            ->setRetsVersion('1.7.2');
            $rets = new \PHRETS\Session($config);

            $connect = $rets->Login();

            $system = $rets->GetSystemMetadata();
            // var_dump($system);

            $resources = $system->getResources();
            //dd($resources);
            $classes = $resources->first()->getClasses();

            foreach($classes as $class => $no)
            {
                $properties = $rets->Search('Property', $class, '(L_Status=|1_0)', ['Limit' => 10]);

                foreach($properties as $prop)
                {
                    $prop = $prop->toArray();

                    $translation = Translation::where('connection_id', $connection->id)->where('class', $class)->get();

                    if($translation->count() >= 1)
                    {
                        $translation = $translation->toArray();
                        $translation = $translation[0];

                        foreach($prop as $k => $v)
                        {
                            if(array_key_exists($k, $translation))
                            {
                                $prop[$translation[$k]] = $v;
                                unset($prop[$k]);
                            }
                        }
                    }

                    //$obj = $rets->GetObject('Property', 'Supplement', $r['LIST_1']);

                    $imgs = $rets->GetObject('Property', 'Photo', $prop['mls_acct'], '*', 1);
                    if($imgs)
                    {
                        $prop['photos'] = [];
                        foreach($imgs as $img)
                        {
                            $img_arr = [];
                            $img_arr['location'] = $img->getLocation();
                            $img_arr['priority'] = $img->getObjectId();
                            $prop['photos'][] = $img_arr;
                        }
                    }

                    $prop['association'] = $connection->name;

                    Property::create($prop);
                }
            }
        }

        $this->info('RETS import complete.');
    }
}
