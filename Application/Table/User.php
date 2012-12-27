<?php
	class Table_User extends WebLab_Table {
		
		protected static $_fields = array( // Definitie van velden
				'id',
				'name',
				'email',
				'password',
				'online',
				'deleted'
			);		
		protected static $_table = 'user';	
		protected static $_instance;
		
		// check login by name and password
		public function checkLoginByUser( $user='NULL', $pass='NULL' ){
			$q = db('main')->newQuery();
			
			$table = $q->addTable( $this->createTable() );
			$q->getCriteria()->addAnd( $table->name->eq( $user ) )
				->addAnd( $table->password->eq( $pass ) )
				->addAnd( $table->online->eq( 1 ) )
				->addAnd( $table->deleted->eq( 0 ) );
					
			$result = $q->select();
			return $result->fetch_all();
		}
		
		// check login by email and password
		public function checkLoginByEmail( $email='NULL', $pass='NULL' ){
			$q = db('main')->newQuery();
			
			$table = $q->addTable( $this->createTable() );
			$q->getCriteria()->addAnd( $table->email->eq( $email ) )
				->addAnd( $table->password->eq( $pass ) )
				->addAnd( $table->online->eq( 1 ) )
				->addAnd( $table->deleted->eq( 0 ) );
					
			$result = $q->select();	
			return $result->fetch_all();
		}
		
	}