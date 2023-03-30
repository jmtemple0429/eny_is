<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('login')->name('login.')->namespace('Login')->group(function() {
    Route::view('/','auth.search')->name('login');

    Route::get('password','PasswordController@create')->name('password');
    Route::get('microsoft','MicrosoftController@redirect')->name('microsoft.redirect');
    Route::get('microsoft/handle','MicrosoftController@handle')->name('microsoft.handle');

    Route::post('/','SearchController@store')->name('search');
    Route::post('password','PasswordController@store')->name('password.store');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::prefix('ingest')->name('ingest.')->namespace('Ingest')->group(function() {
        Route::prefix('vcn')->name('vcn.')->namespace('VCN')->group(function() {
            Route::view('members','ingest.vcn.members')->name('members'); #done
            Route::view('assigned_positions','ingest.vcn.assigned_positions')->name('assigned_positions'); #done
            Route::view('hours','ingest.vcn.hours')->name('hours'); #done
            Route::view('trainings','ingest.vcn.trainings')->name('trainings'); #done
            Route::view('positions','ingest.vcn.positions')->name('positions'); #done

            Route::post('members','MembersController@store');
            Route::post('assigned_positions','AssignedPositionsController@store');
            Route::post('hours','HoursController@store');
            Route::post('trainings','TrainingsController@store');
            Route::post('positions','PositionsController@store');
        });

        Route::prefix('rcc')->name('rcc.')->namespace('RCC')->group(function() {
            Route::view('cases','ingest.rcc.cases')->name('cases'); #done 
            Route::view('events','ingest.rcc.events')->name('events'); #done
            Route::view('clients','ingest.rcc.clients')->name('clients'); #done
            Route::view('users','ingest.rcc.users')->name('users'); #done
            Route::view('virtual_cases','ingest.rcc.virtual_cases')->name('virtual_cases'); #done 

            Route::post('cases','CasesController@store');
            Route::post('events','EventsController@store');
            Route::post('clients','ClientsController@store');
            Route::post('users','UsersController@store');
            Route::post('virtual_cases','VirtualCasesController@store');
        });

        Route::prefix('rcr')->name('rcr.')->namespace('RCR')->group(function() {
            Route::view('calls','ingest.rcr.calls')->name('calls'); #done
            Route::get('schedule','ScheduleController@create')->name('schedule'); #done
            Route::view('responders','ingest.rcr.responders')->name('responders'); 

            Route::post('calls','CallsController@store');
            Route::post('schedule','ScheduleController@store');
            Route::post('responders','RespondersController@store');
        });
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
