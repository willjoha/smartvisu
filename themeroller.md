# Einleitung #
In diesem kleinen Tutorial wird erläutert wie ein ThemeRoller-Design in smartVISU eingebunden wird.

# Schritt 1: Template beziehen #
Als Beispiel dient in diesem Tutorial das "Holo inpired" Theme von Joram Teusink ([Teusink.org](http://teusink.blogspot.de/2012/09/android-holo-theme-for-jquery-mobile-111.html)), welches als [ZIP heruntergeladen](http://www.teusink.org/blog/holo_theme_jquerymobile-1.3.2.zip) und entpackt werden muss. In der ZIP-Datei interessiert uns nur eine Datei "themes/AndroidHoloDarkLight.css" welche in [ThemeRoller](http://themeroller.jquerymobile.com/) eingefügt wird.

# Schritt 2: [ThemeRoller](http://themeroller.jquerymobile.com/) #
Die Datei muss mit einem Texteditor z.B. [Notepad++](http://notepad-plus-plus.org/) oder [Geany](http://www.geany.org/) geöffnet und komplett in die Zwischenablage kopiert werden (Strg+A und dann Strg+C).
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/geany_original.png' title='Texteditor Geany mit der geöffneten CSS-Datei'>

Anschließend im Browser <a href='http://themeroller.jquerymobile.com/'>ThemeRoller</a> aufrufen und im Kopfbereich über den Button „Import“ den Quellcode einfügen (Strg+V). Die smartVISU verwendet zur Zeit Version 1.3.2 von jQuery mobile und daher muss bei "Upgrade to version" ebenfalls "1.3.2" ausgewählt werden.<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/themeroller_import.png' title='Importieren eines vorhandenen Themes'>

Der Button "Import" führt den Import durch und das Theme wird angezeigt.<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/themeroller_importiert.png' title='Theme in ThemeRoller'>

Die Farbschemata, als swatch bezeichnet, müssen noch in die richtige Reihenfolge gebracht werden.<br>
Bei der smartVISU wird "Swatch A" u.a. für die Kopfzeile und dem Menü verwendet, Swatch B z.B. für die Inhalte der Blocks. Für das Helle-Farbschema könnte z.B. swatch A und C getauscht werden. Diese Anordnung kann durch kopieren und löschen der Swatches realisiert werden. Die Swatche können zur Bearbeitung auf der linken Seite ausgewählt und dann kopiert (Duplicate) und anschließend gelöscht (Delete) werden. Die benötigte Reihenfolge wird mit folgende Aktionen hergestellt:<br>
<br>
1. Swatch B auswählen und duplizieren, jetzt ist D und B gleich,<br>
2. Swatch A auswählen und duplizieren, jetzt ist E mit A gleich,<br>
3. jetzt Swatch B löschen und zum Abschluss auch<br>
4. Swatch A löschen.<br>
<br>
Jetzt passt die Reihenfolge wie die folgende Abbildung zeigt:<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/themeroller_swatches.png' title='Sortierte swatches'>

<h1>Schritt 3: Optimierung in ThemeRoller</h1>
In smartVISU besteht die Möglichkeit verschiedene Farben für die Icons zu verwenden, bei einem hellen Design sind schwarze Icons sinnvoll. Bei Swatch A hat aber die Kopfzeile (Header) einen dunklen Hintergrund, so dass schwarze Icons nicht sichtbar sind.<br>
Daher ändern wir die Farben von der Header/Footerbar auf die Farbgebung von Swatch B, im obigen Screenshot sind die Farbcodes von Swatch B auf der linken Seite zu sehen. Die Farben für den Text (TEXT COLOR) und Hintergrund (BACKGROUND) müssen auch beim Swatch A im Header/Footer-Bereich eingetragen werden. Das Ergebnis mit den geänderten Farbcodes auf der linken Seite zeigt die folgende Abbildung:<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/themeroller_header.png' title='Geänderter Header'>

<h1>Schritt 4: Export</h1>
Die Farbgebung ist jetzt für eine Nutzung in der smartVISU vorbereitet und alle weiteren Modifikationen sind nicht mehr in ThemeRoller durchführbar. Das fertige Theme muss über den Button "Download" als ZIP-Datei heruntergeladen werden. Ein Name für das neue Theme wird in dem Eingabefeld rechts oben eingegeben (hier "holo-inspired") und über den Button "Download Zip" wird es als ZIP-Archiv gespeichert.<br>
Hinweis: Wer die vorherigen Schritte abkürzen möchte, kann das Ergebnis in ThemeRoller auch unter diesem Link direkt aufrufen: <a href='http://themeroller.jquerymobile.com/?ver=1.3.2&style_id=20140403-1'>holo-inspired</a>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/themeroller_download.png' title='Das Design wieder herunterladen'>

<h1>Schritt 5: In smartVISU einbinden</h1>
Die Designes sind auf dem Webserververzeichnis von smartVISU im Ordner "designs" hinterlegt. Um das neues Design "holo-inspired" einzubinden müssen die Dateien "holo-inspired.css" und "holo-inspired.min.css" aus der heruntergeladenen ZIP-Datei nach smartVISU/designs kopiert werden.<br>
Zusätzlich ist noch eine JavaScript-Datei (holo-inspired.js und holo-inspired.min.js) für die Darstellung der Plots erforderlich. Für diese Dateien kann eine der vorhandenen js-Dateien als Vorlage verwendet werden. Im Fall von diesem hellen Theme bietet es sich an, eine Kopie von "ice.js" und "ice.min.js" zu erstellen und in "holo-inspired.js" und in "holo-inspired.min.js" umzubenennen. Die Farben im Ice-Design passen gut zu holo-inspired, so dass nicht unbedingt Änderungen notwendig sind. Wer doch etwas ändern möchte, kann die angegeben Farben durch die in Holo ersetzen, in dem Blogeintrag zum Template von Joram Teusink hat er die verwendeten Farben aufgeführt.<br>
<br>
<h1>Schritt 6: Weitere Anpassungen</h1>
Nicht alle Design-Elemente die in smartVISU verwendet werden, können mit ThemeRoller angepasst werden, daher sind jetzt noch einige weitere Änderungen notwendig.<br>
Als erstes die Datei "ice.css" aus dem design-Ordner von smartVISU mit einem Texteditor öffnen. Am Ende der Datei finden sich die Farbangaben für die SVG-Icons, diesen Quelltext ab <code>/* smartVISU</code> bis zum Ende markieren, kopieren (Strg+C) und am Ende von "holo-inspired.css" einfügen (Strg+V).<br>
Die Farben der Icons können noch auf Holo-inspired angepasst werden, hierzu den Farbcode "#5595c6" zweimal  mit den holo-Farben "#33B5E5" ersetzen.<br>
Wenn das holo-inspired-Design in der Konfiguration ausgewählt wird, dann sieht es schon gut aus, aber die meisten Icons sind weiß und damit nur schwer erkennbar.<br>
Das Problem liegt darin, dass die png-Icons nicht mit CSS formatiert werden können und daher in der Datei "index.php" auf der obersten Ebene von smartVisu dem gewählten Design zugewiesen werden. Unser neues holo-inspired ist nicht enthalten und deshalb muss dieses durch hinzufügen von diesen Zeilen mit dem Texteditor in index.php ergänzt werden:<br>
<br>
Zwischen den folgenden beiden if bzw. elseif-Anweisungen muss eine neue elseif-Anweisung eingefügt werden, welche die Informationen für die zu verwendenen Icons enthält.<br>
<pre><code>	if (config_design == 'ice')<br>
	{ '<br>
		$twig-&gt;addGlobal('icon1', 'icons/bl/');<br>
		$twig-&gt;addGlobal('icon0', 'icons/sw/');<br>
	}<br>
	elseif (config_design == 'greenhornet')<br>
	{<br>
		$twig-&gt;addGlobal('icon1', 'icons/gn/');<br>
		$twig-&gt;addGlobal('icon0', 'icons/ws/');<br>
	}<br>
</code></pre>

Das Ergebnis muss am Ende so aussehen:<br>
<pre><code>	if (config_design == 'ice')<br>
	{ '<br>
		$twig-&gt;addGlobal('icon1', 'icons/bl/');<br>
		$twig-&gt;addGlobal('icon0', 'icons/sw/');<br>
	}<br>
	elseif (config_design == 'holo-inspired')<br>
	{<br>
		$twig-&gt;addGlobal('icon1', 'icons/bl/');<br>
		$twig-&gt;addGlobal('icon0', 'icons/sw/');<br>
	}<br>
	elseif (config_design == 'greenhornet')<br>
	{<br>
		$twig-&gt;addGlobal('icon1', 'icons/gn/');<br>
		$twig-&gt;addGlobal('icon0', 'icons/ws/');<br>
	}<br>
</code></pre>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/smartvisu_senkrecht.png' align='right' title='Abgerundete Ecken bei senkrechten Slidern'>
Wenn auf der Seite senkrechte Slider eingesetzt werden, dann haben diese noch abgerundete Ecken, daher muss die Rundung zwangsweise geändert werden und dies erledigen die folgenden Zeilen die ebenfalls am Ende von "holo-inspired.css" eingefügt werden müssen:<br>
<pre><code>a.ui-slider-handle-vertical,<br>
a.ui-slider-handle-bottomup,<br>
a.ui-slider-handle-vertical .ui-btn-inner, a.ui-slider-handle-bottomup .ui-btn-inner {<br>
	-moz-border-radius: 0 !important;<br>
	-webkit-border-radius: 0 !important;<br>
	border-radius: 0 !important;<br>
}<br>
</code></pre>
Das "!important" sorgt dafür, dass die Formatierung durch die Widgets nicht wieder überschrieben wird.<br>
<br>
<h1>Schritt 7: Minimierung</h1>
Bearbeitet wurde bisher nur die Datei „holo-inspired.css“, aufgerufen wird aber eine minimierte Version die holo-inspired.min.css, wobei es sich im wesentlichen um eine Version von holo-inspired.css handelt, jedoch um Zeilenumbrüche, Tabs und Leerzeichen reduziert.<br>
Um diese min.css zu erzeugen kann das online-Tool <a href='http://www.csscompressor.com/'>CSS Compressor</a> im Browser genutzt werden. Den Inhalt der Datei "holo-inspired.css" kopieren (Strg+C) und in das Textfeld von CSS Compressor einfügen (Strg+V). Den Button "Compress" betätigen und mit dem Button "Select All" alles auswählen und wieder kopieren (Strg+C). Anschließend die  Datei "holo-inspired.min.css" öffnen, alles darin löschen (Strg+A, dann Entf), den komprimierten Code von CSS Compressor aus der Zwischenablage einfügen (Strg+V) und speichern. Wurde auch die Datei holo-inspired.js geändert, dann muss auch diese Datei minimiert werden, z.B. mit dem <a href='http://javascriptcompressor.com/'>JavaScript Compressor</a>, das weitere Vorgehen ist analog zur CSS-Datei.<br>
<br>
<h1>Schritt 8: Fertig</h1>
Jetzt ist das neu eingebundene Design bereit zur Verwendung. Hierzu in der Konfiguration von smartVISU bei Design auf „holo-inspired“ umstellen und speichern. Das Ergebnis zeigt der folgende Screenshot.<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/themeroller/design_fertig.png' title='Das neue Design verwendet mit smartVISU'>