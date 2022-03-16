<?php

namespace Sail\Parser\Simple\OS;

class Windows{
    
    protected static $version_list = array(
            'Windows 2000'         => 'Windows 2000',
            'Windows NT 5.0'       => 'Windows 2000',
            'Windows NT 5.2'       => 'Windows 2003 Server',
            'Windows NT 6.1'       => 'Windows 7',
            'Windows NT 6.2'       => 'Windows 8',
            'Windows 95'           => 'Windows 95',
            'Win 95'               => 'Windows 95',
            'Windows 98'           => 'Windows 98',
            'Windows CE'           => 'Windows CE',
            'Windows ME'           => 'Windows ME',
            'Windows 9x 4.90'      => 'Windows ME',
            'Windows Mobile'       => 'Windows Mobile',
            'Windows NT 4'         => 'Windows NT 4',
            'Windows Phone OS 7.'  => 'Windows Phone 7',
            'XBLWP7'               => 'Windows Phone 7',
            'Windows NT 6.0'       => 'Windows Vista',
            'Windows NT 5.1'       => 'Windows XP',
            ' '                     => 'Other Windows',
    );
    
    public static function parse($ua) {
        foreach (self::$version_list as $id => $name) {
            if (strpos($ua, $id)) {
                break;
            }
        }
        
        return array("Windows", $name);
    }
}
