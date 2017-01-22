<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Invoice;

class InvoicesController extends Controller
{
    /**
   * Create a new controller instance.
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    {
        return view('invoices.index');
    }

    public function invoicesApi(Request $request)
    {
        $invoices = Invoice::all(['invoice_date', 'invoice_number', 'user_id', 'status', 'grand_total']);

        foreach ($invoices as $key => $invoice) {
            $invoice->user;
        }
      // Check if the user is logged in
      if ($this->role() == 'admin') {
          return response()->json([
          'total' => $invoices->count(),
          'invoices' => $invoices->toArray(),
        ]);
      } else {
          return response()->json('message: You do not have permission');
      }
    }

    public function role()
    {
        return Auth::user()->role->name;
    }
}
