<?php
	class Encrypt {
		
		protected static $_instance;
		protected static $_salt = '#Th15_!5_4_s@Lt';
		
		public static function md5( $string ) {
			return md5(md5(self::$_salt.$string));
		}
		
	}

