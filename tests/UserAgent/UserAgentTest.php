<?php

use Sail\UserAgent;
use Sail\Parser\Simple;

class Sail_UserAgentTest extends PHPUnit_Framework_TestCase {

    // ua obj
    protected $ua;

    protected $useragent = array(
        'Chrome' => array(
                'string'=> "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17",
                'os' => 'OS X',
                'browser' => 'Chrome',
                'version' => '24.0.1312.56',
        ),

        'Safari' => array(
                'string'=> "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_5; en-us) AppleWebKit/525.26.2 (KHTML, like Gecko) Version/3.2 Safari/525.26.12",
                'os' => 'OS X',
                'browser' => 'Safari',
                'version' => '3.2',
        ),
        
    );

    public function setup(){
        $this->ua = new UserAgent();
        $this->ua->pushParser(new Simple());
    }
 
    public function testGetUA(){
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getUA() == $ua['string']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getUA() == $ua['string']);
    }

    public function testGetBrowser() {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['name'] == $ua['browser']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['name'] == $ua['browser']);
    }
    
    public function testGetBrowserVersion() {
        
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['version'] == $ua['version']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        
        $this->assertTrue($this->ua->getBrowser()['version'] == $ua['version']);
    }
    
    public function testGetOS() {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getOS()['os'] == $ua['os']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getOS()['os'] == $ua['os']);
    }
    
}
