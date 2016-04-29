<?php

namespace Cache\Types;

use Cache\TypeInterface;
use Cache\Config;

/**
 * Class memcache
 *
 * @author kguillo
 */
class memcache implements TypeInterface
{
    private $memcache;
    
    public function __construct()
    {
        try {
            $this->memcache = new \Memcache;
            $config = Config::getConfig();
            
            $this->memcache->connect($config['memcache']['host'], $config['memcache']['port']);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function get($keyword)
    {
        try {
            return $this->memcache->get($keyword);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function set($keyword, $value, $ttl = 3600)
    {
        try {
            $this->memcache->set($keyword, $value, false, $ttl);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function has($keyword)
    {
        try {
            if ($this->memcache->get($keyword)) {
                return true;
            } else {
                return false;   
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function clean()
    {
        try {
            $this->memcache->flush();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
    
    public function delete($keyword)
    {
        try {
            return $this->memcache->delete($keyword);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}