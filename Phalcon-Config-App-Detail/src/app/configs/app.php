<?php

date_default_timezone_set("Asia/Calcutta");
define(
    "MYAPP",
    "['name'=>'Phalcon',
    'version'=>'4.0.2',
    'time'=>" . date('h-i-sa') . ",
    'timezone'=>'Asia/Calcutta',
    'language'=>'English']"
);
return MYAPP;