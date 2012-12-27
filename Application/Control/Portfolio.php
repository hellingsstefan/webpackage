<?php
	class Control_Portfolio extends WebLab_Dispatcher_Module {
		
		public function _default() {

			if(!isset($_SESSION['auth'])){ 
				header('Location:' . BASE );
				exit();
			}
			
			$this->layout->content = new WebLab_Template( 'static/portfolio.php' );
			$t = $this->layout->content;

			$t->items = Table_Item::getInstance()->getDistinct();
		}
		
	}