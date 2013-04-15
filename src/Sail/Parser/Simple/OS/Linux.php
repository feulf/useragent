<?php

namespace Sail\Parser\Simple\OS;

class Linux{
    
    protected static $version_list = array(
            'Arch Linux'           => 'Arch Linux',
            'CentOS'               => 'CentOS',
            'Debian'               => 'Debian',
            'Fedora'               => 'Fedora',
            'entoo'                => 'Gentoo', // search for entoo, because case sensitive
            'Ubuntu'               => 'Ubuntu',
            'Slackware'            => 'Slackware',
            'Red Hat'              => 'Red Hat',
            'Mint'                 => 'Mint',
            'Mandriva'             => 'Mandriva',
            'Unknown'              => 'Linux Unknown',
    );
    
    public static function parse($ua) {
        foreach (self::$version_list as $id => $version) {
            if (strpos($ua, $id)) {
                break;
            }
        }
        
        return array($id, $version);
    }
}