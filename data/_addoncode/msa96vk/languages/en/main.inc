<?php // UTF-8 ÄÖÜäöü
// for translators: unescape single quotes or better use the real apostrope --> ’ <-- !

$plugin_lang = array(

// TAB CAPTIONS
'content'	=>'Content',
'appearance'	=>'Appearance',
'behavior'	=>'Behavior',
'animation'	=>'Animation',
'controls'	=>'Controls',
'functions'	=>'Callback Functions',
'documentation_title'	=>'Help',

'imagepath'			=>'e.g. <em>/image/slides</em> - Path relative to the Uploaded Files folder. All images (jpg, png, gif) in this folder will be used as slides.',

// SORTING AND SLIDE ORDER
'sortby'			=>'order in which slides are shown. <em>alphanumeric</em> is case sensitive (0-9, A-Z, a-z). <em>random</em> shuffles the slides order upon every page load. <em>newest/oldest first</em> sorts by upload time (mtime).',
'alphanum'	=>'alphanumeric',
'random'	=>'random',
'mtime'	=>'newest first',
'rmtime'	=>'oldest first',

// THEME AND STYLES
'theme'	=>'Theme of the slideshow and it’s navigation elements. Test which one suits your design best.',
'containerStyles'		=>'additional style properties for the wrapping div-container. e.g. <em>style="width:800px; margin:0 auto;"</em> makes the width fixed (not “responsive”) and horizontally centeres the slider. Will be written directly as <em>style="[your inputs]"</em> into HTML. Some properties may get overruled by the jQuery Plugin. Try yourself what’s gonna work ;-) Use Inline Style Syntax without curly brackets. Single quotes if needed.',
'slideStyles'		=>'additional style properties for the slides/images. Same input rules as above.',

// CONTROLS/NAVIGATION

'nextText'			=>'text for the next-slide-navigation element (directionNav active). Not visible in current themes where images are used.',
'prevText'			=>'text for the previous-slide-navigation element (directionNav active). Not visible in current themes where images are used.',
'pauseOnHover'			=>'slideshow pauses on hover',
'directionNav'	=>'True to show previous/next-navigation. Will be shown as arrow images in all current themes.',
'directionNavHide'	=>'True to hide navigation(arrows) when mouse pointer is out of slideshow.',
'controlNav'	=>'True to show clickable slide numbers. Will display as bullets in all current themes.',
'controlNavThumbs'	=>'Show thumbnails instead of numbers/bullets.',

'manualAdvance'	=>'True to block autmatic advance of slideshow. Activate directionNav oder controlNav to enable manual navigation.',
'randomStart'	=>'True to use random image as start slide. Does not change the order.',
'startslide'	=>'number of slide to start width. Default = 0. Does not change the order.',

'pauseTime'			=>'time (in milliseconds) slides are shown.',
'animSpeed'			=>'duration (in milliseconds) of the transition effect.',

'effect'				=>'transition effect used. Check them out.',
'effect_random'	=>'random effects',
'effect_fade'	=>'fade',
'effect_fold'	=>'fold',
'effect_sliceDown'=>'sliceDown',
'effect_sliceDownLeft'=>'sliceDownLeft',
'effect_sliceUp'	=>'sliceUp',
'effect_sliceUpLeft'	=>'sliceUpLeft',
'effect_sliceUpDown'	=>'sliceUpDown',
'effect_sliceUpDownLeft'	=>'sliceUpDownLeft',
'effect_slideInRight'	=>'slideInRight',
'effect_slideInLeft'	=>'slideInLeft',
'effect_boxRandom'	=>'boxRandom',
'effect_boxRain'	=>'boxRain',
'effect_boxRainReverse'	=>'boxRainReverse',
'effect_boxRainGrow'	=>'boxRainGrow',
'effect_boxRainGrowReverse'	=>'boxRainGrowReverse',
'boxCols'		=>'number of hoizontal tiles for <em>box</em>-effects',
'boxRows'		=>'number of vertical tiles for <em>box</em>-effects',
'slices'	=>'number of vertical bars for <em>slice</em>-effects',

// CAPTION OPTIONS
'captions'	=>'display slide captions. <br/><strong><em>from filenames</em></strong> generates captions from the images’ respective filenames. The file extension (e.g. ".jpg") will be stripped, underscores (_) will be displayed as blanks. <br/><strong><em>from textfiles</em></strong> looks for textfiles (*.txt) within the images’ folder. Textfiles that are - except the file extension - equally named as images (e.g. image1.jpg + image1.txt) will be used to generate captions. Content of text files may contain HTML formatting.',
'none'	=>'none',
'filenames'	=>'from filenames',
'textfiles'	=>'from textfiles',


'confirm_reset_to_defaults'	=>'Really reset to default settings? (This will also reset the imagepath)',

// CALLBACK FUNCTIONS
'afterChange'			=>'Callback function after transition. An anonymous JavaScript function can be inserted: <em>function() { //do_something; }</em>. Use single quotes if needed.',
'beforeChange'		=>'Callback function before transition. An anonymous JavaScript function can be inserted: <em>function() { //do_something; }</em>. Use single quotes if needed.',
'slideshowEnd'		=>'Callback function at the end of the slideshow. An anonymous JavaScript function can be inserted: <em>function() { //do_something; }</em>. Use single quotes if needed.',
'lastSlide'		=>'Callback function at last slide transition. An anonymous JavaScript function can be inserted: <em>function() { //do_something; }</em>. Use single quotes if needed.',
'afterLoad'		=>'Callback function after slideshow is loaded. An anonymous JavaScript function can be inserted: <em>function() { //do_something; }</em>. Use single quotes if needed.',

'see_also'	=>'See also',

'documentation_content' => '
<h2>What it does</h2>
<p>Nivo Slider for gp|Easy queries a given directory for image files (*.jpg, *.png, *.gif). All found images will be shown as slides using the 
<a href="http://nivo.dev7studios.com/" target="_blank">Nivo Slider jQuery Plugin</a>. Nivo Slider provides a variety of transition effects, navigation options and the possibility to display captions. There are several themes to select from. As long as no fixed with is set the slideshow is “responsive“, meaning that it resizes to the available surrounding space (even dynamically).</p>

<h2>Limitations</h2>
<p>With Nivo Slider for gp|Easy you can only create one single slideshow which can be placed within the layout (e.g. the header) or within a page section using the Gadget <em>Nivo Slider</em>. It’s not possible to create several independent slideshows. If you’re looking for such functionality try the <a href="http://gpeasy.com/Special_Addon_Plugins?id=87" target="_blank">Simple Slideshow Plugin</a>. </p>

<h2>Creating a folder for the slideshow images</h2>
<ul>
<li>Go to <em>Uploaded files</em> in the Admin toolbox, click the <em>image</em> folder icon and use <em>Create Folder…</em> for your new <em>slides</em> folder (or whatever name you prefer). Change into the new folder and upload all images you want to have displayed as slides.</li>
</ul>

<h2>Plugin Administration</h2>
<ul>
<li>In the Plugin Administration put the path to your images into the “imagepath” field (which is <em>/image/slides</em> if you did as described above). Don’t use quotes in this input field.</li>
</ul>

<h2>Site-wide Slideshow</h2>
<p>This is what the plugin is actually designed for…</p>
<h3>Adjust your theme - template.php</h3>
<ul>
<li>Open the file <em>[gp|Easy installation path]/themes/[current theme]/<strong>template.php</strong></em> for editing.</li>
<li>At your desired position in the layout, such as the header, insert <em/>&lt;?php gpOutput::Get("Extra","Slideshow"); ?&gt;</em>.</li>
<li>Save template.php. Switch back to the browser to your gp|Easy Administration.</li>
</ul>

<h3>Insert the Gadget into the layout</h3>
<ul>
<li>In the Admin toolbox choose <em>Appearance</em> -&gt; <em>Edit This Layout</em>.</li>
<li>At the layout position you just created in the template.php there should appear a white dotted grey area.</li>
<li>Use the <em>Insert</em>-button to add the Gadget <em>Nivo Slider</em> here.</li>
<li>If your gp|Easy theme uses getAllGadgets, you might have to remove <em>Nivo Slider</em> from where getAllGadgets is called (probably the bottom of the sidebar or in the footer).</li>
</ul>

<h2>Slideshow in the page content</h2>
<p>Alternatively you can place the slideshow on any page…</p>
<ul>
<li>Navigate to the page where the slideshow should show up.</li>
<li>Add a <em>New Section</em> in the content area. For Content Type choose <em>File Include</em>.</li>
<li>Edit your newly created Section. In the Editor toolbar Click the <em>Gadgets</em> field and select <em>Nivo Slider</em>.</li>
<li>Click <em>Save &amp; Close</em>.</li>
<li>If your gp|Easy theme uses getAllGadgets, edit your layout and remove <em>Nivo Slider</em> from where getAllGadgets is called (probably the bottom of the sidebar or in the footer).</li>
</ul>

<h2>Troubleshooting</h2>
<ul>
<li><strong>If no slides show up:</strong> Check your imagepath and if there actually are images in there.</li>
<li><strong>The Slideshow is in the wrong place:</strong> Your current gp|Easy theme uses “getAllGadgets” therefore the Nivo Slider Gadget is called twice (but only rendered once). In the gp|Easy Admin Toolbox under Appearance click <em>Edit this Layout</em> and remove <em>Nivo Slider</em> from where it wrongly shows up. The Slideshow should now render where you have placed it in the layout/page.</li>
<li><strong>The Slideshow has undesired dimensions:</strong> Since version 3, NivoSlider is “resposive” so it adjusts it’s size to the available space. If you want a fixed size (to match the exact size of your images or header width) insert sth. like <em>width:720px;</em> in the <em>containerStyles</em> field found in the Appearance tab</li>
</ul>


<h2>Credits/License</h2>
<p><strong>Nivo Slider for gp|Easy</strong> is made by <a href="http://gpeasy.com/Special_Addons_User?cmd=user&id=789" target="_blank">Jürgen Krausz</a> and utilizes <a href="http://nivo.dev7studios.com/" target="_blank">Nivo Slider by Dev7Studios.com</a>. Both components are free software under the <a href="http://en.wikipedia.org/wiki/MIT_License">MIT License</a>.</p>',
);

?>