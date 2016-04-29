<?php 


namespace Cache\Types;

use Cache\TypeInterface;

/**
 * Class apc 
 * 
 * @author kguillo
 */
class apc implements TypeInterface
{
    public function __construct()
    {
        if (! extension_loaded('apc') && ini_get('apc.enabled')) {
            throw new \Exception('Apc is not installed');
        }
    }
    
    public function get($keyword)
    {
        try {
            if (self::has($keyword)) {
                return apc_fetch($keyword);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public  function set($keyword, $value, $ttl = 30)
    {
        try {
            return apc_store($keyword, $value, $ttl);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public  function has($keyword)
    {
        try {
            return apc_exists($keyword);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function clean()
    {
        try {
            return apc_clear_cache();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function delete($keyword)
    {
        try {
            return apc_delete($keyword);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}