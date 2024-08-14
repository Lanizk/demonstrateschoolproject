<?php
namespace App\Services;

use AfricasTalking\SDK\AfricasTalking;

class SmsService
{
    protected $gateway;

    public function __construct()
    {
        $username = 'sandbox'; // use 'sandbox' in development
        $apiKey = env('AFRICASTALKING_API_KEY'); // add this in your .env file

        // Initialize the SDK
        $this->gateway = new AfricasTalking($username, $apiKey);
    }

    public function sendBulkSms($recipients, $message)
    {
        $sms = $this->gateway->sms();

        try {
            $results = $sms->send([
                'to'      => $recipients,
                'message' => $message,
                'from'    => '6837', // Optional sender ID
            ]);

            return $results;
        } catch (Exception $e) {
            // Handle exception
            return $e->getMessage();
        }
    }
}
