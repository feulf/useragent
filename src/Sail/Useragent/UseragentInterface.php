<?php

namespace Sail\Useragent;

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
