<?php namespace Toilets\Http\Controllers;


use Toilets\Http\Requests\Request;
use Toilets\Models\User;

class HomeController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('home.about');
    }

}