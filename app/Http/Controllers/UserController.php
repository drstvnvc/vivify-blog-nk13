<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function show(User $user)
  {
    $user->load([
      'posts' => function ($qb) {
        return $qb->where('is_published', 1);
      }
    ]);
    return view('users.show', compact('user'));
  }
}
