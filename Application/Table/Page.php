<?php
	class Table_Page extends WebLab_Table {
		
		protected static $_fields = array( // Definitie van velden
				'id',
				'status', // Online, Draft 
				'title',
				'content',
				'online',
				'deleted'
			);		
		protected static $_table = 'page';	
		protected static $_instance;

	}