<?php

	// standaard bevat deze al code voor create( array ), update( array ), delete( array ) en find( id ) en findAll()
	
	class Table_Item extends WebLab_Table {
		
		// id, online en deleted velden incl. 3 onderstaande statics zijn verplicht
		// extra functies kunnen in deze klasse worden bij geimplementeerd.
		protected static $_fields = array(
				'id',
				'path',
				'collection_id',
				'online',
				'deleted'
			);
			
		protected static $_table = 'item'; 
		protected static $_instance; // Bevat een instantie van zichzelf ( Lazy loading )

		public function getDistinct(){
			//$customQuery = 'SELECT DISTINCT * FROM item ORDER BY collection_id';
			$customQuery = "select collection_id, path, online, deleted, min(id)\n"
				    . "from item\n"
				    . "group by collection_id";
			
			$result = db('main')->query( $customQuery );
			return $result->fetch_all();
		}

		public function getCollection( $collection_id ) {
			$q = db('main')->newQuery(); 
			
			$table = $q->addTable( $this->createTable() );
			$q->getCriteria()->addAnd( $table->collection_id->eq( $collection_id ) )
				->addAnd( $table->online->eq( 1 ) )
				->addAnd( $table->deleted->eq( 0 ) );
			
			$result = $q->select();
			
			return $result->fetch_all();
		}
		
	}