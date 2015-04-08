# What is new in release v1.9? #

The focus in this relase was to integrate Google-Calendar.

A new widgets (located in 'widgets/calendar.html') come to show the calendar-events.

You enter your events in Google-Calendar as usual. In the event-description to tags are supported, to change color and icon in the calendar-list.:

```
@icon        icons/ws/ICON.png
@color       #COLOR
```

for example:
```
@icon        icons/ws/meld_muell.png
@color       #222266
```

## calendar.list ##
for all events in a Google-Calendar. You may place this widget on your startscreen.

<img src='http://smartvisu.googlecode.com/svn/wiki/v1.9/tb_startscreen_calendar.jpg' title='widget: calendar.list on startscreen' width='600'>

<h1>Details</h1>
The calendar widgets must be configured through the config-page.<br>
<br>
<b>1.</b> First you have to copy the private-xml link from your Google-Calendar.<br>
<br>
<b>2.</b> Login into Google-Calendar and select "settings" from your calender you want to integrate.<br>
<br>
<b>3.</b> Click 'xml' on the private link:<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v1.9/google_calendar_private.jpg' title='click xml' border='2' width='600'>

<b>4.</b> Copy the link into the smartVISU config dialog: URL<br>
<br>
<img src='http://smartvisu.googlecode.com/svn/wiki/v1.9/tb_config_calendar.jpg' title='copy to URL' width='300'>

<b>5.</b> Make sure to use http: not https: (you can only use https: if php is compiled with ssl support).<br>
<br>
<b>6.</b> Place the calendar.list in any page:<br>
<pre><code>{% import "calendar.html" as calendar %}<br>
{{ calendar.list('calendarlist', 'My Calendar', 5) }}  <br>
</code></pre>
In this example next 5 events are shown.