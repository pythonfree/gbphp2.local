<?php

class Config
{
    private static array $configCache = [];

    public static function get($parameter)
    {
        $paramValue = self::getCurrentConfiguration()[$parameter];
        if (!isset($paramValue)) {
            throw new Exception('Parameter ' . $parameter . ' does not exists');
        }
        return $paramValue;
    }

    private static function getCurrentConfiguration()
    {
        if (empty(self::$configCache)) {
            $configDir = __DIR__ . '/../configuration/';
            $configProd = $configDir . 'config.prod.php';
            $configDev = $configDir . 'config.dev.php';
            $configDefault = $configDir . 'config.default.php';
            if (is_readable($configProd)) {
                require_once $configProd;
            } elseif (is_readable($configDev)) {
                require_once $configDev;
            } elseif (is_readable($configDefault)) {
                require_once $configDefault;
            } else {
                throw new Exception('Unable to find configuration file');
            }
            if (!isset($config) || !is_array($config)) {
                throw new Exception('Unable to load configuration');
            }
            self::$configCache = $config;
        }
        return self::$configCache;
    }
}

?>