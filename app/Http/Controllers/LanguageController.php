<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function index(Request $request)
    {
        if($request->lang <> '')
        {
            if ($request->lang == 'en' || $request->lang == 'de') {
                Session::put('applocale', $request->lang);
            }

           // App::setLocale($request->lang);
            //app()->setLocale($request->lang);

            return Redirect::back();


            //return view('echopage', ['name' => $request->lang]);
            // return back()->withInput(['lang' => $request->lang ]);

        }
    }
}
