<?php

namespace App\Http\Controllers\Tollfree;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Lang;
use App\Models\DB\Company;
use Illuminate\Support\Facades\Session;

class RegistertollController extends Controller
{
    protected $redirectTo = '/'; //redirect path after sign in
    /**
     * @param array $data
     * @return mixed
     */
    protected function validator(array $data)
    {
        $messages = [ //validation message
            'company-name.required' => 'Company name is required!',
            'toll-number.required' => 'Number is required!',
        ];
        return Validator::make($data, [   //validation registration form
            'company-name' => 'required|min:3|max:50',
            'toll-number' => 'required|min:3|max:50',
        ],$messages);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('tollfree.regtoll');
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
            return redirect('toll/reg')
                ->withInput()
                ->withErrors($validator); //set validation error name to display in error layout  views/common/errors.blade.php
        }
        $company = $this->add($request->all());
        if (! $company)
        {

            //save to log if data not save

            return redirect($this->redirectTo);
            die();
        }

        Session::flash('user-info', Lang::get('site/tollfreepage/site.tollreg.message.accessreg')); //send message to user via flash data
        return redirect($this->redirectTo);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function add(array $data){ //save data to database
        $new_company = Company::create(['name' => $data['company-name'],'number' => $data['toll-number'],'address' => $data['address'],'city' => $data['city'],'state' => $data['state'],'country' => $data['country'],'zipcode' => $data['zip']]);
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
