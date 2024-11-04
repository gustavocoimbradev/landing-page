<?php 

foreach (glob(__DIR__ . '/functions/*.php') as $file) :
    include_once $file;
endforeach;