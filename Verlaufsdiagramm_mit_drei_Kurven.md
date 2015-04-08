# Einleitung #
Auch hier beziehe ich in dieser Anleitung auf folgende Voraussetzungen:
Verwendung des fertige Image auf einen RaspberryPI.
Ich möchte hier mal aufzeigen wie man schnell einen und plot.periode mit 3 Verlaufskurven erstellt und diesen auch etwas nach seinen Wünschen anpasst.

OK.... der Plot soll weiterhin folgendes beinhalten:
  1. Verlaufsanzeige = die letzten 12h
  1. Verläufe als Linien
  1. Farben der Verlaufskurven (L1=schwarz, L2=braub, L3=grau)
  1. Bezeichnung der einzelnen Verlauskurven (Phase L1, Phase L2, Phase L3)
  1. Bezeichnung y-Achse (Verbrauch in W)


# 1. Einbindung des Plugins #
Das benötigte SQLite-Plugin ist bereits in Smarthome.py intergriert.
Wie im Wiki "HowToStart" steht, müssen wir in den item noch bei jedem Wert der in einem Plot angezeigt werden soll noch eine weitere Zeile.
**sqlite = yes**

Das Beispiel-Item könnte dann so aussehen
```
   [Verbrauchsdaten]
      [[EeltLeistung]]
        [[[PL1]]]
            name = WirkleistungL1
            type = num
            visu = yes
            sqlite = yes
                knx_dpt = 14
                knx_listen = 5/2/2
        [[[PL2]]]
            name = WirkleistungL2
            type = num
            visu = yes
            sqlite = yes
                knx_dpt = 14
                knx_listen = 5/2/3
        [[[PL3]]]
            name = WirkleistungL3
            type = num
            visu = yes
            sqlite = yes
                knx_dpt = 14
                knx_listen = 5/2/4
```



# 2. Der html-Teil #
in der smartVISU-Docu ist schön beschrieben wie wir an unser gewünschte Ziel kommen.
  1. laut docu _tmin - the minimum time (x-axis): '1h', '2h'... (duration-format)_ --> also brauchen wir ein **'12h'**
  1. laut docu _exposure - type/s for each serie: 'line', 'stair', 'spline', 'area', 'areaspline', 'column' (optional, default 'line')_ --> also brauchen wir **''** Ich gebe da aber trotzdem gern den Code vor und deshlab ein **['line', 'line', 'line']**
  1. laut docu _color - color/s for each serie e. g. '#f00' for red (optional, default: sutiable for design)_ --> also brauchen wir **['#000', '#a60', '#aaa']**
  1. laut docu _label - label/s for each serie (optional)_ --> also brauchen wir ein **['Phase L1', 'Phase L2', 'Phase L3']**
  1. laut docu _axes - title/s for the x-axis and y-axis_ --> also brauchen wir ein **['', 'Verbrauch in W']**

die gesamte Codezeile sieht dann so aus:
```
{{ plot.period('p2', ['Verbrauchsdaten.EeltLeistung.PL1', 'Verbrauchsdaten.EeltLeistung.PL2', 'Verbrauchsdaten.EeltLeistung.PL3'], 'avg', '12h', 0, 0, '', '', ['Phase L1', 'Phase L2', 'Phase L3'], ['#000', '#a60', '#aaa'], ['line', 'line', 'line'], ['', 'Verbrauch in W']) }}

```

Je nachdem ob wir uns das Diagramm nun in einem 'Block' anzeigen lassen wollen oder nicht, kann der in die html einzubringende Code wie folgt aussehen.

**ohne Block** (Screen vom iPad)

<img src='http://smartvisu.googlecode.com/svn/wiki/pics/wt_plot_example1.jpg' title='plot.periode ohne Block'>
<pre><code>&lt;h3&gt;Leistung L1 - L3&lt;/h3&gt;		<br>
   {{ plot.period('p2', ['Verbrauchsdaten.EeltLeistung.PL1', 'Verbrauchsdaten.EeltLeistung.PL2', 'Verbrauchsdaten.EeltLeistung.PL3'], 'avg', '12h', 0, 0, '', '', ['Phase L1', 'Phase L2', 'Phase L3'], ['#000', '#a60', '#aaa'], ['line', 'line', 'line'], ['', 'Verbrauch in W']) }}<br>
</code></pre>

---<br>
<br>
<br>
<b>in einem Block</b> (Screen vom iPad)<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/pics/wt_plot_example2.jpg' title='plot.periode im Block'>
<pre><code>&lt;div class="block"&gt;<br>
&lt;div class="set-2" data-role="collapsible-set" data-theme="c" data-content-theme="a" data-mini="true"&gt;<br>
    <br>
   &lt;div data-role="collapsible" data-collapsed="false" &gt;<br>
	 &lt;h3&gt;Leistung L1 - L3&lt;/h3&gt;<br>
		{{ plot.period('p2', ['Verbrauchsdaten.EeltLeistung.PL1', 'Verbrauchsdaten.EeltLeistung.PL2', 'Verbrauchsdaten.EeltLeistung.PL3'], 'avg', '12h', 0, 0, '', '', ['Phase L1', 'Phase L2', 'Phase L3'], ['#000', '#a60', '#aaa'], ['line', 'line', 'line'], ['', 'Verbrauch in W']) }}  <br>
	&lt;/div&gt;<br>
<br>
    &lt;/div&gt;<br>
    &lt;/div&gt; <br>
</code></pre>

<h1>3. Schlußbemerkung</h1>
Die Farbvorgaben der Verläufe sind Standart-html (z. b. <a href='http://html-color-codes.info/webfarben_hexcodes/'>http://html-color-codes.info/webfarben_hexcodes/</a>). <i>Man kann z. b. statt: #e0e0e0 nur #eee schreiben</i>

Wie auch bereits im Wiki "HowToStart" angemerkt müßt ihr Smarthome.py nach Änderung der Items, conf oder html noch neu starten.<br>
<br>
Ebenfalls ist zu beachten das die Daten erst angezeigt werden, sobald alle 3 Daten einmal gesendet wurden. Also erst wenn alle 3 GA's einmal einen Wert gesendet haben ist etwas zu sehen.