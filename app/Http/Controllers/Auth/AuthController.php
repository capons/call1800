<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $redirectTo = '/'; //redirect path after sign in
    private $last_id = '';  //put into variable last insert id
    private $hash = ''; //put into variable user hash to confirm user account
    private $login_err_m = ''; //login error message
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
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'category_id.required' => 'Category is required',
            'terms.required' => 'Terms and Condition is required',
        ];
        return Validator::make($data, [   //validation registration form
            'f_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'category_id'=> 'required',
            'terms' => 'required'
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
        Auth::login($this->create($request->all()));
        //$this->last_id -> return last database insert id
        $user = User::findOrFail($this->last_id); //user object
        $link_to_active = Config::get('app.url').'/auth/active'.'?hash='.$this->hash.'&id='.$this->last_id; //send variable to mail view
        Mail::send('mail.index', ['link' => $link_to_active], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');
            $m->to(env('admin_email'), $user->name)->subject(Config::get('app.url').'/auth/active' . '?hash=' . $this->hash . '&id=' . $this->last_id . ''); //send to email link to activate account
        });
        Session::flash('user-info', 'Your registration has been successfully submitted
									for approval and you will be notified via email when live.'); //send message to user via flash data
        //return redirect($this->redirectPath());                         //redirect controller set in protected $redirectTo = '/';
        //return redirect('auth/register');
        return redirect('/');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function postActivate(Request $request) //activate user account
    {
        Validator::make($request->all(), [
            'id' => 'integer'
        ]);
        $hash = Input::get('hash'); //user data id
        $id = Input::get('id');
        //$find_user = User::where('id',$id)->where('hash',$hash)->get();
        //$find_user = User::where('id',$id)->where('hash',$hash)->get(); //find user with correct id and hash
        $find_user = User::where('id', $id)->where('hash',$hash)->get();
        if(!$find_user->isEmpty()){ //if result true
            $values=array('active'=>1,'access'=>1,'hash'=>bcrypt(str_random(40))); //update data -> new hash to confirm that we active user acount and link work only once
            User::where('id',$id)->where('hash',$hash)->update($values);
            $user = User::findOrFail($id);
            Mail::send('mail.index', ['view_variable' => 'Your account is active'], function ($m) use ($user) { //send mail to user -> account is active
                $m->from(env('admin_email'), 'Your Application'); //env blobal variable create in .env file
                $m->to($user->email, $user->f_name)->subject('Congratulations your account is activated'); //send to user email info that we activate user account
            });
            return redirect('/'); //redirect to main page
        } else {
            Session::flash('user-info', 'Invalid link');
            return redirect('/'); //redirect to main page
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
