<?php

return CMap::mergeArray(
	require(dirname(__FILE__).'/main.php'),
	array(
		'components'=>array(
			'fixture'=>array(
				'class'=>'system.test.CDbFixtureManager',
			),
			'db'=>array(
				'connectionString' => 'mysql:host=somim2.org;dbname=somimorg_dbsomim',
				'emulatePrepare' => true,
				'username' => 'somimorg',
				'password' => '6mrZyD0f54',
				'charset' => 'utf8',
			),
            'log'=>array(
                'class'=>'CLogRouter',
                'routes'=>array(
                    array(
                        'class'=>'CFileLogRoute',
                        'levels'=>'error, warning, trace',
                    ),
                    // uncomment the following to show log messages on web pages
                    array(
                        'class'=>'CWebLogRoute',
                    ),
                ),
            ),
		),
	)
);
