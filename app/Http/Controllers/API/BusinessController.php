<?php

namespace Toilets\Http\Controllers\API;

use Illuminate\Http\Request;

use Toilets\Http\Requests;
use Toilets\Http\Controllers\Controller;
use Toilets\Models\Business;

class BusinessController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->get('page', 1);
        $per_page = $request->get('per_page', 50);

        $businesses = Business::orderBy('updated_at', 'desc')->take($per_page)->offset($page-1 * $per_page)->get(['name', 'slug']);

        return response()->json($businesses, 200);
    }

    public function query(Request $request)
    {
        $query = (string) $request->get('query', '');
        $businesses = [];

        if (strlen($query) > 0) {
            $businesses = Business
                ::where('name', 'like', '%'.$query.'%')
                ->get(['slug', 'name', 'updated_at']);
        }

        return response()->json($businesses, 200)
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
    }




//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//        //
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
