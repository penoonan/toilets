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
}
