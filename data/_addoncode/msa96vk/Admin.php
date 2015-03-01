<?php // Nivo Slider for gp|Easy 1.0.4

defined('is_running') or die('Not an entry point...');

class Admin_Nivo_Slider {

	var $config; //image directory, Slideshow Options
	var $config_file;
	var $defaultconfig;

	function Admin_Nivo_Slider() {
		global $addonPathData, $addonFolderName, $page, $gpversion;
		if( version_compare($gpversion,'3.5','<') ) {
			$page->head_js[] = '/data/_addoncode/'.$addonFolderName.'/jquery-ui-extensions/jquery-ui-1.8.22.widget.tabs.min.js';
			$page->css_admin[] = '/data/_addoncode/'.$addonFolderName.'/jquery-ui-extensions/jquery-ui-1.8.22.widget.tabs.min.css';
		} else {
			common::LoadComponents('tabs');
		}

		$this->config_file = $addonPathData.'/config.php';
		$this->Nivo_Slider_Load_Config();
		if (isset($_POST['save'])) { $this->Nivo_Slider_Save_Config(); }
		$this->Nivo_Slider_Show_Config();
	}

	function Nivo_Slider_Show_Config() {

		global $langmessage, $config, $addonPathCode, $plugin_lang, $page, $gpversion;

		// include language file, fallback to english if current language doesn't exist
		if (file_exists($addonPathCode."/languages/".$config["language"]."/main.inc")) {
			include "".$addonPathCode."/languages/".$config["language"]."/main.inc";
		} else {
			include "".$addonPathCode."/languages/en/main.inc";
		}


		// headline
		echo '<h1>Nivo Slider for gp|Easy</h1>';
		echo '<form name="NivoConfig" action="'.common::GetUrl('Admin_Nivo_Slider').'" method="post">';

		echo '<div id="NivoAdminTabs">'; //  === UI TABS START ===
		echo '<ul>';
		echo '<li><a href="#NivoSliderContent">'.$plugin_lang['content'].'</a></li>';
		echo '<li><a href="#NivoSliderAppearance">'.$plugin_lang['appearance'].'</a></li>';
		echo '<li><a href="#NivoSliderAnimation">'.$plugin_lang['animation'].'</a></li>';
		echo '<li><a href="#NivoSliderControls">'.$plugin_lang['controls'].'</a></li>';
		echo '<li><a href="#NivoSliderFunctions">'.$plugin_lang['functions'].'</a></li>';
		echo '<li><a href="#NivoSliderDoc">'.$plugin_lang['documentation_title'].'</a></li>';
		echo '</ul>';

		echo '<div id="NivoSliderContent">';
		$this->NivoSliderFormElements(array("imagepath","sortby","startslide","randomStart","captions"));
		echo '</div>';

		echo '<div id="NivoSliderAppearance">';
		$this->NivoSliderFormElements(array("theme","containerStyles","slideStyles"));
		echo '</div>';

		echo '<div id="NivoSliderAnimation">';
		$this->NivoSliderFormElements(array("effect","pauseTime","animSpeed","slices","boxCols","boxRows"));
		echo '</div>';

		echo '<div id="NivoSliderControls">';
		$this->NivoSliderFormElements(array("pauseOnHover","manualAdvance","directionNav","directionNavHide","controlNav","controlNavThumbs","controlNavHide","prevText","nextText"));
		echo '</div>';

		echo '<div id="NivoSliderFunctions">';
		$this->NivoSliderFormElements(array("beforeChange","afterChange","slideshowEnd","lastSlide","afterLoad"));
		echo '</div>';

		echo '<div id="NivoSliderDoc">'; // DOCUMENTATION TAB START
		echo '<div>'.$plugin_lang['documentation_content'].'</div>';
		echo '</div>'; // DOCUMENTATION TAB END
		echo '</div>'; // === UI TABS END ===

		echo '<div style="clear:both; padding-top:12px;">';
		echo '<input type="submit" name="save" value="'.$langmessage['save'].'" />';
		echo '<span style="float:right;">'.$plugin_lang['see_also'].': <a href="http://nivo.dev7studios.com" ';
		echo 'target="_blank">http://nivo.dev7studios.com</a></span></div>';
		echo '</form>';

		//echo '<script type="text/javascript">';
		// echo '$(document).ready( function() { '; // DOMREADY START
		$page->jQueryCode .= '$("#NivoAdminTabs").tabs();';
		// echo '});'; // DOMREADY END
		//echo '</script>';
	} // show config end


