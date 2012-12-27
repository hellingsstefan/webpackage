<?php
	class Control_404 extends WebLab_Dispatcher_Module {
		
		public function _default(){
			$this->layout->content = new WebLab_Template( 'error/404.php' );
		}
		
	}