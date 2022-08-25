<?php
/**
 * Coregenix config provides the configuration parameters for a coregenix environment.
 * @author Christoph Grosswardt <christoph@grosswardt.de>
 * @license GNU General Public License version 3 or later; see LICENSE 
 * @package coregenix
 */

namespace cgrosswardt\coregenix;

/**
 * coregenix config library
 * @author Christoph Grosswardt <christoph@grosswardt.de>
 * @see https://github.com/vlucas/phpdotenv
 * @version 20220825
 */
class config
{
    /**
     * This variable stores whether the necessary classes have been initialized or not.
     */
    protected static $initialized = [];

    /**
     * This method returns a specified value ($index) from the specified environment file ($context).
     * 
     * If a value is not found, NULL is returned.
     * @author Christoph Grosswardt <christoph@grosswardt.de>
     * @param string $index This parameter is the key that is searched for.
     * @param string $context If this parameter is NULL, it is loaded into the .env file in the BASE_DIR. If you want to load another file, you can specify the full name here (e.g. .database).
     * @return mixed
     * @see https://github.com/vlucas/phpdotenv#nesting-variables
     * @version 20220825
     */
    public static function get(string $index, string $context = NULL)
    {
        self::initialize($context);
        return isset($_ENV[$index]) === TRUE ? $_ENV[$index] : NULL;
    }

    /**
     * This method initializes the necessary libraries and provides the environment variables.
     * @author Christoph Grosswardt <christoph@grosswardt.de>
     * @param string $context
     * @return bool
     * @version 20220825
     */
    protected static function initialize(string $context = NULL) : bool
    {
        if(isset(self::$initialized[$context]) === FALSE)
        {
            require_once BASE_DIR.'/vendor/autoload.php';
            $dotenv =  \Dotenv\Dotenv::createImmutable(BASE_DIR, $context);
            $dotenv->safeLoad();
            self::$initialized[$context] = TRUE;
        }
        return TRUE;
    }
}

