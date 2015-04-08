#Getting started with your visualisation

# Introduction #

To create your own visualisation with smartVISU it is important to understand the structure of smartVISU. This is explained in the [GettingStartet#Basics](GettingStartet#Basics.md) section.


# Basics #

## The pages folder ##

This folder holds all available visualisations that come with smartVISU

```
Folder structure:
 - pages
   - _template  (templates for quick start)
   - apps       (all apps that are available)
   - base       (holds the base HTML files)
   - docu       (A docu as a visualisation)
   - gleiss     (Demo visualaisation)
```

The visualisations _docu_ and _gleiss_ can be activated in the configuration of samrtVISU.

For a quick start you can copy the _template_ folder and rename it to your visualisation name.

Every visualisation can be build by the HTML files in its folder. If a needed basic HTML file ([GettingStartet#The\_basic\_HTML\_files](GettingStartet#The_basic_HTML_files.md)) is not in the folder of you visualisation, smartVISU loads it from the _base_ folder.

## The basic HTML files ##

### index.html ###
This file represents the first site that is displayed if you access your visualisation via a browser. It is splited in two parts that devide the screen in a left and right section.

```
[...]
{% extends "base.html" %}

{% block sidebar %}

{% endblock %}

{% block content %}

{% endblock %}
```

<img src='http://smartvisu.googlecode.com/svn/wiki/v1.8/tb_startscreen.jpg' title='Startscreen with widgets' width='600'>

<h4>Sidebar</h4>
This is the left section in the <b>index.html</b> file, here you usualy can display widgets like <i>weather</i>, <i>phone</i> or <i>calendar</i>.<br>
<br>
<pre><code>INCLUDE CODE FOR WIDGETS<br>
</code></pre>

<h4>Content</h4>
This is the right section in the <b>index.html</b> file, here usualy a menu is diplayed.<br>
<br>
<pre><code>INCLUDE CODE FOR MENU<br>
</code></pre>

<h3>Menu</h3>

<h3></h3>

<h1>First visualisation</h1>