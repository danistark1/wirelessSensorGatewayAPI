<?php

namespace App;

use SplFileInfo;

/**
 * Class WeatherConfiguration
 *
 * @package App
 */
class WeatherConfiguration {
    /**
     * @var mixed
     */
    public $config;

    /**
     * WeatherConfiguration constructor.
     */
    public function __construct() {

        $this->config = include('../config.php');;
    }

    /**
     * Get config by key.
     *
     * @param string $config
     * @return bool|string
     */
    public function getConfigKey(string $config) {
        $result = explode('.', $config);
        $newArray = [];
        foreach($result as $key => $value) {
            $newArray[$key] = $value;
        }

        if (count($newArray) === 4 && isset($this->config[$newArray[0]][$newArray[1]][$newArray[2]][$newArray[3]])) {
           return $this->config[$newArray[0]][$newArray[1]][$newArray[2]][$newArray[3]];
        } elseif (count($newArray) === 3 && isset($this->config[$newArray[0]][$newArray[1]][$newArray[2]])) {
            return $this->config[$newArray[0]][$newArray[1]][$newArray[2]];
        } elseif(count($newArray) === 2 && isset($this->config[$newArray[0]][$newArray[1]])) {
            return $this->config[$newArray[0]][$newArray[1]];
        } else {
            return false;
        }
    }

    /**
     * Get config, given a pattern
     *
     * @param string $pattern
     */
    public function getConfigPattern(string $pattern) {
    }

    /**
     * Set config by key.
     *
     * @param array $config
     */
    public function setConfigKey(array $config) {
        $configKey = key($config);
        $configValue = $config[$configKey];
        $configValueExist = $this->getConfigKey($configKey);
        if ($configValueExist) {
        $this->config[$configKey] = $configValue;
        }

       $directory = dirname(__FILE__.'/Controller/SensorController.php');
        $file = file('SensorController.php');
        dump($file);
//        $matches = array();
//        preg_match('/^database\.params\.dbname = (.*)$/', $file, $matches);
//        $file = str_replace($matches[1], $new_value, $file);
        //file_put_contents('/weatherStationApiSymfony/config.php', $file);


        return;
    }

    /**
     * Load all configuration.
     */
    public function getConfigs(): array {
        return $this->config;
    }

    /**
     * Remove config by key.
     *
     * @param string $key
     */
    public function removeConfigKey(string $key) {
    }

    /**
     * Remove config given a pattern.
     *
     * @param string $pattern
     */
    public function removeConfigPattern(string $pattern) {
    }
}
