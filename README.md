#Sail\UserAgent
This Library detect the browser and all its informations, such as the browser name and version, the OS and the platform. 
It uses Dependency Injection to load a Parser library, so you can choose the level of details you need from the detection.

##Parser
- **Parser\Simple**, it detects the common browsers (Chrome, Safari, Firefox, MSIE), the basic OS (OS X, iOS, Windows, Linux), it detects the device (iPhone,iPad,Android Phone) and the type of useragent (browser, mobile browser, mailer, spider).
- **Parser\UAdvanced** (in progress), it detects all the browser listed in 
http://user-agent-string.info/list-of-ua
- **Parser\Quick** (in progress), it detect the browser name and the device computer, iphone, ipad, generic mobile. 
- **Parse\Browscap** (in progress), this parser uses the PHP function getBrowser() which is slow and not precise. Use this parser only to refactor your code, then switch to one of the other parser.

## Quick Start
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
