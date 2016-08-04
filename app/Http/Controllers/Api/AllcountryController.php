<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\Input;

class AllcountryController extends Controller
{
    private $redirectTo = 'auth/register';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    //get country phone code
    public  function getCountryCode(Request $request){
        if ($request->isMethod('post')){
            // Display text here
            $messages = [ //validation message
                'name.required' => 'Enter your password!'
            ];
            //$validator = Validator::make(Input::all(), $rules,$messages);
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ], $messages);
            if ($validator->fails()) {
                $errors = $validator->errors(); //error send to ajax
                $errors =  json_decode($errors);
                return response()->json([
                    'success' => false,
                    'message' => $errors
                ], 200);
                die();
            }
            $country_name = camel_case(Input::get('name'));
            $result = file_get_contents('https://restcountries.eu/rest/v1/name/'.$country_name);
            if(!empty($result)) {
                $result = json_decode($result, true);
              //  echo $result[0]['callingCodes'][0];
              //  echo '<pre>';
              //  print_r($result);
             //   echo '</pre>';


                return response()->json([
                    'success' => true,
                    'callingcode' => $result[0]['callingCodes'][0],
                    'postalcode' => $result[0]['area']

                ], 200);
                die();
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Country name error'
                ], 200);
                die();
            }


        } else {
            return redirect($this->redirectTo);

        }






    }
}
