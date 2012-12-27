<?php
	class Control_Index extends WebLab_Dispatcher_Module {
		
		public function _default(){
			$this->layout->content = new WebLab_Template( 'static/home.php' );
			//$t = $this->layout->content;

			//$t->items = Table_Item::getInstance()->getDistinct();
		}
		
		/*
		public function product(){
			$this->_shop->content = new WebLab_Template( 'shop/product.php' );
			$t = &$this->_shop->content;
			
			$product = Table_Product::getInstance()->find( $this->param[ 'product' ] ); // asking things from a table.
			
			$t->product = $product;
			$t->images = Table_ProductImage::getInstance()->findForProduct( $product->id );
			$t->properties = Table_ProductProperty::getInstance()->findForProduct( $product->id );
		}*/
		
	}