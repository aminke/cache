<?php

namespace Cache;


use Symfony\Component\Yaml\Yaml;

/**
 * Classe permettant de récupérer la configuration
 * 
 * @author kguillo
 */
class Config
{
    /**
     * Return Config
     */
    public static function getConfig()
    {
        $configFileName = "config.yml";
        $dirName = __DIR__."/../config/";
        $configs = Yaml::parse(file_get_contents($dirName.$configFileName));
        
        return $configs;
    }
}