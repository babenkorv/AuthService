<?php

require_once 'Core/Autoloader.php';

$autoloader = new Autoloader();
$autoloader->run();

\Classes\Hash\HashTest::setSettings();
\Classes\Hash\HashTest::geneateData();

$str = "it's my string";


$hashTester = new \Classes\Hash\HashClass(new \Classes\Hash\CustomAlgorithm($str));
$hashTester->executeHashing();