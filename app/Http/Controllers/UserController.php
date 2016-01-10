<?php

namespace Toilets\Http\Controllers;

use Illuminate\Http\Request;

use Toilets\Http\Requests;
use Toilets\Http\Controllers\Controller;
use Toilets\Models\User;

class UserController extends Controller
{
    protected $sluggable = [
        'build_from' => 'name',
    ];

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.private');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('user.show', ['user' => auth()->user()]);
    }

}
