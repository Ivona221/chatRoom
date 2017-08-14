<?php
/**
 * Created by PhpStorm.
 * User: imi
 * Date: 8/14/17
 * Time: 3:10 PM
 */

use Illuminate\Support\Facades\Auth;


return [

    /*
    |--------------------------------------------------------------------------
    | User Defined Variables
    |--------------------------------------------------------------------------
    |
    | This is a set of variables that are made specific to this application
    | that are better placed here rather than in .env file.
    | Use config('your_key') to get the values.
    |
    */

    'user_id' => env('USER_ID',Auth::user()->id),
    //'reciver_id' => env('COMPANY_email','contact@acme.inc'),


];