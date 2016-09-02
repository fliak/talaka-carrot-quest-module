<?php

namespace Talaka\CarrotQuestModule;

use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManager;

class Module implements
    ConfigProviderInterface,
    AutoloaderProviderInterface
{

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $config = [];
        foreach (glob(__DIR__ . '/../../config/*.config.php') as $file) {
            /** @noinspection PhpIncludeInspection */
            $config = array_merge($config, include $file);
        }

        return $config;
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}