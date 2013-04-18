<?php

namespace Sail\Useragent;

Abstract Class ParserAbstract implements ParserInterface
{

    const IS_MOBILE     = 'yes';
    const IS_NOT_MOBILE = 'no';
    
    // ua
    protected $ua;

    // all the info
    protected $info = array();
    
    // get the browser name, version and eventual extras
    protected $browser = array();
    
    // get the OS name, version, complete name and eventual extras
    protected $os = array();
    
    // get the platform name and eventual extras
    protected $platform = array();

    // get is_mobile
    protected $is_mobile;

    // set the useragent
    public function setUA($ua)
    {
        $this->reset();
        $this->ua = $ua;
    }

    // get the useragent
    public function getUA()
    {
        return $this->ua;
    }

    public function getBrowser()
    {
        return $this->browser;
    }

    public function getOS()
    {
        return $this->os;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function isMobile()
    {
        return $this->is_mobile ? static::IS_MOBILE : static::IS_NOT_MOBILE;
    }

    public function getInfo()
    {
        return $this->info;
    }

    final private function reset()
    {
        $this->browser = array();
        $this->os = array();
        $this->platform = array();
        $this->is_mobile = null;
        $this->info = array(
            'browser'   => $this->browser,
            'os'        => $this->os,
            'platform'  => $this->platform,
            'is_mobile' => $this->is_mobile,
            'ua'        => $this->ua,
        );
    }
}
