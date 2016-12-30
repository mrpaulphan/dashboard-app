<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Company;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
  public function __construct()
{
    $this->middleware(['auth']);
}

    function index() {

      return view('users.index');
    }

    public function usersApi(Request $request) {
      // Check if user is admin to access api

      if (Auth::user()) {
        $users = User::with('Role')->with('Company')->get();
        $roles = Role::all();
        $companies = Company::all();

        return response()->json([
          'users' => $users->toArray(),
          'roles' => $roles->toArray(),
          'companies' => $companies->toArray(),
        ]);
      } else {
        return response()->json(null);
      }
    }
}
