<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && $_SERVER["SCRIPT_NAME"] === "/index.php") {
    
    require_once ($_SERVER["DOCUMENT_ROOT"]."/config/config.php");
    require_once ($_SERVER["DOCUMENT_ROOT"]."/class/phpapicalls.class.php");

    $phpApiCalls = new phpApiCalls();
    $getBalance = $phpApiCalls->getBalance();
    // print_r($getBalance);

}

?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balances</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,300&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
    <div class="main">
        <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/top.php"); ?> 
        <div class="docs-content-container">
            <?php require_once ($_SERVER["DOCUMENT_ROOT"]."/include/navi.php"); ?> 
            <div class="content">
                <div class="titlepanel"><h1>Balances</h1></div>
                <div class="container content_line"></div>
                <div class="r_panel">
                    <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" name="theForm" id="theForm" enctype="multipart/form-data">
                        <input type="submit" class="btn-style" name="submit" value="Get Balance" />
                    </form>
                    <?php if($getBalance): ?> 
                    <p>Your balance is: <strong>IDR <?php echo number_format($getBalance['balance'],3); ?></strong></p>
                    <div class="response"><?php print("<pre>".print_r($getBalance,true)."</pre>"); ?></div>
                    <?php endif; ?> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>