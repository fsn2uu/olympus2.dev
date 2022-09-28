<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;
use App\Translation;

class ConnectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $connections = Connection::all();

        return view('admin.connections.index')
            ->withConnections($connections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.connections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
        $connection = Connection::create($request->except(['_method', '_token']));

        return redirect()->route('admin.connections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $connection = Connection::find($id);
        
        return view('admin.connections.show')
            ->withConnection($connection);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function translationCreate($id)
    {
        $connection = Connection::find($id);
        
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($connection->url)
                ->setUsername($connection->username)
                ->setPassword($connection->password)
                ->setRetsVersion('1.7.2');
        $rets = new \PHRETS\Session($config);

        $connect = $rets->Login();

        $classes = $rets->GetClassesMetadata('Property');
        $classes = array_keys($classes->toArray());
        
        return view('admin.connections.translationCreate')
            ->withConnection($connection)
            ->withClasses($classes);
    }
    
    public function translationStore(Request $request)
    {
        //dd($request);
        $translation = Translation::create($request->except(['_method', '_token']));
        
        return redirect()->route('admin.connections.index');
    }
}
