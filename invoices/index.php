<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["SCRIPT_NAME"] === "/invoices/index.php") {

    require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/class/phpapicalls.class.php");

    $external_id =   $_POST["external_id"];
    $payer_email =   $_POST["payer_email"];
    $amount =        $_POST["amount"];
    $description =   $_POST["description"];
    
    $phpApiCalls = new phpApiCalls();
    $createInvoice = $phpApiCalls->createInvoice($external_id, $amount, $payer_email, $description);
    // print_r($createInvoice);

}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoices</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/style/style.css?v=2">
</head>
<body>
    <div class="main">
        <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/top.php"); ?> 
        <div class="docs-content-container">
            <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/navi.php"); ?> 
            <div class="content">
                <div class="titlepanel"><h1>Invoices</h1></div>
                <div class="container content_line"></div>
                <div class="r_panel">
                    <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" name="theForm" id="theForm" enctype="multipart/form-data">
                        <input type="Text" name="external_id" value="tc_12345678901234567890" /><br />
                        <input type="Text" name="payer_email" value="tommychuah@gmail.com" /><br />
                        <input type="Text" name="description" value="Seafood dinner at Ritz Calton" /><br />
                        <input type="Text" name="amount" value="11234" /><br />
                        <input type="submit" class="btn-style" name="submit" value="Create Invoice" />
                    </form>
                    <?php if($createInvoice): ?><br /><br />
                    <button onclick="window.open('<?php echo $createInvoice['invoice_url'] ?>')">Pay Now</button>
                    <button onclick="window.open('/invoices_callback/callback.txt')">Callback Data</button>
                    <div class="response"><?php print("<pre>".print_r($createInvoice,true)."</pre>"); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>