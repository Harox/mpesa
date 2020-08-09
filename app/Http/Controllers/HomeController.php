<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use abdulmueid\mpesa\Config;
use abdulmueid\mpesa\Transaction;
use abdulmueid\mpesa\TransactionResponse;
use App\Payment;
use Illuminate\Support\Facades\Config as MpesaConfig;

class HomeController extends Controller{

    public function __construct(){
    }

    public function payment(Request $request){

        $phone = $request->phone;
        $value = $request->value;
        $type = "Mpesa";

        $mpesa      = MpesaConfig::get('mpesa');
        $api_key    = $mpesa['api_key'];
        $public_key = $mpesa['public_key'];
        $api_host   = $mpesa['api_host'];
        $origin     = $mpesa['origin'];
        $service    = $mpesa['service_provider_code'];
        $initiator  = $mpesa['initiator_identifier'];
        $security   = $mpesa['security_credential'];
        $begin      = new Config($public_key, $api_host , $api_key, $origin, $service, $initiator, $security);

        // ---------------Transaction Maker-------------------------
        $transation             = new Transaction($begin);
        $TransactionReference   = bin2hex(random_bytes(8));
        $ThirdPartyReference    = bin2hex(random_bytes(8));
        $payment                = $transation->c2b($value, $phone , $TransactionReference, $ThirdPartyReference);

        // ---------------Response-------------------------
        $response = json_decode($payment->getResponse(), true);

        if($response['output_TransactionID'] != 'N/A'){
            $state  =   'Processado';
        }else{
            $state  =   'Falhou';
        }

        // ---------- Save Operation On Database--------------------------
        $payment = Payment::create([
            'type'          =>  "Pagamento",
            'number'        =>  $phone,
            'value'         =>  $value,
            'reference'     =>  $TransactionReference,
            'thirdReference'=>  $response['output_ThirdPartyReference'],
            'conversationId'=>  $response['output_ConversationID'],
            'transactionId' =>  $response['output_TransactionID'],
            'method'        =>  $type,
            'description'   =>  $response['output_ResponseDesc'],
            'status'        =>  $state,
        ]);

        if($response['output_TransactionID'] != 'N/A'){
            return redirect('/')->with('success', 'Deposito efectuado com Sucesso!!!');
        }else{
            return redirect('/')->with('error', 'Deposito Falhou!!!');
        }
    }

    public function index(){
        return view('index');
    }
}
