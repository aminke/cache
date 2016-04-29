<?php 


namespace Cache;

/**
 * Interface TypeInterface
 * 
 * @author kguillo
 */
interface TypeInterface
{
    public function get($keyword);
    
    public function set($keyword, $value, $ttl = 30);
    
    public function has($keyword);
    
    public function clean();
    
    public function delete($keyword);
    
}
