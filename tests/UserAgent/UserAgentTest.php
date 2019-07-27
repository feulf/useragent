<?php

namespace Sail;

use Sail\Useragent;
use Sail\Parser\Simple;
use PHPUnit\Framework\TestCase;

class UserAgentTest extends TestCase
{
    // ua obj
    protected $ua;

    protected $useragent = array(
        'Chrome' => array(
                'string'=> "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17",
                'os' => 'OS X 10.8.2 Mountain Lion',
                'browser' => 'Chrome 24.0.1312.56',
                'version' => '24.0.1312.56',
        ),

        'Safari' => array(
                'string'=> "Mozilla/5.0 (Macintosh; U; Intel Mac OS X 10_5_5; en-us) AppleWebKit/525.26.2 (KHTML, like Gecko) Version/3.2 Safari/525.26.12",
                'os' => 'OS X 10.5.5 Leopard',
                'browser' => 'Safari 3.2',
                'version' => '3.2',
        ),

    );

    protected function setup()
    {
        $this->ua = new UserAgent();
        $this->ua->pushParser(new Simple());
    }

    public function testGetUA()
    {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getUA() == $ua['string']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getUA() == $ua['string']);
    }

    public function testGetBrowser()
    {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['name'] == $ua['browser']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['name'] == $ua['browser']);
    }

    public function testGetBrowserVersion()
    {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getBrowser()['version'] == $ua['version']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);

        $this->assertTrue($this->ua->getBrowser()['version'] == $ua['version']);
    }

    public function testGetOS()
    {
        $ua = $this->useragent['Chrome'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getOS()['name'] == $ua['os']);

        $ua = $this->useragent['Safari'];
        $this->ua->setUA($ua['string']);
        $this->assertTrue($this->ua->getOS()['name'] == $ua['os']);
    }
}
