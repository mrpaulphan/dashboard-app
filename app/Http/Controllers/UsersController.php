<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
  public function __construct()
{
    $this->middleware(['auth']);
}

    function index() {
      return view('users.index')->with('users', User::all());
    }

    public function usersApi(Request $request) {
      if (Auth::user()) {
        return response()->json(User::all());
      } else {
        return response()->json(null);
      }
    }
}
