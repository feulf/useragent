<?php

namespace Sail\Parser\UAS;

trait Data
{

    private static $data = array();
    
    private static $ini_url  = 'http://user-agent-string.info/rpc/get_data.php?key=free&format=ini';
    private static $info_url = 'http://user-agent-string.info';
    private static $cache_dir = 'cache/';
    private static $cache_filename = 'UAS.php';
    private static $cache_filepath;

    public static function getData() 
    {
        // todo check timeout time (use aps)
        if (self::$data) {
            return self::$data;
        }

        if (!self::$cache_filepath) {
            self::$cache_filepath =  self::$cache_dir . self::$cache_filename;
        }
        
        // todo: check timeout
        if (!file_exists(self::$cache_filepath)) {
            self::downloadIniFile();
        }

        return self::$data = include self::$cache_filepath;

    }
    
    private static function downloadIniFile()
    {
        if (!file_exists(self::$cache_filepath)) {
            $UAS_ini = file_get_contents(self::$ini_url);
            $data = parse_ini_string($UAS_ini, true);
            $data_php = '<?php return ' . var_export($data, 1) . ';';
            file_put_contents(self::$cache_filepath, $data_php);
        }
    }

}
