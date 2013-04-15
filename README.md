#Sail\UserAgent

Install with composer:
``` json
    {
        "require": {
            "sail/useragent": "1.0.*"
        },
        "repositories": [{
            "type": "vcs",
            "url": "https://github.com/rainphp/useragent"
        }]
    }
```

create an index.php file:
``` php

<?php

require __DIR__ . "/vendor/autoload.php";

use Sail\UserAgent;
use Sail\UserAgent\Parser\Simple;

// test chrome
$useragent_string = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17";
test($useragent, "chrome 24");

$ua = new Useragent( $useragent_string );
$ua->pushParser( new Simple() );

echo "<pre>";
print_r( $ua->getInfo() );

```
