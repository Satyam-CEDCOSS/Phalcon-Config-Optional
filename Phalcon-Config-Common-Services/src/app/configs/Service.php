<?php

namespace MyApp\User;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Url;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Config\ConfigFactory;
use Phalcon\Config\Adapter\Json;
use Phalcon\Mvc\Controller;

class Service
{
    public function in()
    {
        $container = new FactoryDefault();

        $container->set(
            'view',
            function () {
                $view = new View();
                $view->setViewsDir(APP_PATH . '/views/');
                return $view;
            }
        );

        $container->set(
            'url',
            function () {
                $url = new Url();
                $url->setBaseUri('/');
                return $url;
            }
        );

        $container->set(
            'config',
            function () {
                $fileurl = APP_PATH.'/utilities/config.php';
                $factory  = new ConfigFactory();
                return $factory->newInstance('php', $fileurl);
            }
        );

        $container->set(
            'configs',
            function () {
                $fileurl = APP_PATH.'/utilities/configs.json';
                return new Json($fileurl);
            }
        );

        $container->set(
            'db',
            function () {
                return new Mysql($this['config']->db->toArray());
            }
        );

        $container->set(
            'mongo',
            function () {
                $mongo = new MongoClient();
                return $mongo->selectDB('phalt');
            },
            true
        );

        return $container;
    }
}
