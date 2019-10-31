<?php
Route::group([
    'middleware' => ['web'],
    'namespace'=>'Bravoh\LaravelWebInstaller\Http\Controllers',
    'prefix'=>config('laravel-web-installer.path'),
    'as'=>config('laravel-web-installer.route_name').'.'
],function (){
    Route::match(['get','post'],'/', 'InstallerController@index')->name('start');
    Route::match(['get','post'],'step1', 'InstallerController@step1')->name('step1');
    Route::match(['get','post'],'step2', 'InstallerController@step2')->name('step2');
    Route::match(['get','post'],'step3', 'InstallerController@step3')->name('step3');
    Route::match(['get','post'],'step4', 'InstallerController@step4')->name('step4');
    Route::match(['get','post'],'step5', 'InstallerController@step5')->name('step5');
    Route::match(['get','post'],'step6', 'InstallerController@step6')->name('step6');
});
