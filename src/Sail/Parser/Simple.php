<?php

namespace Sail\Parser;
use Sail\Useragent\ParserAbstract;

class Simple extends ParserAbstract
{

    public function getBrowser() 
    {
        if (!$this->browser) {
            $this->browser = Simple\Browser::parse($this->ua);
        }
        return $this->browser;
    }
    
    public function getOS()
    {
        if (!$this->os) {
            $this->os = Simple\OS::parse($this->ua);
        }
        return $this->os;
    }
    
    public function getPlatform()
    {
        if (!$this->platform) {
            $this->platform = Simple\Platform::parse($this->ua);
        }
        return $this->platform;
    }
    
    public function isMobile()
    {
        if (!$this->is_mobile) {
            $this->is_mobile = preg_match('#iPhone|iPad|Android|Mobile#', $this->ua);
        }
        return $this->is_mobile ? self::IS_MOBILE : self::IS_NOT_MOBILE;
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
