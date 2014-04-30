<?php

namespace Sail;

/**
 *  Sail\UserAgent
 *  --------
 *  Library to get the browser information, including the version, 
 *  the device type, the operating system and more.
 * 
 *  @example 
 *  $useragent = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_2) 
 *  AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.56 Safari/537.17"
 *  $ua = new \Sail\UserAgent( $useragent );
 *  echo $ua->getBrowser();  // Chrome
 *  echo $ua->getVersion();  // 24.0.1312.56
 *  echo $ua->getPlatform(); // Macintosh
 *
 *  @license MIT
 *  @author Federico Ulfo 
 *  @version 1.0
 */

use Sail\Useragent\UseragentInterface;

class Useragent implements UseragentInterface
{

    /**
     * User Agent
     * @var parser $parser
     */
    protected $parser;
    
    protected $ua;


    /**
     * Set the useragent
     * @param string $ua
     */
    public function __construct($ua = null)
    {
        $this->ua = $ua;
    }
    
    /**
     * Set the useragent
     * @param string $ua
     */
    public function pushParser(Useragent\ParserInterface $parser)
    {
        $this->parser = $parser;
        if ($this->ua) {
            $this->setUA($this->ua);
        }
    }


    /**
     * Get all the browser information
     * @param boolean $to_array false to get the result as object, true as array
     */
    public function getInfo($to_array = true)
    {
        return $this->parser->getInfo($to_array);
    }
    
    /**
     * Get the browser name
     */
    public function getBrowser()
    {
        return $this->parser->getBrowser();
    }

    /**
     * Return all the OS information
     */
    public function getOS()
    {
        return $this->parser->getOS();
    }

    /**
     * Return true if is a mobile device
     */
    public function isMobile()
    {
        return filter_var($this->parser->isMobile(),FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Return the platform type, for example iPad, iPhone, Macintosh
     */
    public function getPlatform()
    {
        return $this->parser->getPlatform();
    }

    /**
     *  get UA
     */
    public function getUA()
    {
        return $this->parser->getUA();
    }
    
    /**
     *  set UA
     */
    public function setUA($ua)
    {
        $this->ua = $ua;
        $this->parser->setUA($ua);
    }

    /**
     * Return the user agent string
     * @return string
     */
    public function __toString()
    {
        return $this->parser->getUA();
    }
}
