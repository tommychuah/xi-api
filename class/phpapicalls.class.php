<?php

class phpApiCalls {

    function getBalance () {
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        $end_point = SERVER_DOMAIN.'/balance';

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERPWD, SECRET_API_KEY.":");
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on'){
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        }
        
        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }

    function createInvoice ($external_id, $amount, $payer_email, $description) {
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        $end_point = SERVER_DOMAIN.'/v2/invoices';

        $data['external_id'] = $external_id;
        $data['amount'] = (int)$amount;
        $data['payer_email'] = $payer_email;
        $data['description'] = $description;

        $payload = json_encode($data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERPWD, SECRET_API_KEY.":");
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on'){
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        }

        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }
    
    function createCallbackVirtualAccount ($external_id, $bank_code, $name) {
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        $end_point = SERVER_DOMAIN.'/callback_virtual_accounts';

        $data['external_id'] = $external_id;
        $data['bank_code'] = $bank_code;
        $data['name'] = $name;

        $payload = json_encode($data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERPWD, SECRET_API_KEY.":");
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on'){
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        }

        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }
    
    function createDisbursement ($external_id, $amount, $bank_code, $account_holder_name, $account_number) {
        $curl = curl_init();

        $headers = array();
        $headers[] = 'Content-Type: application/json';

        $end_point = SERVER_DOMAIN.'/disbursements';

        $data['external_id'] = $external_id;
        $data['amount'] = (int)$amount;
        $data['bank_code'] = $bank_code;
        $data['account_holder_name'] = $account_holder_name;
        $data['account_number'] = $account_number;

        $payload = json_encode($data);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_USERPWD, SECRET_API_KEY.":");
        curl_setopt($curl, CURLOPT_URL, $end_point);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on'){
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
        }

        $response = curl_exec($curl);
        curl_close($curl);

        $responseObject = json_decode($response, true);
        return $responseObject;
    }
    
}

?>


