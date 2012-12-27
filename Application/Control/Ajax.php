<?php
	class Control_Ajax extends WebLab_Dispatcher_Module {
		
		public function _default(){
			$item = new WebLab_Template( 'static/item.php' );
			WebLab_Template::setRootTemplate( $item );
			$t = $this->layout;

			if(isset($this->param['ajax'])){
				$collection_id = $this->param['ajax'];
				$collection = Table_Item::getInstance()->getCollection($collection_id);
				$t->content = $collection; 
			}
			
		}

	}