<?php

require_once __DIR__.'/vendor/autoload.php';

use Cache\Cache;

//Exemple 1 avec apc
/*
Cache::apc();
Cache::set('keyword', 'value1');
echo Cache::get('keyword');
Cache::set('keyword', 'value2', 3600);
echo Cache::get('keyword');
Cache::clean();
echo Cache::get('keyword');
*/

//Exemple 2 avec memcache
/*
Cache::memcache();
Cache::set('keyword', 'value1');
echo Cache::get('keyword');
Cache::set('keyword', 'value2', 3600);
echo Cache::get('keyword');
Cache::delete('keyword');
echo Cache::get('keyword');
*/

//Exemple d'utilisation
Cache::apc();
$content = Cache::get('keyword');
if (empty($content)) {
    $content = "Content";
    Cache::set('keyword', $content, 10);
    echo " --> NO CACHE";
} else {
    echo " --> USE CACHE : ".$content;
}