<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller {
	/*
		            |--------------------------------------------------------------------------
		            | Login Controller
		            |--------------------------------------------------------------------------
		            |
		            | This controller handles authenticating users for the application and
		            | redirecting them to your home screen. The controller uses a trait
		            | to conveniently provide its functionality to your applications.
		            |
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/admin/dashboard';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest:admin')->except('logout');
	}

	/**
	 * Log the user out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function logout(Request $request) {
		$this->guard()->logout();

		$request->session()->invalidate();

		return $this->loggedOut($request) ?: redirect('admin/login');
	}

	/**
	 * Validate the user login request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return void
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function validateLogin(Request $request) {
		$request->validate([
			$this->username() => 'required|string',
			'password' => 'required|string',
		]);
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request) {
		return $this->guard()->attempt(
			$this->credentials($request), $request->filled('remember')
		);
	}

	/**
	 * Get the needed authorization credentials from the request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	protected function credentials(Request $request) {
		return $request->only($this->username(), 'password');
	}

	/**
	 * Send the response after the user was authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	protected function sendLoginResponse(Request $request) {
		$request->session()->regenerate();

		$this->clearLoginAttempts($request);

		return $this->authenticated($request, $this->guard()->user())
		?: redirect()->intended($this->redirectPath());
	}

	/**
	 * The user has been authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  mixed  $user
	 * @return mixed
	 */
	protected function authenticated(Request $request, $user) {
		return response()->json(['message' => 'Successfully Login', 'goto' => redirect()->intended($this->redirectPath())->getTargetUrl()]);
	}

	/**
	 * Get the failed login response instance.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendFailedLoginResponse(Request $request) {
		throw ValidationException::withMessages([
			$this->username() => [trans('auth.failed')],
		]);
	}

	/**
	 * Get the login username to be used by the controller.
	 *
	 * @return string
	 */
	public function username() {
		return 'email';
	}

	/**
	 * The user has logged out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed
	 */
	protected function loggedOut(Request $request) {
		return response()->json(['message' => 'Successfully Logout', 'goto' => route('admin.login')]);
	}

	protected function guard() {
		return Auth::guard('admin');
	}

}