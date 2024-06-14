<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Safaricom\Mpesa\Mpesa;

class PaymentController extends Controller
{
    public function mpesaPayment(Request $request)
    {
        $mpesa = new Mpesa();

        $BusinessShortCode = env('MPESA_SHORTCODE');
        $LipaNaMpesaOnlinePassKey = env('MPESA_PASSKEY');
        $TransactionType = 'CustomerPayBillOnline';
        $Amount = $request->input('amount');
        $PartyA = $request->input('phone'); // phone number of the customer
        $PartyB = env('MPESA_SHORTCODE');
        $PhoneNumber = $request->input('phone');
        $CallBackURL = route('mpesa.callback'); // route to handle the callback
        $AccountReference = "BettingTips"; 
        $TransactionDesc = "Payment for betting tips";
        
        $stkPushSimulation = $mpesa->STKPushSimulation(
            $BusinessShortCode,
            $LipaNaMpesaOnlinePassKey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc
        );

        return response()->json($stkPushSimulation);
    }

    public function mpesaCallback(Request $request)
    {
        // Handle M-Pesa callback logic here
        $mpesaResponse = $request->all();
        // Log or save the response data
        \Log::info($mpesaResponse);

        // You can process the payment details and update your records
    }
}

