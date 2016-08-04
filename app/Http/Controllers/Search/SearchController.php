<?php

namespace App\Http\Controllers\Search;

use App\Models\DB\Companys;
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
         //   'sc_number.numeric' => 'Toll Free Number must be integer!',
        ];
        return Validator::make($data, [   //validation registration form

          //  'sc_number' => 'numeric',
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
                if(empty(Input::get('sc_name')) && empty(Input::get('sc_category'))){ //if search resoult from frontpage
                    $inptut_data = Input::get('sc_number');
                    if (is_numeric($inptut_data)) {                                           //if numeric data
                        $search_data = Companys::where('number', '=', $inptut_data)
                            ->get();
                    } else {                                                                //if string data

                        $search_data = Companys::where('name', '=', $inptut_data)
                            ->get();
                    }

                } else {                                              //if search request from (/search) routes
                    $search_data = Companys::where('name', '=', Input::get('sc_name'))
                        ->orWhere('category', '=', Input::get('sc_category'))
                        ->orWhere('number', '=', Input::get('sc_number'))
                        ->get();
                }


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
