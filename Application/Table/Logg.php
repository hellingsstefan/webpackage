<?php
	class Table_Logg extends WebLab_Table {
		
		protected static $_fields = array( // Definitie van velden
				'id',
				'timestamp',
				'name',
				'online',
				'deleted'
			);		
		protected static $_table = 'logg';	
		protected static $_instance;
	
	}