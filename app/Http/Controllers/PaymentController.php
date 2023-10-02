<?php

namespace App\Http\Controllers;

use App\SalePayment;
use App\CustomerPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $customer_payments = CustomerPayment::where('customer_id', auth()->guard('web_customers')->user()->id)->get();
        return view('payment.index', compact('customer_payments'));
    }

}
