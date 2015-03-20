<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 9/9/2014
 * Time: 1:26 PM
 */
class AuthController extends BaseController
{
    public function getSignup()
    {
        // Check if we are already logged in
        if(Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('')
                ->with('success', 'You are already logged in');
        }

        // Show the login page
        return View::make('auth.signup');
    }

    public function postSignup()
    {
        // Get all inputs
        $userdata = [
            'username' => Input::get('username'),
            'email' => Input::get('email'),
            'password' => Input::get('password'),
            'password_confirmation' => Input::get('password_confirmation')
        ];

        // Rules for form validation
        $rules = [
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];

        // Validate
        $validator = Validator::make($userdata, $rules);

        // Check if form validates
        if($validator->passes())
        {
            // Insert new user to database
            $user = new User;
            $user->username = $userdata['username'];
            $user->email = $userdata['email'];
            $user->password = Hash::make($userdata['password']);

            if($user->save())
            {
                // Try to log user in
                if(Auth::attempt($userdata))
                {
                    // Redirect to homepage
                    return Redirect::to('')
                        ->with('success', 'You have signed up successfully');
                }
            }
            else
            {
                return Redirect::to('signup')
                    ->withErrors($validator)
                    ->withInput(Input::except('password'));
            }
        }

        // Something went wrong
        return Redirect::to('signup')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
    }

    public function getLogin()
    {
        // Check if we are already logged in
        if(Auth::check())
        {
            // Redirect to homepage
            return Redirect::to('')
                ->with('success', 'You are already logged in');
        }

        // Show the login page
        return View::make('auth.login');
    }

    public function postLogin()
    {
        // Get all inputs
        $userdata = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        // Rules for form validation
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];

        // Validate
        $validator = Validator::make($userdata, $rules);

        // Check if form validates
        if($validator->passes())
        {
            // Try to log the user in
            if(Auth::attempt($userdata))
            {
                // Redirect to homepage
                return Redirect::to('')
                    ->with('success', 'You have logged in successfully');
            }
            else
            {
                // Redirect to the login page
                return Redirect::to('login')
                    ->withErrors(['password' => 'Password invalid'])
                    ->withInput(Input::except('password'));
            }
        }

        // Something went wrong
        return Redirect::to('login')
            ->withErrors($validator)
            ->withInput(Input::except('password'));
    }

    public function getLogout()
    {
        // Logout
        Auth::logout();

        // Redirect to homepage
        return Redirect::to('')
            ->with('success', 'You are logged out');
    }
}
