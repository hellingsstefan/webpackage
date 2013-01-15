<?php

	include( 'WebLab.phar' );


	$app = new WebLab_Application( 'Application/config_local.json' );

	error_reporting( E_ALL );	


	$app->run();
