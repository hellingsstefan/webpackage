<?php
	class Table_Meta extends WebLab_Table {
		
		protected static $_fields = array(
				'id',
				'page_id',				// To what page does this belong to
				'type',					// Text, Image, File
				'meta_key',				// eg "page_title", "contact_image", "attachments", ...
				'meta_value',			// Text, image-path, filepath, ...
				'groupkey',				// for image-galleries, NULL is default, unique key eg: "portfolio_gallery_5"
				'online',
				'deleted'
			);		
		protected static $_table = 'meta';	
		protected static $_instance;

		/*
		public function findBy( $findBy='id', $findThis ) {
			$q = db('main')->newQuery(); 
			
			$table = $q->addTable( $this->createTable() );
			$q->getCriteria()->addAnd( $table->$findBy->eq( $findThis ) )
				->addAnd( $table->online->eq( 1 ) )
				->addAnd( $table->deleted->eq( 0 ) );
			
			$result = $q->select();
			
			return $result->fetch_all();
		}*/

	}