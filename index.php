<?php

	include( 'WebLab/Framework.php' );
	
	$app = new WebLab_Application( 'Application/config.json' );
	$app->run();