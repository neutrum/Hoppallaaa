<?php

	class GlobalThumbFactory extends ThumbFactory {
		public $maxwidth;
		public $maxheight;
		public $quality = 100;
		public $thumbDir;
		private $thumbName;

		function makeThumb($file, $filename) {
			list($width, $height) = getimagesize($file);
			if($this->maxwidth && ($width > $this->maxwidth)) {
				$pomer = $width/$this->maxwidth;
				$newwidth = $this->maxwidth;
				$newheight = $height/$pomer;
				if($this->maxheight && ($newheight > $this->maxheight)) {
					$pomer = $height/$this->maxheight;
					$newheight = $this->maxheight;
					$newwidth = $width/$pomer;
				}
			}
			elseif($this->maxheight && ($height > $this->maxheight)) {
				$pomer = $height/$this->maxheight;
				$newheight = $this->maxheight;
				$newwidth = $width/$pomer;
				if($this->maxwidth && ($newwidth > $this->maxwidth)) {
					$pomer = $width/$this->maxwidth;
					$newwidth = $this->maxwidth;
					$newheight = $height/$pomer;
				}
			}
			if($pomer) {
				$this->thumbName = $filename;
				$this->createthumb($file, $this->thumbDir.$this->thumbName, $newwidth, $newheight, $this->quality);
			}
		}
		
		function getThumbName() {
			return $this->thumbName;
		}
	}

	class GalleryThumbFactory extends ThumbFactory {
		var $maxwidth = '178';
		var $maxheight;
		var $thumbDir = '../data/products/combinations/';
		var $thumbName;

		function makeThumb($file, $filename, $newMaxwidth = null) {
			if($newMaxwidth) {
				$this->maxwidth = $newMaxwidth;
			}
			list($width, $height) = getimagesize($file);
			if($width > $this->maxwidth) {
				$pomer = $width/$this->maxwidth;
				$newwidth = $this->maxwidth;
				$newheight = $height/$pomer;
				$this->thumbName = $filename;
				$this->createthumb($file, $this->thumbDir.$this->thumbName, $newwidth, $newheight, '85');
			}
		}
		
		function getThumbName() {
			return $this->thumbName;
		}
	}
	
	
	class CutThumbFactory extends ThumbFactory {
		var $maxwidth = 95;
		var $maxheight;
		var $thumbDir;
		var $thumbName;
        
        function CutThumbFactory()
		{
		}
		
		function makeThumb($file, $filename) {
			$this->createCut($file, $this->thumbDir.$filename, $this->maxwidth, $this->maxheight);
		}
		
		function getThumbName() {
			return $this->thumbName;
		}
	}
	
	class ThumbFactory {
		var $gd;
		function checkgd(){
			if (isset($this->gd)) return;
			ob_start();
			@phpinfo(INFO_MODULES);
			$phpinfo=ob_get_contents();
			ob_end_clean();
			$phpinfo=strip_tags($phpinfo);
			if (strlen($phpinfo)<2048) 
				$this->gd=2; // phpinfo() is probably not allowed
			else {
				$phpinfo=stristr($phpinfo,"gd version");
				if (!$phpinfo) {
					$this->gd=0;
				} else {
					for ($i=0;$i<strlen($phpinfo);$i++) 
						if (is_numeric(substr($phpinfo,$i,1))) break;
						$this->gd=intval(substr($phpinfo,$i,1));
				}
			}
		}
	
		/*
			Function createthumb($name,$filename,$new_w,$new_h)
			creates a resized image
			variables:
			$name		Original filename
			$filename	Filename of the resized image
			$new_w		width of resized image
			$new_h		height of resized image
		*/	
		function createthumb($from,$to,$thumb_w,$thumb_h,$quality) {
			if (preg_match("/\.jpg|jpeg|JPG|JPEG/",$from))
				$src_img=@imagecreatefromjpeg($from);
			elseif (preg_match("/\.png/",$from))
				$src_img=@imagecreatefrompng($from);
			elseif (preg_match("/\.gif/",$from))
				$src_img=@imagecreatefromgif($from);
			else
				die('Unsupported image format: '.$from); 
			if (!isset($src_img)) 
				die('Cannot create thumbnail image for: '.$from);
			$old_x=imageSX($src_img);
			$old_y=imageSY($src_img);
			if ($this->gd==1 || preg_match("/\.gif/",$from) || !function_exists('imagecopyresampled')){
					$dst_img=imagecreate($thumb_w,$thumb_h);
					imagecopyresized($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
			} else {
				$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
				if (function_exists('imageantialias')) imageantialias($dst_img,true);
				imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y);
			}
			if (preg_match("/\.png/",$from))
				@imagepng($dst_img,$to); 
			elseif (preg_match("/\.jpg|jpeg|JPG|JPEG/",$from))
				@imagejpeg($dst_img,$to,$quality);
			else 
				@imagegif($dst_img,$to);
			@imagedestroy($dst_img); 
			@imagedestroy($src_img);
		}
	
		function createCut($from, $to, $mwidth, $mheight = null) {
			$cut = 1;
			$wh = array($mwidth, $mheight);
			$file = $from;
			list($width, $height) = getimagesize($file);
	
			if($width <= $height) {
				$maxwidth = $wh[0];
				$maxheight = 0;
			}
			else {
				$maxheight = $wh[1];
				$maxwidth = 0;
			}

			$loffset = $toffset = 0;
			if($maxwidth && ($width > $maxwidth)) {
				$pomer = $width/$maxwidth;
				$newwidth = $maxwidth;
				$newheight = $height/$pomer;
				$toffset = -($newheight-$wh[1])/2;
				if($maxheight && ($newheight > $maxheight)) {
					$pomer = $height/$maxheight;
					$newheight = $maxheight;
					$newwidth = $width/$pomer;
				}
				if($newheight < $wh[1]) {
					$newwidth = $newwidth*($wh[1]/$newheight);
					$newheight = $wh[1];
					$loffset = -($newwidth-$wh[0])/2;
					$toffset = 0;
				}
			}
			elseif($maxheight && ($height > $maxheight)) {
				$pomer = $height/$maxheight;
				$newheight = $maxheight;
				$newwidth = $width/$pomer;
				$loffset = -($newwidth-$wh[0])/2;
				if($maxwidth && ($newwidth < $maxwidth)) {
					$pomer = $width/$maxwidth;
					$newwidth = $maxwidth;
					$newheight = $height/$pomer;
				}
				if($newwidth < $wh[0]) {
					$newheight = $newheight*($wh[0]/$newwidth);
					$newwidth = $wh[0];
					$toffset = -($newheight-$wh[1])/2;
					$loffset = 0;
				}
			}
			$thumb_w = $newwidth;
			$thumb_h = $newheight;
			
			$quality = 100;
			
			if (preg_match("/\.jpg|jpeg|JPG|JPEG/",$from))
				$src_img=@imagecreatefromjpeg($from);
			elseif (preg_match("/\.png/",$from))
				$src_img=@imagecreatefrompng($from);
			elseif (preg_match("/\.gif/",$from))
				$src_img=@imagecreatefromgif($from);
			else
				die('Unsupported image format: '.$from); 
			if (!isset($src_img)) 
				die('Cannot create thumbnail image for: '.$from);
			$old_x=imageSX($src_img);
			$old_y=imageSY($src_img);
		
			if (preg_match("/\.gif/",$from) || !function_exists('imagecopyresampled')){
				$dst_img=imagecreate($thumb_w,$thumb_h);
				imagecopyresized($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
			} else {
				if($cut) {
					$dst_img = imagecreatetruecolor($wh[0], $wh[1]);
				}
				else {
					$dst_img=imagecreatetruecolor($thumb_w,$thumb_h);
				}
				
			//	$background = imagecolorallocate($dst_img, 255, 0, 0);
				imagefill($dst_img, 0, 0, 0xFFFFFF);
				if (function_exists('imageantialias')) imageantialias($dst_img,true);
				if($cut) {
					imagecopyresampled($dst_img, $src_img, $loffset, $toffset, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
				}
				else {
					imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
				}
			}
			
			if (preg_match("/\.png/",$from)) {
				@imagepng($dst_img,$to); 
			}
			elseif (preg_match("/\.jpg|jpeg|JPG|JPEG/",$from)) {
				@imagejpeg($dst_img, $to, $quality);
			}
			else {
				@imagegif($dst_img,$to);
			}
			
			@imagedestroy($dst_img); 
			@imagedestroy($src_img);
		}
	}


	class ImageCroppingUtils {
	
		public static function getImageAsResource($imgAdress) {
			try {
				$fileextension = strtolower(pathinfo($imgAdress, PATHINFO_EXTENSION));
				$simg = null;
				
				switch($fileextension) {
					case 'gif': $simg = imagecreatefromgif($imgAdress); break;
					case 'jpg': case 'jpeg': $simg = imagecreatefromjpeg($imgAdress); break;
					case 'png': $simg = imagecreatefrompng($imgAdress); break;
					default:			
						throw new Exception("Error while trying to get image as resource(format not supported)");
				}
			}
			catch(Exception $er) {
				throw  new Exception("Error while trying to get image as resource Message::".$er->getMessage());
			}
			
			return  $simg;
		}
		
		// this function can be used to crop image files
		public static function cropImage($source, $x1, $y1, $x2, $y2, $resizeW = null, $resizeH = null) {
			$simg = null;
			try {
				$simg = ImageCroppingUtils::getImageAsResource($source);
			}
			catch(Exception $er) {
				throw new Exception ("Image file could not be found while getting the source image to be crop");
				return;
			}
			
			list($w, $h) = getimagesize($source);
			
			$crop1x = $w-($x2-$x1);
			$crop1y = $h-($y2-$y1);
			
			$tmpImg = imagecreatetruecolor($w, $h);
			
		//	imagefill($tmpImg, 0, 0, 0xFFFFFF);
			
			imagecopyresampled($tmpImg,$simg,$crop1x,$crop1y,$x1,$y1,$w,$h,$w,$h);
			if($resizeW && $resizeH) {
				$finalImg = imagecreatetruecolor($resizeW, $resizeH);
				$newW = ($resizeW/ ($x2-$x1) )*$w + 1;
				$newH = ($resizeH/ ($y2-$y1) )*$h + 1;
				
				imagefill($finalImg, 0, 0, 0xFFFFFF);	
				
				imagecopyresampled($finalImg, $tmpImg, 0, 0, $crop1x, $crop1y, $newW, $newH, $w, $h);
			}
			else {
				$finalImg = imagecreatetruecolor(($x2-$x1), ($y2-$y1));
				
				imagefill($finalImg, 0, 0, 0xFFFFFF);
				
				imagecopyresampled($finalImg,$tmpImg,0,0,$crop1x,$crop1y,$w,$h,$w,$h);
			}
	
	
			return $finalImg;
		}
	}

?>