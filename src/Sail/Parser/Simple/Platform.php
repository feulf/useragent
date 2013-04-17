<?php

namespace Sail\Parser\Simple;

class Platform
{

    // preg => name
    protected static $platform_list = array(
            // mailer
            'Outlook'     => 'Mailer',
            'MSOffice'    => 'Mailer',
            'Thunderbird' => 'Mailer',
            'Sparrow'     => 'Mailer',

            // mobile
            'iPhone'      => 'Mobile',
            'iPad'        => 'Mobile',
            'Android'     => 'Mobile',
            'Mobile'      => 'Mobile',

            // spider
        
            // default
            ' '           => 'Browser'
    );
    
    // default platform
    protected static $default_platform = 'Browser';

    public static function parse($ua)
    {

        // get the browser
        foreach( self::$platform_list as $id => $platform ) {
            if ( strpos($ua, $id) ) {
                break;
            }
        }
        
        return array( 
            'id'        => $id,
            'platform'  => $platform,
        );
        
        
    }
    
}
