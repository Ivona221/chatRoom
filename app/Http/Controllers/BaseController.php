<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller as BaseController1;
use Illuminate\Support\Facades\View;


class BaseController extends BaseController1
{
   /* public function __construct()
    {
        if(Auth::check()){
            $id=Auth::user()->id;
        }
        else
            $id=0;
        View::share('id', $id);
    }*/
}
