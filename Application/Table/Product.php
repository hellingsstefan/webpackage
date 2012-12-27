<?php
	/*
	 	id				INT(20)			NOT NULL	AUTO_INCREMENT,
		name			VARCHAR(100)	NOT NULL	DEFAULT "New Product",
		product_code	VARCHAR(50),
		description		TEXT,
		base_price		DECIMAL(7,2)	NOT NULL	DEFAULT 0,
		priority		INT(3)			NOT NULL	DEFAULT 0,
		online			BIT				NOT NULL	DEFAULT 0,
		deleted			BIT				NOT NULL	DEFAULT 0
	 */
	class Table_Product extends WebLab_Table { // Erft van WebLab_Table, heeft standaardimplementatie.
		
		// 3 onderstaande zijn verplicht, extra functies kunnen in deze klasse worden bij geimplementeerd.
		protected static $_fields = array( // Definitie van velden
				'id',
				'name',
				'product_code',
				'description',
				'base_price',
				'priority',
				'online',
				'deleted'
			);
			
		protected static $_table = 'product'; // Definite van tabelnaam
		
		protected static $_instance; // Bevat een instantie van zichzelf ( Lazy loading )
		
		// standaard bevat deze al code voor create( array ), update( array ), delete( array ) en find( id ) en findAll()
		
		// Zelf functies maken:
		public function doeEensZot() {
			// Deze query zoekt de 10 eerste producten in de database bijvoorbeeld.
			$q = db('main')->newQuery(); // maak een nieuw Query object aan, dat je query voorstelt.
			
			$q->addTable( $this->createTable() ); // $this->createTable() gebruikt de 3 verplichte velden voor een tabel op te stellen met
			// alle velden in.
			
			$q->limit(10);
			
			$result = $q->select();
			
			return $result->fetch_all();
		}
		
	}