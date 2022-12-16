<?php

namespace App\Http\Controllers\Paypal;

use App\Http\Controllers\Controller;
use App\Models\Sightreadings\SightreadingPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;

class PaypalController extends Controller
{
    private $ppipn;
    private $enable_sandbox;
    private $my_email_addresses;
    private $send_confirmation_email;
    private $send_confirmation_email_address;
    private $send_confirmation_email_from_address;
    private $save_log_file;

    public function __construct()
    {
//Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
        $this->ppipn = new \App\Models\Paypal\PaypalIPN();
//Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
        //set sandbox to true
        //$enable_sandbox = false;
        $this->ppipn->useSandbox();
//Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
        //valid email addresses for business
        $my_email_addresses =
            [
                'njacda@mfrholdings.com',
                'rick@mfrholdings.com',
            ];
        Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
        //send confirmation email to user
        $this->send_confirmation_email = true;
        $this->send_confirmation_email_address = 'Rick Retzko <rick@mfrholdings.com>';
        $this->send_confirmation_email_from_address = 'PayPal IPN <rick@mfrholdings.com>';
//Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
        //create a log of the transaction
        $this->save_log_file = true;
Log::info('Got to controller! @ '.__METHOD__.':'.__LINE__);
    }

    public function update()
    {Log::info('Got to update! @ '.__METHOD__);
        if(isset($_POST) && count($_POST)){
            Log::info('***** MAKE DTO *****');
            $dto = $this->makeDto();
            Log::info('***** LOG POST INFO *****');
            $this->logPostInfo($dto);

            //payment factory to determine correct method
            if($dto['item_name'] === 'sightreading'){
                $payment = new SightreadingPayment();
            }else {
                $payment = new Payment;
            }

            //record payment
            $payment->recordIPNPayment($dto);

        }else{
            Log::info('*** PayPal IPN Testing: $_POST NOT found');
        }

        return header("HTTP/1.1 200 OK");
    }

    private function logPostInfo(array $dto)
    {
        $str = '*** START PayPal dto: '."/n/r";

        foreach($dto AS $key => $value){
            //$str .= $key.' => '.$value."/n/r";
            Log::info($key.' => '.$value);
        }

        $str .= '*** END PayPal dto ***';
    }

    private function makeDto(): array
    {
        Log::info('***** START RAW LOGGING *****');
        foreach($_POST AS $key => $value){
            Log::info($key.' => '.$value);
        }
        Log::info('***** END RAW LOGGING *****');

        /**
         * $parts contains the values for:
         * [
         *  0 => user_id,
         *  1 => event_id
         *  2 => amount
         *  3 => payment_category_id
         *  4 => vendor_id
         * ]
         */
        $parts = explode('*',$_POST['custom']);
        $parts[] = $_POST['verify_sign'];

        $a = [
            'payment_date' => $_POST['payment_date'],
            'payer' => $_POST['first_name'].' '.$_POST['last_name'],
            'payer_email' => $_POST['payer_email'],
            'payer_id' => $_POST['payer_id'],
            'address_name' => $_POST['address_name'],
            'address_street' => $_POST['address_street'],
            'address_city' => $_POST['address_city'],
            'address_state' => $_POST['address_state'],
            'address_zip' => $_POST['address_zip'],
            'item_name' => array_key_exists('item_name', $_POST) ? $_POST['item_name'] : 'item_name',
            'item_number' => array_key_exists('item_number', $_POST) ? $_POST['item_number'] : 'item_number',
            'item_name1' => array_key_exists('item_name1', $_POST) ? $_POST['item_name1'] : 'item_name1',
            'item_number1' => array_key_exists('item_number1', $_POST) ? $_POST['item_number1'] : 'item_number1',
            'amount' => $_POST['mc_gross'],
            'user_id' => $this->userId($parts),
            'event_id' => $this->eventId($parts),
            'paymenttype_id' => 2, //Paymenttypes::PAYPAL
            'vendor_id' => $_POST['verify_sign'],
            'custom' => $_POST['custom'],
        ];

        //log custom value
        Log::info('custom => '.$_POST['custom']);

        return $a;
    }

    private function eventId(array $parts)
    {
        return $parts[1];
    }

    private function userId(array $parts)
    {
        return $parts[0];
    }
}

