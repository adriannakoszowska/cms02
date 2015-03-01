<?php // UTF-8 ÄÖÜäöü
// für Übersetzer/innen: Einfache Anführungszeichen müssen unescaped werden. Besser: Echte Apostrophe verwenden --> ’ <-- !

$plugin_lang = array(

// TAB CAPTIONS
'content'	=>'Inhalt',
'appearance'	=>'Erscheinungsbild',
'behavior'	=>'Verhalten',
'animation'	=>'Animation',
'controls'	=>'Steuerung',
'functions'	=>'Callback Funktionen',
'documentation_title'	=>'Hilfe',

'imagepath'			=>'z.B. <em>/image/slides</em> - Dateipfad relativ zum Dateimanagement-Grundverzeichnis. Alle Bilder (jpg, png, gif) in diesem Ordner werden als Slides angezeigt.',

// SORTING AND SLIDE ORDER
'sortby'			=>'Reihenfolge, in der die Bilder angezeigt werden sollen. <em>alphanumerisch</em> berücksichtigt Groß/Kleinschreibung (0-9, A-Z, a-z). <em>zufällig</em> erzeugt bei jedem Seitenaufruf eine neue, zufällige Abfolge. <em>neueste/älteste zuerst</em> sortiert nach Uploadzeitpunkt (mtime).',
'alphanum'	=>'alphanumerisch',
'random'	=>'zufällig',
'mtime'	=>'neueste zuerst',
'rmtime'	=>'älteste zuerst',

// THEME AND STYLES
'theme'	=>'Design der Slideshow bzw. der Navigationselemente. Am besten ausprobieren.',
'containerStyles'		=>'zusätzliche style-Angaben für den die Slideshow umgebenden div-Container. z.B. <em>style="width:800px; margin:0 auto;"</em> für fixe Breite und horizontale Zentrierung. Wird direkt als <em>style="[eigene Angaben]"</em> in den Quelltext übernommen - Inline Style Syntax ohne umgebende geschwungene Klammern verwenden. Einfache Anführungszeichen, falls benötigt. Manche Angaben können vom jQuery-Plugin außer Kraft gesetzt werden. Am besten selbst ausprobieren, was funktioniert ;-)',
'slideStyles'		=>'zusätzliche style-Angaben für die einzlnen Slides/Bilder. Gleiche Eingaberegeln wie oben.',

// CONTROLS/NAVIGATION

'nextText'			=>'Link-Text für Vorwärts-Navigation (directionNav). Bei grafischen Pfeilen (alle Themes) wird der Text nicht angezeigt.',
'prevText'			=>'Link-Text für Rückwärts-Navigation (directionNav). Bei grafischen Pfeilen (alle Themes)  wird der Text nicht angezeigt.',
'pauseOnHover'			=>'Slideshow pausiert bei Mouseover',
'directionNav'	=>'Ja, um Vorwärts/Rückwärts-Navigation anzuzeigen. In den bestehenden Themes als Pfeil-Buttons umgesetzt.',
'directionNavHide'	=>'Ja, um die Navigation(spfeile) auszublenden, wenn der Mauszeiger nicht über der Slideshow ist.',
'controlNav'	=>'Ja, um klickbare Slidenummern unterhalb der Slideshow anzuzeigen. In den bestehenden Themes als grafische Bullets umgesetzt.',
'controlNavThumbs'	=>'Thumbnails anstatt Nummern/Bullets anzeigen.',

'manualAdvance'	=>'Ja, um automatischen Ablauf der Slideshow zu verhindern. In diesem Fall directionNav oder controlNav aktivieren, um manuell zwischen Slides navigieren zu können.',
'randomStart'	=>'Ja, um mit zufälligem Bild zu beginnen. Ändert nicht die Bildreihenfolge!',
'startslide'	=>'Nummer des ersten anzuzeigenden Bildes. Beginnt bei 0. Ändert nicht die Bildreihenfolge!',

'pauseTime'			=>'Anzeigezeit der Slides (in Millisekunden).',
'animSpeed'			=>'Dauer des Übergangseffekts (in Millisekunden).',

'effect'				=>'Übergangseffekt. Am besten alle mal ausprobieren.',
'effect_random'	=>'zufällig',
'effect_fade'	=>'überblenden',
'effect_fold'	=>'falten',
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
'boxCols'		=>'Anzahl der hoizontalen Kacheln, gilt für alle <em>box</em>-Effekte',
'boxRows'		=>'Anzahl der vertikalen Kacheln, gilt für alle <em>box</em>-Effekte',
'slices'	=>'Anzahl der vertikalen Balken, gilt für alle <em>slice</em>-Effekte',

// CAPTION OPTIONS
'captions'	=>'Bildbeschriftungen. <br/><strong><em>aus Dateinamen</em></strong> erzeugt Beschriftungen aus den jeweiligen Dateinamen der Bilder. Dabei wird die Dateiextension (z.B. ".jpg") weggelassen und Unterstriche (_) werden als Leerzeichen dargestellt. <br/><strong><em>aus Textdateien</em></strong> sucht im selben Ordner, wo die Bilder liegen, nach Textdateien (*.txt). Wird eine Textdatei gefunden, die bis auf die Extension gleich heißt wie ein Bild (z.B. Bild1.jpg + Bild1.txt), wird der Inhalt der Textdatei als Bildbeschriftung ausgegeben. Im Text können HTML-Formatierungen verwendet werden.',
'none'	=>'keine',
'filenames'	=>'aus Dateinamen',
'textfiles'	=>'aus Textdateien',


'confirm_reset_to_defaults'	=>'Wollen Sie wirklich die Standardeinstellungen wiederherstellen? (Es wird auch der Dateipfad zurückgesetzt.)',

// CALLBACK FUNCTIONS
'afterChange'			=>'Callbackfunktion nach dem Übergangseffekt Es kann direkt eine anonyme Funktion notiert werden: <em>function() { //mach_was_tolles; }</em>. Einfache Anführungszeichen verwenden, falls benötigt.',
'beforeChange'		=>'Callbackfunktion vor dem Übergangseffekt. Es kann direkt eine anonyme Funktion notiert werden: <em>function() { //mach_was_tolles; }</em>. Einfache Anführungszeichen verwenden, falls benötigt.',
'slideshowEnd'		=>'Callbackfunktion am Ende der Slideshow. Es kann direkt eine anonyme Funktion notiert werden: <em>function() { //mach_was_tolles; }</em>. Einfache Anführungszeichen verwenden, falls benötigt.',
'lastSlide'		=>'Callbackfunktion beim Aufruf des letzten Slides. Es kann direkt eine anonyme Funktion notiert werden: <em>function() { //mach_was_tolles; }</em>. Einfache Anführungszeichen verwenden, falls benötigt.',
'afterLoad'		=>'Callbackfunktion wenn die Slideshow geladen wurde. Es kann direkt eine anonyme Funktion notiert werden: <em>function() { //mach_was_tolles; }</em>. Einfache Anführungszeichen verwenden, falls benötigt.',

'see_also'	=>'Mehr unter',

'documentation_content' => '
<h2>Funktionsweise</h2>
<p>Nivo Slider for gp|Easy sucht in einem definierbaren Ordner nach Bilddateien (*.jpg, *.png, *.gif). Aus den gefundenen Bildern wird mit Hilfe des jQuery-Plugins
<a href="http://nivo.dev7studios.com/" target="_blank">Nivo Slider</a> eine Slideshow generiert. Nivo Slider unterstützt zahlreiche Übergangseffekte, Navigationsoptionen und die Möglichkeit, Bildbeschreibungen einzublenden. Es stehen mehrere Themes zur Auswahl. Die Slideshow ist, so lange keine fixe Breite angegeben wird, „responsiv“ d.h. sie passt sich - auch dynamisch - der zur Verfügung stehenden Breite an.</p>

<h2>Einschränkungen</h2>
<p>Nivo Slider for gp|Easy kann lediglich eine einzelne Slideshow generieren und diese mit dem Gadget <em>Nivo Slider</em> in das Layout
(z.B im Header) oder mit dem Inhaltstyp <em>Datei einbinden</em> in einen Abschnitt einzelner Seiten einbinden. Es ist nicht möglich, mehrere unabhängige Slideshows zu erzeugen und gemeinsam auf einer Seite zu verwenden. Diese Funktionalität lässt sich ggf. mit dem Plugin <a href="http://gpeasy.com/Special_Addon_Plugins?id=87" target="_blank">Simple Slideshow</a> realisieren. </p>

<h2>Anlegen eines Dateiordners für Slideshow Bilder</h2>
<ul>
<li>Über die Dateiverwaltung einen neuen Ordner anlegen, z.B. den Ordner <em>slides</em> unter /Dateiverwaltung/image</li>
<li>In den Ordner wechseln und alle Bilder hochladen, die als Slides angezeigt werden sollen. </li>
</ul>

<h2>Plugin Administration</h2>
<ul>
<li>In der Plugin-Administration im Feld „imagepath“ den Ordnerpfad (in diesem Fall <em>/image/slides</em>) ohne Anführungszeichen eingeben.</li>
</ul>

<h2>Seitenübergreifende Slideshow</h2>
<p>Dafür ist das Plugin eigentlich vorgesehen…</p>

<h3>Theme anpassen - template.php</h3>
<ul>
<li>Die Datei <em>[gp|Easy-Installationspfad]/themes/[aktuelles Theme]/<strong>template.php</strong></em> zum bearbeiten öffnen.</li>
<li>An der gewünschten Stelle, z.B. im Headerbereich, den Eintrag <em/>&lt;?php gpOutput::Get("Extra","Slideshow"); ?&gt;</em> einfügen.</li>
<li>template.php speichern. In den Browser zu gp|Easy wechseln.</li>
</ul>

<h3>Gadget ins Layout einfügen</h3>
<ul>
<li>Im gp|Easy Adminstartionsmenü unter <em>Aussehen</em> den Punkt <em>Dieses Layout bearbeiten</em> wählen.</li>
<li>Am zuvor in der template.php festegelegten Ort sollte jetzt ein grauer Breiech mit weiß-punktierter Outline vorhanden sein.</li>
<li>Hier nun mit <em>Insert</em> den Gadget <em>Nivo Slider</em> einfügen.</li>
<li>Wenn das aktuelle gp|Easy Theme getAllGadgets verwendet, muss <em>Nivo Slider</em> vor dort, wo getAllGadgets aufgerufen wird, aus dem Layout entfernt werden (siehe Fehlersuche).
</ul>

<h2>Slideshow im Seitencontent platzieren</h2>
<p>Alternativ zum seitenübergreifenden Einsatz kann das Plugin auch im Content verwendet werden…</p>
<ul>
<li>Als Admin zur Seite navigieren, auf der die Slideshow angezeigt werden soll.</li>
<li>Im Contentbereich einen neuen Abschnitt erzeugen. Als Inhaltstyp <em>Datei einbinden</em> wählen.</li>
<li>Den neuen Abschnitt bearbeiten. In der sich öffnenden Editor-Toolbar in das Feld <em>Gadgets</em> klicken und <em>Nivo Slider</em> wählen.</li>
<li>Wenn das aktuelle gp|Easy Theme getAllGadgets verwendet, muss <em>Nivo Slider</em> vor dort, wo getAllGadgets aufgerufen wird, aus dem Layout entfernt werden (siehe Fehlersuche).
<li><em>Speichern &amp; Schließen</em> klicken.</li>
</ul>

<h2>Fehlersuche</h2>
<ul>
<li><strong>Die Slideshow wird nicht angezeigt:</strong> Ordnerpfad überprüfen und nachsehen, ob die Bilder auch wirklich dort liegen.</li>
<li><strong>Die Slideshow erscheint nicht dort, wo ich sie haben will:</strong> Das ausgewählte gp|Easy Theme verwendet „getAllGadgets“. Dadurch wird Nivo Slider doppelt aufgerufen aber nur (einmal angezeigt). In diesem Fall in der gp|Easy Admin-Toolbox unter Aussehen <em>Dieses Layout editieren</em> klicken und an der unerwünschten Stelle (meistens in der Sidebar oder im Footer)  das Gadget <em>Nivo Slider</em> entfernen. Dann sollte die Slideshow dort erscheinen, wo sie im Layout oder Seitenkontext eingefügt wurde.</li>
<li><strong>Die Slideshow hat die falsche Größe:</strong> NivoSlider ist seit der Version 3 „responsiv“, d.h. er passt sich automatisch an die zur Verfügung stehende Breite an. Wenn das nicht erwünscht ist, am besten im Erscheinungsbild-Tab im Feld <em>containerStyles</em> die gewünschte Breite angeben. z.B. <em>width:720px;</em>.
</ul>

<h2>Credits/Lizenz</h2>
<p><strong>Nivo Slider for gp|Easy</strong> stammt von <a href="http://gpeasy.com/Special_Addons_User?cmd=user&id=789" target="_blank">Jürgen Krausz</a> und basiert auf <a href="http://nivo.dev7studios.com/" target="_blank">Nivo Slider von Dev7Studios.com</a>. Beide Koponenten sind freie Software unter der <a href="http://en.wikipedia.org/wiki/MIT_License">MIT Lizenz</a></p>',
);

?>