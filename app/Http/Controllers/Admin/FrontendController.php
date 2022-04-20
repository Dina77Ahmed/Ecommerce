<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
    return view('admin.index');
     }
     public function about(){
        return view('admin.about');
         }
         public function aboutus(){
            return view('admin.aboutus');
             }
             public function contact(){
                return view('admin.contact');
                 }
}
