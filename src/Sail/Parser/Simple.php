<?php

namespace Sail\Parser;
use Sail\Useragent\ParserAbstract;

class Simple extends ParserAbstract
{

    public function getBrowser() 
    {
        return Simple\Browser::parse($this->ua);
    }
    
    public function getOS()
    {
        return Simple\OS::parse($this->ua);
    }
    
    public function getPlatform()
    {
        return Simple\Platform::parse($this->ua);
    }
    
    public function isMobile()
    {
        return preg_match('#iPhone|iPad|Android|Mobile#', $this->ua);
    }
    
    public function getInfo()
    {
        return array(
            'browser'   => $this->getBrowser(),
            'os'        => $this->getOS(),
            'platform'  => $this->getPlatform(),
            'is_mobile' => $this->isMobile(),
            'ua'        => $this->ua
        );
    }


}
