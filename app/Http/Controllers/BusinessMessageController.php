<?php

namespace Toilets\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Bus;
use Toilets\Http\Requests;
use Toilets\Http\Controllers\Controller;
use Toilets\Models\Business;
use Toilets\Models\Message;

class BusinessMessageController extends Controller
{
    /**
     * BusinessMessageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @param Business $business
     * @return \Illuminate\Http\Response
     */
    public function create(Business $business)
    {
        return view('business.message.create', ['biz' => $business]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Business $business)
    {
        $message = new Message($request->except('_token'));

        $business->messages()->save($message);
        auth()->user()->messages()->save($message);

        session()->flash('success', 'Your message to '.$business->name.' was sent!');
        return redirect()->route('business.index', $business);

    }


}
