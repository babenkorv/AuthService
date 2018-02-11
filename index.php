<?php

require_once 'Core/Autoloader.php';

$autoloader = new Autoloader();
$autoloader->run();

\Core\Debug::massage('123', 'test message ' . var_export(['123', 3],1));
\Core\Debug::massage('test', 'test message ' . var_export(['123', 3],1));

\Core\Debug::toScreen('123');

