<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('get-employee-data');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $position = $request->input('position');
        $address = $request->input('address');
        $workData = $request->input('workData');

        $jsonData = $request->input('jsonData');
        $decodedJson = json_decode($jsonData, true);

        $street = $decodedJson['address']['street'] ?? null;
        $lat = $decodedJson['address']['geo']['lat'] ?? null;

        $path = $request->path();
        $url = $request->url();

        return response()->json([
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'position' => $position,
            'address' => $address,
            'workData' => $workData,
            'decoded_json' => $decodedJson,
            'street_from_json' => $street,
            'lat_from_json' => $lat,
            'request_path' => $path,
            'request_url' => $url,
        ]);
    }

public function update(Request $request, $id)
{
    $name = $request->input('name');
    $email = $request->input('email');
    $surname = $request->input('surname');
    $position = $request->input('position');
    $address = $request->input('address');
    $workData = $request->input('workData');

    $json = $request->input('jsonData');
    $decoded = json_decode($json, true);

    $street = $decoded['address']['street'] ?? null;
    $city = $decoded['address']['city'] ?? null;
    $lat = $decoded['address']['geo']['lat'] ?? null;
    $lng = $decoded['address']['geo']['lng'] ?? null;

    $path = $request->path();
    $url = $request->url();

    return response()->view('update-result', [
        'id' => $id,
        'name' => $name,
        'email' => $email,
        'surname' => $surname,
        'position' => $position,
        'address' => $address,
        'workData' => $workData,
        'street' => $street,
        'city' => $city,
        'lat' => $lat,
        'lng' => $lng,
        'path' => $path,
        'url' => $url,
    ]);
}

}
