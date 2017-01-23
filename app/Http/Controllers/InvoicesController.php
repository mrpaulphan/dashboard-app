<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Invoice;
use Carbon\Carbon;

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
            $invoice->invoice_date = Carbon::parse($invoice->invoice_date)->format('M m Y');
        }

      // Check if the user is logged in
      if ($this->role() == 'admin') {
          return response()->json([
          'total' => $invoices->count(),
          'create_url' => route('create.invoice'),
          'invoices' => $invoices->toArray(),
        ]);
      } else {
          return response()->json('message: You do not have permission');
      }
    }

    public function invoicesCreateApi(Request $request)
{
  // Get last ID to get the next ID Number
  $id = Invoice::all()->last()->id + 1;
  $date = Carbon::now()->toFormattedDateString();

  // Check if the user is logged in
  if ($this->role() == 'admin') {
      return response()->json([
      'id' => $id,
      'post_url' => route('store.invoice'),
      'date' => $date
    ]);
  } else {
      return response()->json('message: You do not have permission');
  }

}
    public function create() {

      return view('invoices.create');
    }
    public function role()
    {
        return Auth::user()->role->name;
    }
}
