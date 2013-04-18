<?php

namespace Sail\Parser\UAS;

class Parser
{

    use Data;
    
    public static function parse($ua)
    {

        $data = self::getData();
        $result = [];
        
        // crawler
        foreach ($data['robots'] as $test) {
            if ($test[0] == $ua) {
                $result['typ']                 = 'Robot';
                $result['ua_family']           = $test[1] ? $test[1] : '';
                $result['ua_name']             = $test[2] ? $test[2] : '';
                $result['ua_url']              = $test[3] ? $test[3] : '';
                $result['ua_company']          = $test[4] ? $test[4] : '';
                $result['ua_company_url']      = $test[5] ? $test[5] : '';
                $result['ua_icon']             = $test[6] ? $test[6] : '';

                if ($test[7]) { // OS set
                    $os_data                   = $data['os'][$test[7]];
                    $result['os_family']       = $os_data[0] ? $os_data[0] : '';
                    $result['os_name']         = $os_data[1] ? $os_data[1] : '';
                    $result['os_url']          = $os_data[2] ? $os_data[2] : '';
                    $result['os_company']      = $os_data[3] ? $os_data[3] : '';
                    $result['os_company_url']  = $os_data[4] ? $os_data[4] : '';
                    $result['os_icon']         = $os_data[5] ? $os_data[5] : '';
                }
                $result['ua_info_url']         = $test[8] ?
                                                 self::$info_url.$test[8] : '';
                return $result;
            }
        }

        // find a browser based on the regex
        foreach ($data['browser_reg'] as $test) {
            if (preg_match($test[0], $ua, $info)) {
                $browser_id = $test[1];
                break;
            }
        }

        // a valid browser was found
        if ($browser_id) { // browser detail
            $browser_data = $data['browser'][$browser_id];
            if ($data['browser_type'][$browser_data[0]][0]) {
                $result['typ'] = $data['browser_type'][$browser_data[0]][0];
            } else {
                $reselt['typ'] = '';
            }
            
            
            $result['ua_version']  = isset($info[1]) ? $info[1] : '';
            $result['ua_family']   = $browser_data[1] ? $browser_data[1] : '';
            if ($browser_data[1]) {
                $result['ua_name'] = $browser_data[1].(isset($info[1]) ? ' '.$info[1] : '');
            } else {
                $result['ua_name'] = '';
            }
            $result['ua_url']         = $browser_data[2] ? $browser_data[2] : '';
            $result['ua_company']     = $browser_data[3];
            $result['ua_company_url'] = $browser_data[4];
            $result['ua_icon']        = $browser_data[5];
            $result['ua_info_url']    = $browser_data[5] ?
                                        self::$info_url.$browser_data[6] : '';
        }

        // browser OS, does this browser match contain a reference to an os?
        if (isset($data['browser_os'][$browser_id])) { // os detail
            $os_id = $data['browser_os'][$browser_id][0]; // Get the os id
            $os_data = $data['os'][$os_id];
            $result['os_family']      = $os_data[0] ? $os_data[0] : '';
            $result['os_name']        = $os_data[1] ? $os_data[1] : '';
            $result['os_url']         = $os_data[2] ? $os_data[2] : '';
            $result['os_company']     = $os_data[3] ? $os_data[3] : '';
            $result['os_company_url'] = $os_data[4] ? $os_data[4] : '';
            $result['os_icon']        = $os_data[5] ? $os_data[5] : '';
            return $result;
        }

        // search for the os
        foreach ($data['os_reg'] as $test) {
            if (preg_match($test[0], $ua)) {
                $os_id = $test[1];
                break;
            }
        }

        // a valid os was found
        if ($os_id) { // os detail
            $os_data = $data['os'][$os_id];
            $result['os_family']       = $os_data[0] ? $os_data[0] : '';
            $result['os_name']         = $os_data[1] ? $os_data[1] : '';
            $result['os_url']          = $os_data[2] ? $os_data[2] : '';
            $result['os_company']      = $os_data[3] ? $os_data[3] : '';
            $result['os_company_url']  = $os_data[4] ? $os_data[4] : '';
            $result['os_icon']         = $os_data[5] ? $os_data[5] : '';
        }
        return $result;
    }
}
