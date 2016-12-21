<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["SCRIPT_NAME"] === "/fixedvirtualaccounts/index.php") {

    require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/class/phpapicalls.class.php");

    $external_id =  $_POST["external_id"];
    $bank_code =    $_POST["bank_code"];
    $name =         $_POST["name"];

    $phpApiCalls = new phpApiCalls();
    $createAccount = $phpApiCalls->createCallbackVirtualAccount($external_id, $bank_code, $name);
    // print_r($createAccount);
    
}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixed Virtual Accounts</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/style/style.css?v=4">
</head>
<body>
    <div class="main">
        <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/top.php"); ?> 
        <div class="docs-content-container">
            <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/navi.php"); ?> 
            <div class="content">
                <div class="titlepanel"><h1>Fixed Virtual Accounts</h1></div>
                <div class="container content_line"></div>
                <div class="r_panel">
                <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" name="theForm" id="theForm" enctype="multipart/form-data">
                    <input type="Text" name="external_id" value="tc_12345678901234567890" /><br />
                    <input type="Text" name="bank_code" value="BCA" /><br />
                    <input type="Text" name="name" value="Rika Sutanto" /><br />
                    <input type="submit" class="btn-style" name="submit" value="Create fixed virtual account" /><br /><br />
                </form>
                <?php if($createAccount): ?>
                <button onclick="window.open('/fixedvirtualaccounts_callback/callback.txt')">Callback Data</button>
                <div class="response"><?php print("<pre>".print_r($createAccount,true)."</pre>"); ?></div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>