<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    public function index()
    {
        return view('form');
    }

//     public function store(Request $request)
//     {
//         return response()->json([
//             'first_name' => $request->input('first_name'),
//             'last_name' => $request->input('last_name'),
//             'email' => $request->input('email'),
//         ]);
//     }

    public function store(Request $request)
    {
        return view('greeting', [
            'first_name' => $request->input('first_name'),
        ]);
    }

}



