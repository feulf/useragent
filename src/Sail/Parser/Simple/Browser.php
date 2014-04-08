<?php

namespace Sail\Parser\Simple;

class Browser
{
    
    protected static $browser_list = array(
        'Chrome'  => 'Chrome',
        'Firefox' => 'Firefox',
        'MSIE'    => 'MSIE',
        'Safari'  => 'Safari',
        'Unknown' => 'Unknown'
    );

    public static function parse($ua)
    {
        $name = null;
        $version = null;
        
        // get the browser
        foreach (self::$browser_list as $preg_id => $id) {
            if ( strpos($ua, $preg_id) ) {
                break;
            }
        }

        // get the version
        switch ($id) {
            case 'IE':
                preg_match("#MSIE ([^\s;]*)#", $ua, $match);
                $version = $match[1];
                $name = "$id $version";
                break;
            case 'Safari':
                preg_match("/Version\/([^\s]*)/", $ua, $match);
                $version = $match[1];
                $name = "$id $version";
                break;
            default:
                preg_match("#$id/([^\s]*)#", $ua, $match);
                if(count($match)>0){
                    $version = $match[1];
                    $name = "$id $version";
                }
        }
        
        // handle IE11 new user agent
        preg_match('/MSIE (.*?);/', $ua, $matches);
        if (count($matches)<2){
            preg_match('/Trident\/\d{1,2}.\d{1,2}; rv:([0-9]*)/', $ua, $matches);
        }
        
        if (count($matches)>1){
            // then we're using IE
            $id = 'MSIE';
            $name = 'MSIE';
            $version = $matches[1];
        }
        
        if (strpos($ua, 'Trident/7.0') !== false && strpos($ua, 'rv:11.0') !== false) {
            $id = 'MSIE';
            $name = 'MSIE';
            $version = '11';
        }

        return array(
            'id'      => $id,
            'name'    => $name,
            'version' => $version,
        );
   
    }
}
