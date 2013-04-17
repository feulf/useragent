<?php

namespace Sail\Parser\Simple\OS;

class Linux{
    
    protected static $version_list = array(
            'Arch Linux',
            'CentOS',
            'Debian',
            'Fedora',
            'Gentoo',
            'Ubuntu',
            'Slackware',
            'Red Hat',
            'Mint',
            'Mandriva',
            'Other Linux',
    );
    
    public static function parse($ua) {
        foreach (self::$version_list as $version) {
            if (stripos($ua, $version)) {
                break;
            }
        }

        return array("Linux", "Linux ($version)");
    }
}