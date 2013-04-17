<?php

namespace Sail\Parser\UAS;

class Parser
{

    use Data;
    
    public static function parse($ua) {

        $data = self::getData();
        $result = [];
        
        // crawler
        foreach ($data['robots'] as $test) {
            if ($test[0] == $ua) {
                $result['typ']                            = 'Robot';
                if ($test[1]) $result['ua_family']        = $test[1];
                if ($test[2]) $result['ua_name']          = $test[2];
                if ($test[3]) $result['ua_url']           = $test[3];
                if ($test[4]) $result['ua_company']       = $test[4];
                if ($test[5]) $result['ua_company_url']   = $test[5];
                if ($test[6]) $result['ua_icon']          = $test[6];
                if ($test[7]) { // OS set
                    $os_data = $data['os'][$test[7]];
                    if ($os_data[0]) $result['os_family']       =   $os_data[0];
                    if ($os_data[1]) $result['os_name']         =   $os_data[1];
                    if ($os_data[2]) $result['os_url']          =   $os_data[2];
                    if ($os_data[3]) $result['os_company']      =   $os_data[3];
                    if ($os_data[4]) $result['os_company_url']  =   $os_data[4];
                    if ($os_data[5]) $result['os_icon']         =   $os_data[5];
                }
                if ($test[8]) $result['ua_info_url']      = self::$info_url.$test[8];
                return $result;
            }
        }

        // find a browser based on the regex
        foreach ($data['browser_reg'] as $test) {
            if (preg_match($test[0],$ua,$info)) { // $info may contain version
                $browser_id = $test[1];
                break;
            }
        }

        // a valid browser was found
        if ($browser_id) { // browser detail
            $browser_data = $data['browser'][$browser_id];
            if ($data['browser_type'][$browser_data[0]][0]) $result['typ']    = $data['browser_type'][$browser_data[0]][0];
            if (isset($info[1]))    $result['ua_version']     = $info[1];
            if ($browser_data[1])   $result['ua_family']      = $browser_data[1];
            if ($browser_data[1])   $result['ua_name']        = $browser_data[1].(isset($info[1]) ? ' '.$info[1] : '');
            if ($browser_data[2])   $result['ua_url']         = $browser_data[2];
            if ($browser_data[3])   $result['ua_company']     = $browser_data[3];
            if ($browser_data[4])   $result['ua_company_url'] = $browser_data[4];
            if ($browser_data[5])   $result['ua_icon']        = $browser_data[5];
            if ($browser_data[6])   $result['ua_info_url']    = self::$info_url.$browser_data[6];
        }

        // browser OS, does this browser match contain a reference to an os?
        if (isset($data['browser_os'][$browser_id])) { // os detail
            $os_id = $data['browser_os'][$browser_id][0]; // Get the os id
            $os_data = $data['os'][$os_id];
            if ($os_data[0])    $result['os_family']      = $os_data[0];
            if ($os_data[1])    $result['os_name']        = $os_data[1];
            if ($os_data[2])    $result['os_url']         = $os_data[2];
            if ($os_data[3])    $result['os_company']     = $os_data[3];
            if ($os_data[4])    $result['os_company_url'] = $os_data[4];
            if ($os_data[5])    $result['os_icon']        = $os_data[5];
            return $result;
        }

        // search for the os
        foreach ($data['os_reg'] as $test) {
            if (preg_match($test[0],$ua)) {
                $os_id = $test[1];
                break;
            }
        }

        // a valid os was found
        if ($os_id) { // os detail
            $os_data = $data['os'][$os_id];
            if ($os_data[0]) $result['os_family']       = $os_data[0];
            if ($os_data[1]) $result['os_name']         = $os_data[1];
            if ($os_data[2]) $result['os_url']          = $os_data[2];
            if ($os_data[3]) $result['os_company']      = $os_data[3];
            if ($os_data[4]) $result['os_company_url']  = $os_data[4];
            if ($os_data[5]) $result['os_icon']         = $os_data[5];
        }
        return $result;
    }

}
