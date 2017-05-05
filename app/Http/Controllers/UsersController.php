<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Models\Confirmation;
use Mail;

class UsersController extends Controller
{
    public function addUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|alpha_num|between:6,20|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);
        $userArray = [
            'username' => $request->get('username'),
            'password' => bcrypt($request->get('password')),
            'email'    => $request->get('email'),
        ];

        $user = new User($userArray);
        // dd($user->getRules());

        if (!$user->save()) {
            $flashDanger = 'There were some errors with your registration.';
            return redirect()->route('get.users.register')
                                    ->withFlashDanger($flashDanger)
                                    ->withErrors($user->getValidator())
                                    ->withInput();
        }

        $confirmation = new Confirmation;
        $confirmation->code = str_random(32);
        $confirmation->user()->associate($user);

        if (!$confirmation->save()) {
            $flashWarning = 'You have been registered, but there was an error. Please notify an Administrator.';
            return redirect()->route('home')->withFlashDanger($flashWarning);
        }

        $viewData = array(
            'username' => $user->username,
            'token' => $confirmation->code,
        );

        /*Mail::send('emails.users.confirm', $viewData, function ($message) use ($user) {
            $message->from('support@csnades.com', 'CSNades Team');
            $message->to($user->email, $user->username);
            $message->subject('CSNades Account Confirmation');
        });*/

        $flashSuccess = 'You have been registered. Please check your email to verify your account.';
        return redirect('/')->withFlashSuccess($flashSuccess);
    }

    public function attemptLogin(Request $request)
    {
        $remember = false;
        $user = array(
            'username' => $request->get('username'),
            'password' => $request->get('password'),
            'active'   => 1,
        );

        if ($request->get('remember')) {
            $remember = true;
        }

        if (Auth::attempt($user, $remember)) {
            return redirect('/')->withFlashSuccess('You have been logged in!');
        }

        $viewData = [
            'heading'     => 'Login',
        ];

        $flashDanger = 'Invalid username and password.';
        return redirect()->route('get.users.login')->withFlashDanger($flashDanger);
    }

    public function confirmUser($code)
    {
        try {
            $confirmation = Confirmation::where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $flashDanger = 'The provided confirmation code was not found.';
            return redirect('/')->withFlashDanger($flashDanger);
        }

        $user = $confirmation->user;
        $user->active = 1;

        if (!$user->save() || !$confirmation->delete()) {
            $flashDanger = 'There was an error confirming your account. Please contact support.';
            return redirect()->route('home')->withFlashDanger($flashDanger);
        }

        $flashSuccess = 'Your account is confirmed! You may proceed to login.';
        return redirect()->route('get.users.login')->withFlashSuccess($flashSuccess);
    }

    public function logout()
    {
        Auth::logout();

        $flashInfo = 'You have been logged out.';
        return redirect()->route('get.users.login')->withFlashInfo($flashInfo);
    }

    public function showAddUserForm()
    {
        $viewData = array('heading' => 'Register');

        return view('users.add-user')->with($viewData);
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect('/');
        }

        $viewData = array(
            'heading' => 'Login',
        );

        return view('users.login')->with($viewData);
    }

    public function showProfile()
    {
        return "Profile";
    }
}
