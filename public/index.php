<?php
/* Debug
error_reporting(E_ALL);
ini_set('display_errors', '1');
*/
try {

    /**
     * Read the configuration
     */
    $config = new Phalcon\Config\Adapter\Ini(__DIR__ . '/../app/config/config.ini');

    $loader = new \Phalcon\Loader();

    /**
     * We're a registering a set of directories taken from the configuration file
     */
    $loader->registerDirs(
        array(
            __DIR__ . $config->application->controllersDir,
            __DIR__ . $config->application->pluginsDir,
            __DIR__ . $config->application->libraryDir,
            __DIR__ . $config->application->modelsDir,
        )
    )->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();

    $di->set('dispatcher', function() use ($di) {

        //Obtain the standard eventsManager from the DI
        $eventsManager = $di->getShared('eventsManager');

        //Instantiate the Security plugin
        $security = new Security($di);

        //Listen for events produced in the dispatcher using the Security plugin
        $eventsManager->attach('dispatch', $security);

        $dispatcher = new Phalcon\Mvc\Dispatcher();

        //Bind the EventsManager to the Dispatcher
        $dispatcher->setEventsManager($eventsManager);

        return $dispatcher;
    });

    $di->set('view', function() use ($config) {

        $view = new \Phalcon\Mvc\View();

        $view->setViewsDir(__DIR__ . $config->application->viewsDir);

        $view->registerEngines(array(
            ".phtml" => 'Phalcon\Mvc\View\Engine\Volt'
        ));

        return $view;
    });

    // Database connection is created based on parameters defined in the configuration file
    $di->set('db', function() use ($config) {
        return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
            "host" => $config->database->host,
            "username" => $config->database->username,
            "password" => $config->database->password,
            "dbname" => $config->database->name
        ));
    });

    //Start the session the first time when some component request the session service
    $di->setShared('session', function() {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    });

    //Register the flash service with custom CSS classes
    $di->set('flash', function(){
        $flash = new \Phalcon\Flash\Direct(array(
            'error' => 'alert alert-error',
            'success' => 'alert alert-success',
            'notice' => 'alert alert-info',
        ));
        return $flash;
    });



    //Handle the request
    $application = new \Phalcon\Mvc\Application();
    $application->setDI($di);
    echo $application->handle()->getContent();


} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}
