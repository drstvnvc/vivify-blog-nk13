<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function getRegisterForm()
  {
    return view('auth.register');
  }

  public function register(RegisterRequest $request)
  {
    $data = $request->validated();
    $data['password'] = Hash::make($data['password']);
    $newUser = User::create($data);

    auth()->login($newUser);
    return redirect('/posts');
  }

  public function logout()
  {
    auth()->logout();
    return back();
  }

  public function getLoginForm()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $credentials = [
      'email' => $request->input('email'),
      'password' => $request->input('password')
    ];
    if (auth()->attempt($credentials)) {
      return redirect('/posts');
    }
    // $user = User::where('email', $request->get('email'))->first();
    // if ($user && Hash::check($request->input('password'), $user->password)) {
    //   auth()->login($user);
    //   return redirect('/posts');
    // }

    return view('auth.login', ['invalid_credentials' => true]);
  }
}
