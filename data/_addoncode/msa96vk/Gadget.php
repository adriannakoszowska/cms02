<?php // Nivo Slider for gp|Easy 1.0.4

 defined('is_running') or die('Not an entry point...');

class Gadget_Nivo_Slider {

	var $config; // slides' images path, slideshow options
	var $config_file;

	function Gadget_Nivo_Slider() {
		global $addonPathData;
		$this->config_file = $addonPathData.'/config.php';
		$this->Nivo_Slider_Load_Config();
		$this->Nivo_Slider_Gadget_Output();
		}

	function Nivo_Slider_Gadget_Output() {
		global $page, $addonFolderName, $dataDir, $dirPrefix;
		$page->head_js[] = '/data/_addoncode/'.$addonFolderName.'/nivo/jquery.nivo.slider.pack.js';

		$nivoTheme = $this->config["theme"];
		if ( $this->config["theme"]=="") { $nivoTheme = "default"; }
		$page->css_user[] = '/data/_addoncode/'.$addonFolderName.'/themes/'.$nivoTheme.'/'.$nivoTheme.'.css';

		$page->css_user[] = '/data/_addoncode/'.$addonFolderName.'/nivo/nivo-slider.css';

		// get slide images from directory
		// sanitize image path
		if (strpos($this->config['imagepath'],"../") || strpos($this->config['imagepath'],"..\\")) {
			message("Imagepath: forbidden directory traversal! Remove any ../");
			$imagepath = "/image";
		} else {
			$imagepath = $this->config['imagepath'];
		}

		$gpE_NS_error = "Sorry, an error occured.";

		if (is_dir($dataDir.'/data/_uploaded'.$imagepath)) {
		// $slide_images = glob($dataDir.'/data/_uploaded'.$imagepath."/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}", GLOB_BRACE);
		$slide_images = $this->getAllImages($dataDir.'/data/_uploaded'.$imagepath."/");
		// $slide_captions = glob($dataDir.'/data/_uploaded'.$imagepath."/*.{txt,TXT}", GLOB_BRACE);
		$slide_captions = $this->getAllTextfiles($dataDir.'/data/_uploaded'.$imagepath."/");
		$gpE_NS_error = false;
		} else {
		$gpE_NS_error = "Nivo Slider for gp|Easy - Gadget: Your image path does not exist on the server!<br/>";
		}
		// $gpE_NS_error .= "\n".showArray($slide_captions);

		if (count($slide_images) == 0) { $gpE_NS_error .= "Nivo Slider for gp|Easy - Gadget: Your image path does not contain any image files!"; }

		if (!$gpE_NS_error) { // IF IMAGES AVAILABLE

			// slide wrapper
			echo '<div class="gpE_nivo_slideshow slider-wrapper theme-'.$nivoTheme.'"';
			if ($this->config['containerStyles']!='') { echo ' style="'.$this->config['containerStyles'].'"'; }
			echo '>'."\n";

			echo ' <div id="slider" class="nivoSlider">'."\n";

			// sort array

			if ($this->config["sortby"]=="alphanum") {
				sort($slide_images);

			} elseif ($this->config["sortby"]=="random") {
				shuffle($slide_images);

			} elseif ($this->config["sortby"]=="mtime") {
				usort($slide_images, array($this,"sort_by_mtime"));

			} elseif ($this->config["sortby"]=="rmtime") {
				usort($slide_images, array($this,"reverse_sort_by_mtime"));
			}

			$slidenumber = 0;
			$HTMLcaptions = "";
			// DEBUG  message(showArray($slide_captions));
			foreach ($slide_images as &$value) {
				echo '  <img class="gpE_nivo_slide" id="gpE_nivo_slide_'.$slidenumber.'" alt=""';

				if ($this->config['captions']=='filenames') {
					$fileNameCaption = str_replace('_',' ',substr(basename($value),0,strrpos(basename($value), '.')));
					echo ' title="'.$fileNameCaption.'"';
				}

				if ($this->config['captions']=='textfiles') {
					$txt_file = substr($value,0,strrpos($value, '.')).".txt"; // message($txt_file);
					$TXT_file = substr($value,0,strrpos($value, '.')).".TXT"; // message($TXT_file);
					// DEBUG  echo ' txtfile="'.$txt_file.'" bool="'.(in_array($txt_file, $slide_captions)).'"';
					$myTxtFile = false;
					if (in_array($txt_file, $slide_captions)) { $myTxtFile = $txt_file; }
					if (in_array($TXT_file, $slide_captions)) { $myTxtFile = $TXT_file; }
					if ($myTxtFile) {
						$fh = fopen($myTxtFile, 'r');
						$HTMLdata = fread($fh, filesize($myTxtFile));
						fclose($fh);
						echo ' title="#gpE_nivoTxtCaption_'.$slidenumber.'"';
						$HTMLcaptions .= '<div id="gpE_nivoTxtCaption_'.$slidenumber.'" class="nivo-html-caption">'.$HTMLdata.'</div>';
					}
				}

				//DEBUG  message(htmlspecialChars($HTMLcaptions)."-<br/>");

				if ($this->config['slideStyles']!='') { echo ' style="'.$this->config['slideStyles'].'"'; }

				echo ' src="'.$dirPrefix.'/data/_uploaded'.$this->config['imagepath'].'/'.basename($value).'"';
				echo ' data-thumb="'.$dirPrefix.'/data/_uploaded'.$this->config['imagepath'].'/'.basename($value).'"';
				echo ' />'."\n";
				$slidenumber++;
			}
			unset($value);

			echo ' </div>'."\n"; // slider END
			echo '</div>'."\n"; // slide-wrapper END
			if ($HTMLcaptions!="") { echo $HTMLcaptions; } // captions from textfiles
			echo '<div style="margin:0; padding:0; clear:both;"></div>'."\n"; // clear

			echo '<script type="text/javascript">'."\n";
			// echo '$(document).ready(function() {'."\n";
			echo '$(window).load(function() {'."\n";
			echo '$("#slider").nivoSlider({ '."\n";

			$last_key = end(array_keys($this->config));
			foreach ($this->config as $key => $value) {
				if ($key != "imagepath" && $key != "sortby" && $key != "theme" && $key != "containerStyles" && $key != "slideStyles" && $key != "captions" && $value != "" ) {
					echo $key.' : ';
					if ( is_numeric($value) || $value == "true" || $value == "false" || $value == "null" || strpos($value,"function") === 0 || ( strpos($value, '{') === 0 && strpos(strrev($value),'}') === 0) ) {
						echo $value;
					} else {
						echo '"'.$value.'"';
					}
					if ($key != $last_key) { echo ","; }
					echo "\n";
				}
			}
			unset($value);

			echo "	});\n"; // nivoSlider END
			echo "});\n"; // WINLOAD END
			echo "</script>\n";

		} else { // IF IMAGES AVAILABLE END
		message($gpE_NS_error);
		}
	}

