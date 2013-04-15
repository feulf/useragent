<?php

namespace Sail\Useragent;

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

Interface UseragentInterface
{

    /**
     * Set the useragent
     * @param string $ua
     */
    public function __construct($ua = null);



    /**
     * Set the useragent
     * @param string $ua
     */
    public function pushParser(ParserInterface $parser);


    /**
     * Get all the browser information
     * @param boolean $to_array false to get the result as object, true as array
     */
    public function getInfo($to_array = true);

    /**
     * Get the browser name
     */
    public function getBrowser();


    /**
     * Return all the OS information
     */
    public function getOS();



    /**
     * Return true if is a mobile device
     */
    public function isMobile();



    /**
     * Return the platform type, for example iPad, iPhone, Macintosh
     */
    public function getPlatform();

    

    /**
     *  get UA
     */
    public function getUA();



    /**
     *  set UA
     */
    public function setUA($ua);



    /**
     * Return the user agent string
     * @return string
     */
    public function __toString();
    


}
