<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Company;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function index() {

      return view('companies.index');

    }

    public function companiesApi(Request $request) {

      // Check if the user is logged in
      if (Auth::user()) {

          return response()->json([
          'companies' => Company::all()->toArray()
        ]);
      } else {
          return response()->json(null);
      }
    }

    public function create(Request $request)
    {

      // Validate

      // Store
      $company = Company::create([
        'name' => $request->name,
        'website' => $request->website,
        'street_address' => $request->street_address,
        'street_address_2' => $request->street_address_2,
        'city' => $request->city,
        'state' => $request->state,
        'zip_code' => $request->zip_code,
        'email' => $request->email,
        'phone' => $request->phone,
      ]);

        return response()->json([
        'company' => $company->toArray(),
      ]);
    }
}
