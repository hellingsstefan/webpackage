<?php
	class Control_Index extends WebLab_Dispatcher_Module {
		
		public function _default(){
			$this->layout->content = new WebLab_Template( 'pages/home' );
			$data = Table_Meta::getInstance()->findBy('page_id', 1 ); // 1 = HOMEPAGE
			
			$content = array();
			foreach ($data as $key => $value) {
				$content[$value->meta_key] = $value->meta_value;
			}
			$t->content = $content;
		}

		public function assets(){
			$this->layout->content = new WebLab_Template( 'pages/assets-page' );
		}
		
		/*
		*  Example:
		*
		*/
		/*
		public function product(){
			$this->_shop->content = new WebLab_Template( 'shop/product' );
			$t = &$this->_shop->content;
			
			$product = Table_Product::getInstance()->find( $this->param[ 'product' ] ); // asking things from a table.
			
			$t->product = $product;
			$t->images = Table_ProductImage::getInstance()->findForProduct( $product->id );
			$t->properties = Table_ProductProperty::getInstance()->findForProduct( $product->id );
		}*/
		
	}