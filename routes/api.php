<?php

use Illuminate\Http\Request;
use App\Property;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/RETS-get-fields', function(Request $request){
    $config = new \PHRETS\Configuration;
    $config->setLoginUrl($request->url)
            ->setUsername($request->username)
            ->setPassword($request->password)
            ->setRetsVersion('1.7.2');
    $rets = new \PHRETS\Session($config);

    $connect = $rets->Login();

//    $classes = $rets->GetClassesMetadata('Property');
//    $classes = array_keys($classes->toArray());
//    $keys = [];
//
//    foreach($classes as $class)
//    {
//        $keys[$class] = $fields = $rets->GetTableMetadata('Property', $class)->toArray();
//    }
    $keys = $rets->getTableMetadata('Property', $request->class)->toArray();
    return json_encode($keys);
});

Route::post('/RETS-test-connection', function(Request $request){
    try {
        $config = new \PHRETS\Configuration;
        $config->setLoginUrl($request->url)
        ->setUsername($request->username)
        ->setPassword($request->password)
        ->setRetsVersion('1.7.2');
        $rets = new \PHRETS\Session($config);
    } catch (\Exception $e) {

    }

    if($connect = $rets->Login())
    {
        return response('Connected', 200)
            ->header('Content-Type', 'text/plain');
    }

    return response('Not Authorized', 401)
        ->header('Content-Type', 'text/plain');
});

Route::get('/prop', function(Request $request){
    return Property::find($request->object_id)->toJson();
});
