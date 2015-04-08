# What is new in release v2.1? #

We have made many improvements. New widgets and a new demo-home comes with this shipment.


## basic.rgb ##

To select a color the 'basic.rgb'-widget is been used.

<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_rgb.jpg' title='widget: basic.rgb' width='300'>


<h2>basic.button</h2>

The basic.button now supports 3 different sizes:<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_button_list.jpg' title='widget: basic.button' width='400'>


<h2>multimedia.music</h2>

This new widget is for controlling a media-player in the network.<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_music.jpg' title='widget: multimedia.music' width='300'>


<h2>appliance.iprouter</h2>

This widget shows some stats from a enertex knxnet/ip-router.<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_iprouter.jpg' title='widget: appliance.iprouter' width='300'>


<h2>device.shutter</h2>
The shutter ist now available with a 'half'-mode and a 'full'-mode for different blade types.<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_shutter_half.jpg' title='widget: device.shutter in half-mode' width='300'>

<img src='http://smartvisu.googlecode.com/svn/wiki/v2.1/wt_shutter_full.jpg' title='widget: device.shutter in full-mode' width='300'>

In this example the value of the blade-angle is the same. In 'half'-mode the blade may turn to negativ setting.<br>
<br>
if you want to chance the background of your shutter use your 'visu.css' and add something like that:<br>
<pre><code>#widget_device_shutter-shutter2 {<br>
background-image: url('../../pics/shutter/shutter_ocean.jpg');<br>
} <br>
</code></pre>

The full documentation of all widgets can be found in the inline 'docu' project.