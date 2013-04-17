<?php

namespace Sail\Parser\Simple\OS;

class OSX
{

    protected static $version_list = array(
            '10_8[\d_.]*' => 'Mountain Lion',
            '10_7[\d_.]*' => 'Lion',
            '10_6[\d_.]*' => 'Snow Leopard',
            '10_5[\d_.]*' => 'Leopard',
            '10_4[\d_.]*' => 'Tiger',
            '10_3[\d_.]*' => 'Panther',
            ' '          => 'Unknown OSX',
    );
    
    public static function parse($ua) {
        
        // check if mobile, if it is get iOS version
        if (preg_match("#iPhone|iPad#", $ua) && 
            preg_match("#OS ([\d_.]*)#", $ua, $match)) {
            $version = str_replace('_', '.', $match[1]);
            $name = "iOS $version";
            $id = 'iOS';
        } else { // get the version
            foreach (self::$version_list as $v => $name) {
                if (preg_match("/$v/", $ua, $match)) {
                    $version = str_replace('_', '.', $match[0]);
                    $id = 'OS X';
                    $name = "$id $version $name";
                    break;
                }
            }
        }

        return array($id, $name);
    }

}
