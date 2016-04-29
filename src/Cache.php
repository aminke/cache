<?php 

namespace Cache;

/**
 * Classe permettant de gérer le cache 
 * 
 * @author kguillo
 */
class Cache 
{
    
    public static $_instance; 
    
    /**
     * Méthode qui crée l'unique instance si elle n'existe pas puis la retourne.
     * 
     * @param string $type
     * @throws \Exception
     */
    public static function getInstance($type = null)
    {
        if (is_null(self::$_instance)) {
            if (!class_exists('Cache\\Types\\'.$type)) {
                throw new \Exception("This type does not exist!");
            }
            $class = 'Cache\\Types\\'.$type;
            self::$_instance = new $class();
        }
        
        return self::$_instance;
    }
    
    /**
     * 
     * @param unknown $name
     * @param unknown $arguments
     */
    public static function __callstatic($name, $arguments)
    {
        $type = strtolower($name);
        if (class_exists('Cache\\Types\\'.$type)) {
            return self::getInstance($type);
        } else {
            return call_user_func_array(array(self::getInstance(), $name), $arguments);
        }
    }
    
}