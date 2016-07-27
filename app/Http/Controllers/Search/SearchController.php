<?php

namespace App\Http\Controllers\Search;

use App\Models\DB\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;


class SearchController extends Controller
{
    protected function validator(array $data)
    {
        $messages = [ //validation message
            'sc_number.numeric' => 'Toll Free Number must be integer!',
        ];
        return Validator::make($data, [   //validation registration form

            'sc_number' => 'numeric',
        ],$messages);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search_data = null; //default select all data and display
        return view ('search.index',['search_data' => $search_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function filter(Request $request) //display filter data
    {
            $validator = $this->validator($request->all());
            if ($validator->fails()) { //if true display error
                return redirect('/search')
                    ->withInput()
                    ->withErrors($validator); //set validation error name to display in error layout  views/common/errors.blade.php
            } else {
                $userdata_email = array( //login via email by client
                    'email' => Input::get('l_email'),  //email -> database row name
                    'password' => Input::get('l_pass')//password -> database row name
                );
                $search_data = Company::where('name', 'LIKE', Input::get('sc_name'))
                    ->orWhere('category', 'LIKE', Input::get('sc_category'))
                    ->orWhere('number', 'LIKE', Input::get('sc_number'))
                    ->get();

            }

            return view('search.index', ['search_data' => $search_data]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //






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
