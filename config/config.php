<?php

// https://www.base64encode.org/

if(isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) === 'on'){
    define('SECRET_API_KEY', 'xnd_production_PoyCfOQh0LGol848e7tJHT6XbtPyoNd4kyXi+R1r/Gzf+r2iCwdwgw==');
    // xnd_production_PoyCfOQh0LGol848e7tJHT6XbtPyoNd4kyXi+R1r/Gzf+r2iCwdwgw==:
    // basic eG5kX3Byb2R1Y3Rpb25fUG95Q2ZPUWgwTEdvbDg0OGU3dEpIVDZYYnRQeW9OZDRreVhpK1Ixci9HemYrcjJpQ3dkd2d3PT06
}
else {
    define('SECRET_API_KEY', 'xnd_development_P4qAfOQh0LGol848e7tJHT6XbtPyoNd4kyXi+R1r/Gzf+r2iCwdxhA==');
    // xnd_development_P4qAfOQh0LGol848e7tJHT6XbtPyoNd4kyXi+R1r/Gzf+r2iCwdxhA==:
    // basic eG5kX2RldmVsb3BtZW50X1A0cUFmT1FoMExHb2w4NDhlN3RKSFQ2WGJ0UHlvTmQ0a3lYaStSMXIvR3pmK3IyaUN3ZHhoQT09Og==
    // { "external_id":"demo_1475801962607", "payer_email":"sample_email@xendit.co", "description":"Trip to Bali", "amount":"230000" }
}

define('SERVER_DOMAIN', 'https://api.xendit.co');

?>