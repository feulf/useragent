<?php

namespace Sail\Parser\Simple;

class Browser
{
    
    protected static $browser_list = array(
        'Chrome'  => 'Chrome',
        'Firefox' => 'Firefox',
        'MSIE'    => 'IE',
        'Safari'  => 'Safari',
        'Unknown' => 'Unknown'
    );

    public static function parse($ua)
    {
        // get the browser
        foreach( self::$browser_list as $preg_id => $id ) {
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

            default :
                preg_match("#$id/([^\s]*)#", $ua, $match);
                $version = $match[1];
                $name = "$id $version";
        }
        
        // 

        return array( 
            'id'      => $id,
            'name'    => $name,
            'version' => $version,
        );
        
        
    }
    
}
