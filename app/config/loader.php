<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir,
        $config->application->libraryDir
    ]
)->register();

$loader->registerNamespaces(array(
	
    /**
     * Load SQL server db adapter namespace
     */
    'Sqlsrv' => APP_PATH . '/library/Phalcon/Db/Adapter/Pdo',
    'Phalcon\Db\Dialect' => APP_PATH . '/library/Phalcon/Db/Dialect',
    'Phalcon\Db\Result' => APP_PATH . '/library/Phalcon/Db/Result',
    'MyApp\Models' => APP_PATH . '/models/',

))->register();
