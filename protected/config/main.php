<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'SOMIM ver 2.0',

	// preloading 'log' component
	'preload'=>array(
        'log',
        'bootstrap', 	// preload the bootstrap component
		'slabbed',
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
        'application.models.db.*',
		'application.components.*',
		'application.extensions.yii-mail.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'kike2107',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(

		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
            // pagina de login general
            'loginUrl'=>array('auth/login'),
		),

		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'auth/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

		'bootstrap' => array(
			"class" => "ext.bootstrap.components.Bootstrap"
		),
		'slabbed' => array(
			"class" => "ext.slabbed.components.Slabbed"
		),
		/*
		'clientScript'=>array(
			'packages'=>array(
				'jquery'=>array(
					'baseUrl'=>Yii::app()->request->baseUrl . 'js',
					'js'=>array('jquery-2.2.0.min.js')
				)
			)
		),
		*/
		'ePdf' => array(
			'class'         => 'ext.yii-pdf.EYiiPdf',
			'params'        => array(
				'mpdf'     => array(
					'librarySourcePath' => 'application.vendor.mpdf.*',
					'constants'         => array(
						'_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
					),
					'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
					/*	'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                                'mode'              => '', //  This parameter specifies the mode of the new document.
                                'format'            => 'letter', // format A4, A5, ...
                                'default_font_size' => 10, // Sets the default document font size in points (pt)
                                'default_font'      => 'comic', // Sets the default font-family for the new document.
                                'mgl'               => 35, // margin_left. Sets the page margins for the new document.
                                'mgr'               => 35, // margin_right
                                'mgt'               => 36, // margin_top
                                'mgb'               => 36, // margin_bottom
                                'mgh'               => 29, // margin_header
                                'mgf'               => 29, // margin_footer
                                'orientation'       => 'L', // landscape or portrait orientation
                        )*/
				),
				'HTML2PDF' => array(
					'librarySourcePath' => 'application.vendor.html2pdf.*',
					'classFile'         => 'html2pdf.class.php', // For adding to Yii::$classMap
					/*'defaultParams'     => array( // More info: http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil
								'orientation' => 'P', // landscape or portrait orientation
						'format'      => 'A4', // format A4, A5, ...
						'language'    => 'en', // language: fr, en, it ...
						'unicode'     => true, // TRUE means clustering the input text IS unicode (default = true)
						'encoding'    => 'UTF-8', // charset encoding; Default is UTF-8
						'marges'      => array(5, 5, 5, 8), // margins by default, in order (left, top, right, bottom)
					)*/
				)
			),
		),
		'mail' => array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType'=>'smtp',
			'transportOptions'=>array(
				'host'=>'mail.somim2.org',
				'username'=>'root@somim2.org',
				'password'=>'Rut1l1oBlaBla',
				'port'=>'465',
				'encryption' => 'tls',
			),
			'viewPath' => 'application.views.mail',
			'logging' => true,
			'dryRun' => false
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
