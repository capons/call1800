<?php

namespace App\Http\Controllers\Tollfree;

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
use Illuminate\Support\Facades\Redirect;


class BuytollController extends Controller
{
    protected $redirectTo = '/success'; //redirect path after sign in
    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        $messages = [ //validation message
            'tfn_prefix.required' => 'Select number Prefix!',
        ];
        return Validator::make($data, [   //validation registration form
            'tfn_prefix' => 'required'
        ],$messages);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tollfree.buytoll');
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
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            return redirect('toll/buy')
                ->withInput()
                ->withErrors($validator); //set validation error name to display in error layout  views/common/errors.blade.php
        }
        
        //IF PAYMENT PER MINUT NEED TO SAVE AND DONT REDIRECT TO CINFIRM PAGE
        
        
        session(['tf_buy' => $request->all()]);
        return redirect('toll/confirm');  //redirect to confirm payment page

    }

   
    /**
     * @param array $data
     * @return mixed
     */
    protected function add(array $data){ //save data to database
        $new_company = Company::create(['name' => $data['company-name'], 'description' => $data['company-desc'], 'category' => $data['category-name'],'web-number' => $data['web-number'],'number' => $data['toll-number']]);
        return $new_company;

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
