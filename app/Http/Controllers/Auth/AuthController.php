<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Lang;

class AuthController extends Controller
{
    protected $redirectTo = '/';  //redirect path after sign in
    private $last_id = '';        //put into variable last insert id
    private $hash = '';           // user hash to confirm user account
    private $login_err_m = '';    //login error message
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [ //validation message
            'f_name.required' => 'Name is required',
            'l_name.required' => 'Last Name is required',
            'email.required' => 'Email is required',
            'f_number.required' => 'Number is required',
            'u_address.required' => 'Address is required',
            'u_city.required' => 'City is required',
            'u_state.required' => 'State is required',
            'u_country.required' => 'Country is required',
            'u_pass.required' => 'Password is required',
        ];
        return Validator::make($data, [   //validation registration form
            'f_name' => 'required|max:50',
            'l_name' => 'required|max:50',
            'email' => 'required|email|max:100|unique:users',
            'f_number' => 'required|max:100',
            'u_address' => 'required|max:100',
            'u_city' => 'required|max:100',
            'u_state' => 'required|max:100',
            'u_country' => 'required|max:100',
            'u_pass' => 'required|max:100|min:5',
        ],$messages);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postRegister(Request $request) //save registration user data
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
       // $auth = Auth::login($this->create($request->all()));
        $auth = $this->create($request->all());


        if (!$auth) //if query false
        {
            // if query false log all data here
            return redirect('auth/register');
            die();
        }

        //$this->last_id -> return last database insert id
        $user = User::findOrFail($this->last_id); //user object

        $link_to_active = Config::get('app.url').'/auth/active'.'?hash='.$this->hash.'&id='.$this->last_id; //send variable to mail view
        Mail::send('mail.index', ['link' => $link_to_active], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');
            $m->to($user->email, $user->name)->subject('Please activate your account on the call1800'); //send to email link to activate account
        });
        Session::flash('user-info', Lang::get('site/authpage/site.registration.success_reg')); //send message to user via flash data
        //return redirect($this->redirectPath());                         //redirect controller set in protected $redirectTo = '/';
        //return redirect('auth/register');
        //return redirect('/');
        return redirect('/success');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postActivate(Request $request) //activate user account
    {
        if(! count(Input::all())){ //if empty request input redirect
            return redirect('/'); //redirect to main page
        }
        Validator::make($request->all(), [
            'id' => 'integer'
        ]);
        $hash = Input::get('hash'); //user hash
        $id = Input::get('id');     //user id
        $find_user = User::where('id', $id)->where('hash',$hash)->first();  //find user with correct id and hash

        if(!empty($find_user)){ //if result true
            $values=array('active'=>1,'hash'=>bcrypt(str_random(40))); //update data -> new hash to confirm that we active user acount and link work only once
            User::where('id',$id)->where('hash',$hash)->update($values);
            //$user = User::findOrFail($id);
            //Session::flash('user-info', Lang::get('message.active_account')); //send message to user via flash data
            //return redirect('/'); //redirect to main page
           // return view('auth.reg_confirm',['user_info' => Lang::get('message.active_account')]);
            Session::flash('user-info', Lang::get('site/authpage/site.registration.success_active')); //send message to user via flash data
            return redirect('/success');
        } else { //if second time click on active user link display error
            Session::flash('user-info', Lang::get('site/error.link_error'));
            return redirect('/success'); //redirect to main page
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $this->hash = bcrypt($data['f_name']); //put user account activate hash into variable
        $save_data = User::create([
            'name' => $data['f_name'],
            'last_name' => $data['l_name'],
            'email' => $data['email'],
            'phone_number' => $data['f_number'],
            'country' => $data['u_country'],
            'state' => $data['u_state'],
            'city' => $data['u_city'],
            'address' => $data['u_address'],
            'password' => bcrypt($data['u_pass']),
            'access' => 1,
            'hash' => $this->hash
        ]);
        $this->last_id = $save_data->id;    //last user save data id from database
        return $save_data;
    }


    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function postLogin(Request $request) //login via email + pass for client (administrator)
    {

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        $throttles = $this->isUsingThrottlesLoginsTrait();
        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }
        //$credentials = $this->getCredentials($request);
        $messages = [ //validation message
            'l_email.required' => 'Enter your email!',
            'l_pass.required' => 'Enter your password!'
        ];
        //$validator = Validator::make(Input::all(), $rules,$messages);
        $validator = Validator::make($request->all(), [
            'l_email' => 'required',
            'l_pass' => 'required'
        ], $messages);
        if ($validator->fails()) { //if true display error
            return redirect('auth/login')
                ->withInput()
                ->withErrors($validator); //set validation error name to display in error layout  views/common/errors.blade.php
        } else {
            $userdata_email = array( //login via email by client
                'email' => Input::get('l_email'),  //email -> database row name
                'password' => Input::get('l_pass')//password -> database row name
            );
            if (Auth::attempt(/*$credentials*/$userdata_email + ['active' => 1], true/*$request->has('remember')*/)) { //avtive need to be 1 to check if user active account

                // Lang::get('message.auth.access_login'); //send message to user via flash data
                return redirect('us/account');
               // return $this->handleUserWasAuthenticated($request, $throttles);


            } else {
                $this->login_err_m = Lang::get('site/authpage/site.login_message.login_error');
            }
        }
        if ($throttles) {
            $this->incrementLoginAttempts($request);
        }
        //return redirect($this->loginPath())

        /*
        return redirect('auth/login') //redirect to with message
        ->withInput($request->only($this->loginUsername(), 'remember'))
            ->withErrors([
                $this->loginUsername() => $this->login_err_m,//$this->getFailedLoginMessage(), //message active account error
            ]);
        */
        Session::flash('user-info', $this->login_err_m); //send message to user via flash data

        return redirect('auth/login');
    }
}