	function Nivo_Slider_Load_Config() {
		if (file_exists($this->config_file)) {
			include($this->config_file);
			$this->config = $config;
		} else {
			//default config
			$this->config = array();
			$this->config['imagepath'] = '/image';
			$this->config['sortby'] = 'alphanum'; // alphanum, mtime, rmtime, random
			$this->config['theme'] = 'easyInline'; // dark, default, easy, easyInline, light
			$this->config['containerStyles'] = ''; // custom styles added inline to the container
			$this->config['slideStyles'] = ''; // custom styles added inline to the images/slides
			$this->config['captions'] = 'none'; // none, filenames, textfiles

			$this->config['effect'] = 'random';
			/*
					possible values: sliceDown, sliceDownLeft, sliceUp,
					sliceUpLeft, sliceUpDown, sliceUpDownLeft,
					fold, fade, random, slideInRight, slideInLeft,
					boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
			*/
			$this->config['slices'] = '15';
			$this->config['boxCols'] = '8';
			$this->config['boxRows'] = '4';

			$this->config['pauseTime'] = '4000';
			$this->config['animSpeed'] = '1000';

			$this->config['directionNav'] = 'true';
			$this->config['directionNavHide'] = 'true';
			$this->config['controlNav'] = 'true';
			$this->config['controlNavThumbs'] = 'false';
			$this->config['prevText'] = 'prev';
			$this->config['nextText'] = 'next';

			$this->config['pauseOnHover'] = 'true';
			$this->config['manualAdvance'] = 'false';

			$this->config['startslide'] = '0';
			$this->config['randomStart'] = 'false';

			$this->config['beforeChange'] = 'function(){}';
			$this->config['afterChange'] = 'function(){}';
			$this->config['slideshowEnd'] = 'function(){}';
			$this->config['lastSlide'] = 'function(){}';
			$this->config['afterLoad'] = 'function(){}';
		}
	}

	function sort_by_mtime($file1,$file2) {
		$time1 = filemtime($file1);
		$time2 = filemtime($file2);
		if ($time1 == $time2) {
			return 0;
		}
		return ($time1 < $time2) ? 1 : -1;
	}

	function reverse_sort_by_mtime($file1,$file2) {
		$time1 = filemtime($file1);
		$time2 = filemtime($file2);
		if ($time1 == $time2) {
			return 0;
		}
		return ($time1 > $time2) ? 1 : -1;
	}


/* from http://nivo.dev7studios.com/support/jquery-plugin-usage/

$('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        directionNavHide: true, // Only show on hover
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
*/

function getAllImages($imgdir) {
	$allImages = array();
	$ftypes = array('png','jpg','jpeg','gif'); // file types to add to array
	$dimg = opendir($imgdir);
	while($imgfile = readdir($dimg)) {
		if(in_array(strtolower(substr($imgfile,-3)),$ftypes) OR in_array(strtolower(substr($imgfile,-4)),$ftypes)) {
			$allImages[] = $imgdir.$imgfile;
		}
	}
	return $allImages;
}

function getAllTextfiles($txtdir) {
	$allTextfiles = array();
	$dtxt = opendir($txtdir);
	while($txtfile = readdir($dtxt)) {
		if(strtolower(substr($txtfile,-3)) === "txt") {
			$allTextfiles[] = $txtdir.$txtfile;
		}
	}
	return $allTextfiles;
}

} // class end