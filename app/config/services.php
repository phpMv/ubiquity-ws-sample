<?php
\Ubiquity\cache\CacheManager::startProd($config);
\Ubiquity\orm\DAO::start();
\Ubiquity\controllers\Router::start();
//Router::addRoute("_default", "controllers\\IndexController");
//\Ubiquity\assets\AssetsManager::start($config);
