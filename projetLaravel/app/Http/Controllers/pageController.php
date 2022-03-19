<?php

namespace App\Http\Controllers;

use App\Models\Correction;
use App\Models\Epreuve;
use Illuminate\Http\Request;

class pageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('pages.about');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function condition()
    {
        return view('pages.conditionUtilisation');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $message='Contacter nous au ...';
        return view('pages.contact')->with('message',$message);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function help()
    {
        return view('pages.help');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function politiqueConf()
    {
        return view('pages.politiqueConfidentialite');
    }
}
