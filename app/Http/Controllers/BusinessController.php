<?php

namespace Toilets\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

use Toilets\Events\BusinessWasFlagged;
use Toilets\Http\Requests;
use Toilets\Http\Controllers\Controller;
use Toilets\Models\Activity;
use Toilets\Models\Business;

class BusinessController extends Controller
{
    /**
     * BusinessController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['create', 'store']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('business.index', ['businesses' => Business::approved()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, Business::$flagging_validation_rules);
        $biz = Business::create($request->except('_token'));
        $user = auth()->user();

        event(new BusinessWasFlagged($biz, $user, $request));

        session()->flash('success', 'Thank you for flagging the business! An administrator will attempt to verify your submission - we will notify you when the business is posted!');

        return redirect()->route('business.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        $business->load('activity');
        return view('business.show', ['biz' => $business]);
    }

    /**
     * Show the form for searching for businesses
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        return view('business.search');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
