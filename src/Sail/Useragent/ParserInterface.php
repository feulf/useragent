<?php

namespace Sail\Useragent;

Interface ParserInterface
{

    // set the useragent
    public function setUA($ua);

    // get the useragent
    public function getUA();

    // get the browser info
    public function getInfo();

    // get the browser
    public function getBrowser();

    // get the Operating System
    public function getOS();

    // get the device (iphone, ipad)
    public function getPlatform();

    // get the device (iphone, ipad)
    public function isMobile();
}
