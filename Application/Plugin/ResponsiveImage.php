<?php

/*
span	min-width: 1200px		min-width: 980px		min-width: 768px		max-width: 767px		max-width: 480px		

1:		70						60 						42	 					fluid 					fluid 						 								
2:		170 					140 					104 					fluid 					fluid
3:		270 					220 					166 					fluid 					fluid
4:		370 					300 					228 					fluid 					fluid
5:		470 					380 					290 					fluid 					fluid
6:		570 					460 					352 					fluid 					fluid
7:		670 					540 					414 					fluid 					460
8:		770 					620 					476 					fluid 					460
9:		870 					700 					538 					fluid 					460
10:		970 					780 					600 					fluid 					460
11:		1070 					860 					662 					fluid 					460
12:		1170 					940 					724 					fluid 					460

inc.: 	+100 					+80 					+62

fluid = min-width: 980px value;

*/

class ResponsiveImage {
	
	protected $host = '';
	protected $image;
	protected $img_name;
	protected $img_ext;

	public static function getImage( $image_source, $span='', $scale=false ){
		$responsive = new ResponsiveImage();
		$responsive->images( $image_source, $span, $scale );
	}

	public function __construct() {
		$this->host = 'http://'.$_SERVER['HTTP_HOST'].'/portfolio/';
	}

	public function images( $image_source, $span, $scale ) {
		$this->image = 'www/'.$image_source; 										// correct image path (going from img/imagename.jpg)
		$this->img_name = substr_replace($image_source, "", -4);				 	// remove extention
		$remove_path = explode('/', $this->img_name);								// explode for path removal
		$this->img_name = end($remove_path);										// image name
		$this->img_ext = substr($image_source, -4);									// image extention
		
		if(!$span){
			$span = 2; 																// default span width
		}

		$w1200 = 70 + ((100*$span)-100);
		$w980  = 60 + ((80*$span) -80);
		$w768  = 42 + ((62*$span) -62);

		if($scale) {
			list($width, $height, $type, $attr) = getimagesize( $this->image );

			$h1200 = floor( $w1200 * ( $height / $width ) );
			$h980  = floor( $w980 * ( $height / $width ) );
			$h768  = floor( $w768 * ( $height / $width ) );

			$img_cache_1200 = 'www/cache/'.$this->img_name.'_'.$w1200.'x'.$h1200.$this->img_ext;	// scaled cache image
			$img_cahce_980  = 'www/cache/'.$this->img_name.'_'.$w980.'x'.$h980.$this->img_ext;		// scaled cache image
			$img_cahce_768  = 'www/cache/'.$this->img_name.'_'.$w768.'x'.$h768.$this->img_ext;		// scaled cache image
		
			$cache_image = array( 
				$img_cache_1200 => array( $w1200, $h1200 ), 
				$img_cahce_980 => array( $w980, $h980 ), 
				$img_cahce_768 => array( $w768, $h768 ) 
			);
		} else {
			$img_cache_1200 = 'www/cache/'.$this->img_name.'_'.$w1200.'x'.$w1200.$this->img_ext;	// default cache image
			$img_cahce_980  = 'www/cache/'.$this->img_name.'_'.$w980.'x'.$w980.$this->img_ext;		// default cache image
			$img_cahce_768  = 'www/cache/'.$this->img_name.'_'.$w768.'x'.$w768.$this->img_ext;		// default cache image
			$cache_image = array( $img_cache_1200 => $w1200, $img_cahce_980 => $w980, $img_cahce_768 => $w768 );
		}
		
		if(file_exists($this->image)) { 											// verify image_source 	
			foreach ($cache_image as $key => $value) { 								// check for each cached image
				if(!file_exists($key)) {
					if($scale){
						$this->copyToCache( $value[0], $value[1] );					// create new default cache image with correct setting
					} else {
						$this->copyToCache( $value );
					}
				}
			}
			$this->passImages( $span, $scale );
					
		} else {
			echo 'Error: could not find the specified image';
			return false;
		}
		
	}
	
	// create cache images
	private function copyToCache( $w, $h='' ) {
		if(!$h){$h=$w;}																// if no height is specified, take with as height
		$timthumb_location = $this->host . 'timthumb.php';
		$destination = 'www/cache/'.$this->img_name.'_'.$w.'x'.$h.$this->img_ext;
		$timthumb = $timthumb_location . '?src='.$this->image.'&w='.$w.'&h='.$h;
		copy($timthumb, $destination);
	}
	
	// pass images to document
	private function passImages( $span, $scale ){

		$w1200 = 70 + ((100*$span)-100);
		$w980  = 60 + ((80*$span) -80);
		$w768  = 42 + ((62*$span) -62);

		if($scale) {
			list($width, $height, $type, $attr) = getimagesize( $this->image );
			$h1200 = floor( $w1200 * ( $height / $width ) );
			$h980  = floor( $w980 * ( $height / $width ) );
			$h768  = floor( $w768 * ( $height / $width ) );
		} else {
			$h1200 = $w1200;
			$h980  = $w980;
			$h768  = $w768;
		}

		echo "<div data-picture data-alt=\"\">\n\t";
		echo "	<div data-src=\"cache/".$this->img_name."_".$w980."x".$h980.$this->img_ext."\" data-media=\"(max-width: 480px)\"></div>\n\t";
		echo "	<div data-src=\"cache/".$this->img_name."_".$w980."x".$h980.$this->img_ext."\" data-media=\"(max-width: 767px)\"></div>\n\t";
		echo "	<div data-src=\"cache/".$this->img_name."_".$w768."x".$h768.$this->img_ext."\" data-media=\"(min-width: 768px)\"></div>\n\t";
		echo "	<div data-src=\"cache/".$this->img_name."_".$w980."x".$h980.$this->img_ext."\" data-media=\"(min-width: 980px)\"></div>\n\t";
		echo "	<div data-src=\"cache/".$this->img_name."_".$w1200."x".$h1200.$this->img_ext."\" data-media=\"(min-width: 1200px)\"></div>\n\n\t";
			
		echo "	<!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->\n\t";
		echo "	<noscript><img src=\"cache/".$this->img_name."_170x170".$this->img_ext."\" alt=\"Testimage\"></noscript>\n";
		echo "</div>";
		
	}

}
