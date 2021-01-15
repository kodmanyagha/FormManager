<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Jobs\ProcessAnswer;

Route::get( '/', 'IndexController@index' );

Auth::routes();

Route::get( 'home', function () {
	return redirect( 'admin' );
} );

Route::get( 'admin/home', function () {
	return redirect( 'admin' );
} );

Route::prefix( 'admin' )->group( function () {
	Route::group( [
		'middleware' => 'auth'
	], function () {
		Route::get( '', 'HomeController@index' );

		Route::resource( 'user', 'UserController', [
			'except' => [
				'show'
			]
		] )->name( 'get', 'user' );

		Route::get( 'profile', 'ProfileController@edit' )->name( 'profile.edit' );
		Route::any( 'profile/update', 'ProfileController@update' )->name( 'profile.update' );
		Route::post( 'profile/password', 'ProfileController@password' )->name( 'profile.password' );

		Route::prefix( 'forms' )->group( function () {
			Route::get( '', 'FormsController@index' );
			Route::get( 'list', 'FormsController@list' );
			Route::post( 'listDT', 'FormsController@listDT' );
			Route::any( 'add', 'FormsController@addedit' );
			Route::any( 'edit/{id}', 'FormsController@addedit' );
			Route::any( 'exportExcel/{id}', 'FormsController@exportExcel' );
		} );
	} );
} );

Route::any( 'form', function () {
	return redirect( '/' );
} );

// bu route en aşağıda kalmalı aksi halde herşeyi buraya yönlendirir
Route::any( '{slug}/tesekkur', 'FormController@thankYou' );
Route::any( '{slug}', 'FormController@index' );

