<?php

namespace CodeEducation\Http\Controllers;

use CodeEducation\Client;
use Illuminate\Http\Request;
use CodeEducation\Http\Requests;


class ClientController extends Controller{


    public function index()
    {
        return Client::all();
    }

    public function store(Request $request)
    {
        return Client::create($request->all());
    }

    public function show($id)
    {
        return Client::find($id);
    }

    public function destroy($id)
    {
        Client::find($id)->delete();
    }

}
