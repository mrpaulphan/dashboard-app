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
/**
 * Generates a random token of 38 chracters
 * long.
 *
 * @return [interger]
 */
public function generateToken()
{
    $token = str_random(38);

    return $token;
}
    public function index()
    {
        return view('users.index');
    }

    public function usersApi(Request $request)
    {
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
    public function detailApi(Request $request)
    {
        // Check if user is admin to access api
      if (Auth::user()) {
        $detail = User::find($request->id);
        $detail->company;
        $detail->role;


          return response()->json([
          'user' => $detail->toArray()
        ]);
      } else {
          return response()->json(null);
      }
    }

    public function create(Request $request)
    {

      // Validate
      $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|unique:users',
        'role_id' => 'required',
        'company_id' => 'required',
      ]);

        $token = $this->generateToken();
      // Store
      $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'role_id' => $request->role_id,
        'company_id' => $request->company_id,
        'password' => bcrypt('password'),
        'token' => $token,
      ]);
      // Add relationship to user
      $user->role = $user->role->get();
        $user->company = $user->company->get();

        return response()->json([
        'user' => $user->toArray(),
      ]);
    }

    public function detail(Request $request)
    {

        return view('users.detail')->with('user');
    }
}
