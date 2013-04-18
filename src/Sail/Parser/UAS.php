<?php

namespace Sail\Parser;

use Sail\Useragent\ParserAbstract;

class UAS extends ParserAbstract
{

    public function setUA($ua)
    {
        parent::setUA($ua);
        $this->parse();
    }

    private function parse()
    {
        $info = UAS\Parser::parse($this->ua);

        $this->browser = array(
                            'id'      => $info['ua_family'],
                            'name'    => $info['ua_name'],
                            'version' => $info['ua_version'],
                            'url'     => $info['ua_url'],
                            'icon'    => $info['ua_icon'],
        );
        
        $this->os = array(
                            'id'          => $info['os_family'],
                            'name'        => $info['os_name'],
                            'url'         => $info['os_url'],
                            'company'     => $info['os_company'],
                            'company_url' => $info['os_company_url'],
                            'icon'        => $info['os_icon'],
        );
        
        $this->is_mobile = $info['typ'] == 'mobile_browser';
        
        return $this->info = array(
            'browser'   => $this->browser,
            'os'        => $this->os,
            'platform'  => array(),
            'is_mobile' => $this->is_mobile,
            'ua'        => $this->ua
        );

    }
}
