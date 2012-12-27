<?php
	class Table_Blob extends WebLab_Table {
		
		protected static $_fields = array( // Definitie van velden
				'id',
				'key',
				'value'
			);		
		protected static $_table = 'blob';	
		protected static $_instance;
		
		
		/*
		public function doeEensZot() {
			$q = db('main')->newQuery(); 
			
			$q->addTable( $this->createTable() );
			$q->limit(10);
			
			$result = $q->select();
			
			return $result->fetch_all();
		}*/
		
	}