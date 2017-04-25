<?php


Route::get('/rolldice/{guess?}', function($guess=null) {
    
    $random = mt_rand(1,6);
    $data = array('random' => $random, 'guess' => $guess);
    return view('roll-dice', $data);
});