<?php

return new \Phalcon\Config(array(
		'database' => array(
				'adapter'  => 'mysql',
				'host'     => '127.0.0.1',
				'username' => 'root',
				'password' => '',
				'dbname'   => 'weather',
		),
		'application' => array(
                'controllersDir' => __DIR__ . '/../../app/controllers/',
				'servicesDir'    => __DIR__ . '/../../app/services/',
                'formsDir'       => __DIR__ . '/../../app/forms/',
				'routesDir'      => __DIR__ . '/../../app/routes/',
                'libraryDir'     => __DIR__ . '/../../app/library/',
                'pluginsDir'     => __DIR__ . '/../../app/plugins/',
                'viewsDir'       => __DIR__ . '/../../app/views/',
                'tasksDir'       => __DIR__ . '/../../app/tasks/',
                'modelsDir'      => __DIR__ . '/../../app/mappers/',
				'baseUri'        => '/'
         ),
        'mail' => array(
            'fromName'  => 'RandomStorm Limited',
            'fromEmail' => 'webmaster@complysec.com',
            'smtp' => array(
                'server'   => 'mail.complysec.com',
                'auth'     => 'login',
                'port'     => 25,
                'security' => 'tls',
                'username' => '',
                'password' => '',
            )
        ),
        'complySec' => 'http://local.api.complysec.net/',
        'cache' => array(
            'cacheDir' => "../app/cache/",
            "lifetime" => 172800
        ),
));
