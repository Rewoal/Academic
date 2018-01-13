<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	$title = "Welcome to Munkhsaikhan's own page";
    	return view('pages.index')->with('title',$title);
    }
}
