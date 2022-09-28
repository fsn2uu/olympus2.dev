<?php
use App\Property;

Route::get('/units/create', function(){
    return view('units.create');
});

Route::get('/', function () {
    $prop = Property::all();
    foreach($prop as $k)
    {
        dd(array_keys($k->toArray()));
    }
});

Route::get('/test', function(){
    $config = new \PHRETS\Configuration;
            $config->setLoginUrl('http://parmls.rets.paragonrels.com/rets/fnisrets.aspx/PARMLS/login?rets-version=rets/1.7.2')
            ->setUsername('CYBERSYTES')
            ->setPassword('94cAt35')
            ->setRetsVersion('1.7.2');
            $rets = new \PHRETS\Session($config);

            $connect = $rets->Login();
    
    $imgs = $rets->GetObject('Property', 'Photo', 236600, '*', 1);
    foreach($imgs as $img)
    {
        echo $img->getLocation().'<br>';
    }
});

Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/feed-settings', function(){
        return view('admin.feedSettings');
    });
    Route::resource('connections', 'ConnectionsController');
    Route::get('connections/{id}/translation/create',[
        'as' => 'translation.create',
        'uses' => 'ConnectionsController@translationCreate',
    ]);
    Route::post('connections/{id}/translation/create',[
        'uses' => 'ConnectionsController@translationStore',
    ]);
    Route::resource('properties', 'PropertiesController');
});
