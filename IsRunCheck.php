<?php

const PATH = "/Applications/Hearthstone/Logs/Power.log";

function __autoload($name) {
    include 'class/'.$name.'.php';
}

Printer::printAllCount();