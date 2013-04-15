<?php

namespace Sail\Parser\Simple;

class OS
{
    
    protected static $os_list = array(
            'OS X'    => 'OS X',
            'Windows' => 'Windows',
            'Linux'   => 'Linux',
            'X11'     => 'Linux',
    );
    
    public static function parse($ua)
    {
        // get the browser
        foreach( self::$os_list as $id => $os ) {
            if (strpos($ua, $id)) {
                break;
            }
        }
        
        switch ($id) {
            case 'OS X':
                list($id, $version) = OS\OSX::parse($ua);
                break;
            case 'Windows':
                list($id, $version) = OS\Windows::parse($ua);
                break;
            case 'Linux':
                list($id, $version) = OS\Linux::parse($ua);
                break;
        }
        
        return array( 
            'os'        => $os,
            'version'   => $version,
            'id'        => $id,
        );
        
    }
    
}
