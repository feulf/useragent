<?php

namespace Sail\Useragent;

Abstract Class ParserAbstract implements ParserInterface
{

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
    
    protected function reset(){

        $this->browser = array(
            'id'        => '',
            'name'      => '',
            'version'   => '',
        );

        $this->os = array(
            'id'        => '',
            'name'      => '',
            'version'   => '',
        );

        $this->platform = array(
            'type'      => '',
            'name'      => '',
            'is_mobile' => null,
        );
        
        $this->info = array(
            'browser'   => $this->browser,
            'os'        => $this->os,
            'platform'  => $this->platform,
            'ua'        => $this->ua,
        );
        
    }

}
