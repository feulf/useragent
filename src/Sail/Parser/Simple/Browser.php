<?php

namespace Sail\Parser\Simple;

class Browser
{
    
    protected static $browser_list = array(
        'Chrome'  => 'Chrome',
        'Firefox' => 'Firefox',
        'MSIE'    => 'Internet Explorer',
        'Safari'  => 'Safari',
        'Unknown' => 'Unknown'
    );

    public static function parse($ua)
    {
        // get the browser
        foreach( self::$browser_list as $id => $browser ) {
            if ( strpos($ua, $id) ) {
                break;
            }
        }

        // get the version
        switch ($id) {

            case 'MSIE':
                preg_match("#MSIE ([^\s]*)#", $ua, $match);
                $version = $match[1];
                break;
                
            case 'Safari':
                preg_match("/Version\/([^\s]*)/", $ua, $match);
                $version = $match[1];
                break;

            default :
                preg_match("#$id/([^\s]*)#", $ua, $match);
                $version = $match[1];
            
        }
        
        // 

        return array( 
            'id'      => $id,
            'name'    => $browser,
            'version' => $version,
        );
        
        
    }
    
}
