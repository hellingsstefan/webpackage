<?php

	include( 'WebLab/Framework.php' );
	
	$app = new WebLab_Application( 'Application/config_local.json' );
	$app->run();

	
	/* preformated var_dump */
	function v_dump( $param ){
		echo '<pre>';
		var_dump($param);
		echo '</pre>';
	}