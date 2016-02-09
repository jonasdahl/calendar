<?php

use App\Calendar;
use App\HiddenEvent;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/', function () {
	if (!Request::has('url')) {
		return redirect()->back();
	}
	$calendar = new Calendar;
	$calendar->url = Request::input('url');
	$calendar->save();
    return redirect('config/' . $calendar->id);
});

Route::get('/config/{id}', function($id = null) {
	$calendar = Calendar::find($id);
	if (is_null($calendar)) {
		return redirect()->back();
	}

	$contents = $calendar->fetchArray();
    return view('config')->with('rows', $contents)->with('calendar', $calendar);
});

Route::get('/render/{id}', function($id = null) {
	$calendar = Calendar::find($id);
	if (is_null($calendar)) {
		return redirect()->back();
	}

	$contents = $calendar->fetchArray();
	$res = "";
	foreach ($contents as $row) {
		foreach ($row as $key => $val) {
			if (is_array($val)) {
				foreach ($val as $val2) {
					$res .= $key . ":" . trim($val2) . "\r\n";
				}
			} else {
				$res .= $key . ":" . trim($val) . "\r\n";
			}
		}
	}

    return Response::make($res)
    	->header("Content-type", "text/calendar; charset=utf-8")
    	->header("Content-disposition", "attachment; filename=\"cal.ics\"");
});

Route::get('/event/hide/{calId?}/{uid?}', function($calId = null, $uid = null) {
	$calendar = Calendar::find($calId);
	if (is_null($calendar)) {
		return redirect()->back();
	}

	$hiddenEvent = new HiddenEvent;
	$hiddenEvent->calendar = $calendar->id;
	$hiddenEvent->uid = $uid;
	$hiddenEvent->save();

    return redirect()->back();
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});