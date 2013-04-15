#Sail\UserAgent

Install with composer:
``` json
    {
        "require": {
            "sail/useragent": "1.0.*"
        }
    }
```

create an index.php file:
``` php

<?php

require "vendor/autoload.php";

use Sail\UserAgent;
use Sail\Parser\Simple;

// test chrome
$ua_string = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17";

$ua = new Useragent($ua_string);
$ua->pushParser(new Simple());

echo "<pre>";
$info = $ua->getInfo();
print_r($info);

```