	function NivoSliderFormElements($elements) {

		global $plugin_lang, $langmessage;

		foreach ($this->config as $key => $value) {

			if (in_array($key,$elements)) {

				echo '<div style="margin:2px 0 0 0; padding:4px; background-color:#fafafa; clear:both; border-radius:4px;">';
				echo '<label for="'.$key.'" style="float:left; display:block; font-weight:bold; width:15%;">'.$key.':</label>';

				if ( in_array($key, array("pauseOnHover","manualAdvance","directionNav","directionNavHide","controlNav","controlNavThumbs","randomStart")) ) {

					echo '<select style="float:left; width:21%;" name="'.$key.'" id="'.$key.'">';
					echo '<option value="true"'.(($value=='true' || $value=='1')?' selected="selected"':'').'>'.$langmessage['True'].'</option>';
					echo '<option value="false"'.(($value=='false' || $value=='0')?' selected="selected"':'').'>'.$langmessage['False'].'</option>';
					echo '</select>';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

				} elseif ($key=="effect") {

					echo '<select style="float:left; width:21%;" name="effect" id="effect">';
					echo '<option value="random"'.(($value=='random' || $value=='')?' selected="selected"':'').'>'.$plugin_lang['effect_random'].'</option>';
					echo '<option value="fade"'.(($value=='fade')?' selected="selected"':'').'>'.$plugin_lang['effect_fade'].'</option>';
					echo '<option value="fold"'.(($value=='fold')?' selected="selected"':'').'>'.$plugin_lang['effect_fold'].'</option>';
					echo '<option value="sliceDown"'.(($value=='sliceDown')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceDown'].'</option>';
					echo '<option value="sliceDownLeft"'.(($value=='sliceDownLeft')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceDownLeft'].'</option>';
					echo '<option value="sliceUp"'.(($value=='sliceUp')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceUp'].'</option>';
					echo '<option value="sliceUpLeft"'.(($value=='sliceUpLeft')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceUpLeft'].'</option>';
					echo '<option value="sliceUpDown"'.(($value=='sliceUpDown')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceUpDown'].'</option>';
					echo '<option value="sliceUpDownLeft"'.(($value=='sliceUpDownLeft')?' selected="selected"':'').'>'.$plugin_lang['effect_sliceUpDownLeft'].'</option>';
					echo '<option value="slideInRight"'.(($value=='slideInRight')?' selected="selected"':'').'>'.$plugin_lang['effect_slideInRight'].'</option>';
					echo '<option value="slideInLeft"'.(($value=='slideInLeft')?' selected="selected"':'').'>'.$plugin_lang['effect_slideInLeft'].'</option>';
					echo '<option value="boxRandom"'.(($value=='boxRandom')?' selected="selected"':'').'>'.$plugin_lang['effect_boxRandom'].'</option>';
					echo '<option value="boxRain"'.(($value=='boxRain')?' selected="selected"':'').'>'.$plugin_lang['effect_boxRain'].'</option>';
					echo '<option value="boxRainReverse"'.(($value=='boxRainReverse')?' selected="selected"':'').'>'.$plugin_lang['effect_boxRainReverse'].'</option>';
					echo '<option value="boxRainGrow"'.(($value=='boxRainGrow')?' selected="selected"':'').'>'.$plugin_lang['effect_boxRainGrow'].'</option>';
					echo '<option value="boxRainGrowReverse"'.(($value=='boxRainGrowReverse')?' selected="selected"':'').'>'.$plugin_lang['effect_boxRainGrowReverse'].'</option>';
					echo '</select>';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

				} elseif ($key=="sortby") {

					echo '<select style="float:left; width:21%;" name="sortby" id="sortby">';
					echo '<option value="alphanum"'.(($value=='alphanum' || $value=='')?' selected="selected"':'').'>'.$plugin_lang['alphanum'].'</option>';
					echo '<option value="random"'.(($value=='random')?' selected="selected"':'').'>'.$plugin_lang['random'].'</option>';
					echo '<option value="mtime"'.(($value=='mtime')?' selected="selected"':'').'>'.$plugin_lang['mtime'].'</option>';
					echo '<option value="rmtime"'.(($value=='rmtime')?' selected="selected"':'').'>'.$plugin_lang['rmtime'].'</option>';
					echo '</select>';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

					} elseif ($key=="theme") {

					echo '<select style="float:left; width:21%;" name="theme" id="theme">';
					echo '<option value="easy"'.(($value=='easy')?' selected="selected"':'').'>easy</option>';
					echo '<option value="easyInline"'.(($value=='easyInline')?' selected="selected"':'').'>easyInline</option>';
					echo '<option value="default"'.(($value=='default')?' selected="selected"':'').'>default</option>';
					echo '<option value="light"'.(($value=='light')?' selected="selected"':'').'>light</option>';
					echo '<option value="dark"'.(($value=='dark')?' selected="selected"':'').'>dark</option>';
					echo '<option value="bar"'.(($value=='bar')?' selected="selected"':'').'>bar</option>';
					echo '</select>';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

					} elseif ($key=="captions") {

					echo '<select style="float:left; width:21%;" name="captions" id="captions">';
					echo '<option value="none"'.(($value=='none')?' selected="selected"':'').'>'.$plugin_lang["none"].'</option>';
					echo '<option value="filenames"'.(($value=='filenames')?' selected="selected"':'').'>'.$plugin_lang["filenames"].'</option>';
					echo '<option value="textfiles"'.(($value=='textfiles')?' selected="selected"':'').'>'.$plugin_lang["textfiles"].'</option>';
					echo '</select>';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

					} elseif ($key=="containerStyles" || $key=="slideStyles" || $key=="beforeChange" || $key=="afterChange" || $key=="slideshowEnd" || $key=="lastSlide" || $key=="afterLoad") {

					echo '<textarea class="gpE_nivoTextArea" style="float:left; width:40%; resize:vertical;"';
					echo ' rows="2" name="'.$key.'" id="'.$key.'">'.$value.'</textarea>';
					echo '<span style="float:left; margin-left:1%; width:38%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

				} else {

					echo '<input style="float:left; width:20%;" name="'.$key.'" id="'.$key.'" type="text" value="'.$value.'" />';
					echo '<span style="float:left; margin-left:1%; width:58%; font-size:82.5%;">'.$plugin_lang[$key].'</span>';

				}

				echo '<br style="clear:both;" />';
				echo '</div>';

			} // if in_array END

		} // foreach END

	} // NivoSlider FormElements END

	function Nivo_Slider_Load_Config() {
			$this->defaultconfig = array();
			$this->defaultconfig['imagepath'] = '/image';
			$this->defaultconfig['sortby'] = 'alphanum'; // alphanum, mtime, rmtime, random
			$this->defaultconfig['theme'] = 'easyInline'; // dark, default, easy, easyInline, light
			$this->defaultconfig['effect'] = 'random';
			/*
					possible values: sliceDown, sliceDownLeft, sliceUp,
					sliceUpLeft, sliceUpDown, sliceUpDownLeft,
					fold, fade, random, slideInRight, slideInLeft,
					boxRandom, boxRain, boxRainReverse, boxRainGrow, boxRainGrowReverse
			*/
			$this->defaultconfig['containerStyles'] = ''; // custom inline styles added to the container
			$this->defaultconfig['slideStyles'] = ''; // custom inline styles added to the images/slides
			$this->defaultconfig['captions'] = 'none'; // none, filenames, textfiles
			$this->defaultconfig['slices'] = '15';
			$this->defaultconfig['boxCols'] = '8';
			$this->defaultconfig['boxRows'] = '4';
			$this->defaultconfig['pauseTime'] = '4000';
			$this->defaultconfig['animSpeed'] = '1000';
			$this->defaultconfig['directionNav'] = 'true';
			$this->defaultconfig['directionNavHide'] = 'true';
			$this->defaultconfig['controlNav'] = 'true';
			$this->defaultconfig['controlNavThumbs'] = 'false';
			$this->defaultconfig['prevText'] = 'prev';
			$this->defaultconfig['nextText'] = 'next';
			$this->defaultconfig['pauseOnHover'] = 'true';
			$this->defaultconfig['manualAdvance'] = 'false';
			$this->defaultconfig['startslide'] = '0';
			$this->defaultconfig['randomStart'] = 'false';
			$this->defaultconfig['beforeChange'] = 'function(){}';
			$this->defaultconfig['afterChange'] = 'function(){}';
			$this->defaultconfig['slideshowEnd'] = 'function(){}';
			$this->defaultconfig['lastSlide'] = 'function(){}';
			$this->defaultconfig['afterLoad'] = 'function(){}';
		if (file_exists($this->config_file)) {
			include($this->config_file);
			$this->config = $config;
		} else {
			$this->config = $this->defaultconfig;
		}
	}


	function Nivo_Slider_Save_Config() {
		global $langmessage, $dataDir;
		$s = trim($_POST['imagepath']);
		if ($s=='') { $s='/'; }
		if (strpos($s,"../") || strpos($s,"..\\")) { message("Nivo Slider for gp|Easy: Imagepath - forbidden dot-dot-slash directory traversal! Default loaded.");  $s="/image"; }
		if ($s[0]!='/') { $s='/'.$s;}
		if ($s[strlen($s)-1]=='/') { $s=substr($s,0,-1); }

		if (!is_dir($dataDir.'/data/_uploaded'.$s)) {
			message("Nivo Slider for gp|Easy - Admin: Your image path does not exist on the server!");
		} else {
			// $slide_images = glob($dataDir.'/data/_uploaded'.$s."/*.{jpg,JPG,jpeg,JPEG,gif,GIF,png,PNG}", GLOB_BRACE);
			$slide_images = $this->getAllImages($dataDir.'/data/_uploaded'.$s."/");
			if (count($slide_images) == 0) {
			message("Nivo Slider for gp|Easy - Admin: Your image path does not contain any image files!");
			}
		}

		$this->config['imagepath'] = $s;
		$this->config['sortby'] = trim($_POST['sortby']);
		$this->config['theme'] = trim($_POST['theme']);
		$this->config['containerStyles'] = trim($_POST['containerStyles']);
		$this->config['slideStyles'] = trim($_POST['slideStyles']);
		$this->config['captions'] = trim($_POST['captions']);
		$this->config['effect'] = trim($_POST['effect']);
		$this->config['slices'] = trim($_POST['slices']);
		$this->config['boxCols'] = trim($_POST['boxCols']);
		$this->config['boxRows'] = trim($_POST['boxRows']);
		$this->config['pauseTime'] = trim($_POST['pauseTime']);
		$this->config['animSpeed'] = trim($_POST['animSpeed']);
		$this->config['directionNav'] = trim($_POST['directionNav']);
		$this->config['directionNavHide'] = trim($_POST['directionNavHide']);
		$this->config['controlNav'] = trim($_POST['controlNav']);
		$this->config['controlNavThumbs'] = trim($_POST['controlNavThumbs']);
		$this->config['prevText'] = trim($_POST['prevText']);
		$this->config['nextText'] = trim($_POST['nextText']);
		$this->config['pauseOnHover'] = trim($_POST['pauseOnHover']);
		$this->config['manualAdvance'] = trim($_POST['manualAdvance']);
		$this->config['manualAdvance'] = trim($_POST['manualAdvance']);
		$this->config['randomStart'] = trim($_POST['randomStart']);
		$this->config['beforeChange'] = trim($_POST['beforeChange']);
		$this->config['afterChange'] = trim($_POST['afterChange']);
		$this->config['slideshowEnd'] = trim($_POST['slideshowEnd']);
		$this->config['lastSlide'] = trim($_POST['lastSlide']);
		$this->config['afterLoad'] = trim($_POST['afterLoad']);

		if (gpFiles::SaveArray($this->config_file,'config',$this->config)) {
			message($langmessage['SAVED']);
		}
	} // save Config end

	function getAllImages($imgdir) {
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
		$dtxt = opendir($txtdir);
		while($txtfile = readdir($dtxt)) {
			if(strtolower(substr($txtfile,-3)) == "txt") {
				$allTextfiles[] = $txtdir.$txtfile;
			}
		}
		return $allTextfiles;
	}

} // class end
