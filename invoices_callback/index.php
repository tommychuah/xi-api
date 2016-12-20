<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["SCRIPT_NAME"] === "/invoices_callback/index.php") {
    $dataJSON = file_get_contents("php://input");
    $data = json_decode($dataJSON, TRUE);
    
    // write to callback.txt
    $file = 'callback.txt';
    $newContent = json_encode($data, JSON_PRETTY_PRINT)."\n\n";
    $newContent .= file_get_contents($file);
    file_put_contents($file, $newContent);

//    print_r("$data contains the updated invoice data \n");
//    print_r(json_encode($data, JSON_PRETTY_PRINT)."\n");
//    print_r("Update your database with the invoice status \n");
} else {
    print_r("Cannot ".$_SERVER["REQUEST_METHOD"]." ".$_SERVER["SCRIPT_NAME"]);
}

?>