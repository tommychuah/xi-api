<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["SCRIPT_NAME"] === "/disbursements/index.php") {

    require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/class/phpapicalls.class.php");

    $external_id =          $_POST["external_id"];
    $amount =               $_POST["amount"];
    $bank_code =            $_POST["bank_code"];
    $account_holder_name =  $_POST["account_holder_name"];
    $account_number =       $_POST["account_number"];
    
    $phpApiCalls = new phpApiCalls();
    $createDisbursement = $phpApiCalls->createDisbursement($external_id, $amount, $bank_code, $account_holder_name, $account_number);
    // print_r($createDisbursement);
    
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disbursements</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/style/style.css?v=2">
</head>
<body>
    <div class="main">
        <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/top.php"); ?> 
        <div class="docs-content-container">
            <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/navi.php"); ?> 
            <div class="content">
                <div class="titlepanel"><h1>Disbursements</h1></div>
                <div class="container content_line"></div>
                <div class="r_panel">
                <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" name="theForm" id="theForm" enctype="multipart/form-data">
                    <input type="Text" name="external_id" value="tc_12345678901234567890" /><br />
                    <input type="Text" name="bank_code" value="BCA" /><br />
                    <input type="Text" name="account_holder_name" value="Bob Jones" /><br />
                    <input type="Text" name="account_number" value="1231241231" /><br />
                    <input type="Text" name="amount" value="17000" /><br />
                    <input type="submit" class="btn-style" name="submit" value="Create Disbursement" />
                </form>
                <?php if($createDisbursement): ?><br /><br />
                <button onclick="window.open('/disbursements_callback/callback.txt')">Callback Data</button>
                <div class="response"><?php print("<pre>".print_r($createDisbursement,true)."</pre>"); ?></div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
