<?php

use App\Jobs\ProcessEvent;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dispatch', function () {
    $jobs = [];

    foreach (range(1, request('count', 1)) as $item) {
        $jobs[] = new ProcessEvent(request('sleep', 0));
    }

    Queue::bulk($jobs, null, 'main');

    return 'done';
});
