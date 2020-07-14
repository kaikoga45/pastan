<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\item;

class buyerCont extends Controller
{
    public function searchItem(Request $req){
        $test = $req->search;

        dd($test);
    }
}
