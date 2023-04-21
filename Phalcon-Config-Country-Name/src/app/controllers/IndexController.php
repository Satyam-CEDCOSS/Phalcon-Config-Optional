<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {
        // Redirected to View
        // print_r($this->config["Africa"]);
        // foreach ($this->config as $key => $value) {
        //     print_r($key);
        // }
        // die;
    }
    public function displayAction()
    {
        $country = $_POST["country"];
        date_default_timezone_set($this->config[$country]);

        $this->view->country = $country;
        $this->view->time = date("h-i-sa");

    }
}