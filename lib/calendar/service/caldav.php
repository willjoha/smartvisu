<?php
/**
 * -----------------------------------------------------------------------------
 * @package     smartVISU
 * @author      Johannes Willnecker
 * @copyright   2015
 * @license     GPL [http://www.gnu.de]
 * -----------------------------------------------------------------------------
 */


require_once '../../../lib/includes.php';
require_once const_path_system.'calendar/calendar.php';


/**
 * This class reads a caldav calendar
 */
class calendar_caldav extends calendar
{
	private function startElement($element)
	{
		if(strcmp($element,"VEVENT") == 0)
		{
			$this->vevent = array(
				'start' => date('y-m-d', 0).' '.gmdate('H:i:s', 0),
				'end' => date('y-m-d', 0).' '.gmdate('H:i:s', 0),
				'title' => (string)(""),
				'content' => (string)(""),
				'where' => (string)(""),
				'link' => (string)("")
			);
			$this->startts = 0;
			$this->inVEVENT = true;
		}
	}
	
	private function endElement($element)
	{
		if($element == 'VEVENT')
		{
			$this->startdatearray[] = $this->startts;
			$this->data[] = $this->vevent;
			$this->inVEVENT = false;
		}
	}
	
	private function Value($name, $value)
	{
		if($this->inVEVENT == true)
		{
			if($name == 'SUMMARY')
			{
				$this->vevent['title'] = (string)($value);
			}
			if($name == 'DESCRIPTION')
			{
				$this->vevent['content'] = (string)($value);
			}
			if($name == 'LOCATION')
			{
				$this->vevent['where'] = (string)($value);
			}
			if($name == 'DTSTART')
			{
				preg_match('/((.*)=(.*):)?(.*)/', $value, $matches);
				//TODO TZID handling
				date_default_timezone_set('Europe/Berlin');
				$ts = strtotime($matches[4]) + date("Z", strtotime($matches[4]));
				$this->startts = $ts;
				$this->vevent['start'] = date('y-m-d', $ts).' '.gmdate('H:i:s', $ts);
			}
			if($name == 'DTEND')
			{
				preg_match('/((.*)=(.*):)?(.*)/', $value, $matches);
				//TODO TZID handling
				date_default_timezone_set('Europe/Berlin');
				$ts = strtotime($matches[4]) + date("Z", strtotime($matches[4]));
				$this->vevent['end'] = date('y-m-d', $ts).' '.gmdate('H:i:s', $ts);
			}
		}
	}

	public function run()
	{
	
		$calStart = gmdate("Ymd\THis\Z");
		$calEnd = gmdate("Ymd\THis\Z", strtotime("+4 weeks"));

		$postdata = "<C:calendar-query xmlns:D=\"DAV:\" xmlns:C=\"urn:ietf:params:xml:ns:caldav\">
 <D:prop>
   <C:calendar-data>
	 <C:expand start=\"".$calStart."\"
			   end=\"".$calEnd."\"/>
   </C:calendar-data>
 </D:prop>
 <C:filter>
   <C:comp-filter name=\"VCALENDAR\">
	 <C:comp-filter name=\"VEVENT\">
	   <C:time-range start=\"".$calStart."\"
					 end=\"".$calEnd."\"/>
	 </C:comp-filter>
   </C:comp-filter>
 </C:filter>
</C:calendar-query>";

		$ctxopts = 	array('http' =>
						array(	'method' => 'REPORT',
								'header' => "Depth: 1".
											"Content-Type: application/xml\r\n",
								'content' => $postdata
						)
					);
		$context = stream_context_create($ctxopts);

		$content = file_get_contents($this->url, false, $context);

		$this->debug($content);
		
		if ($content !== false)
		{
		
			$xml = simplexml_load_string($content);
			
			$this->i = 1;
			foreach ($xml->children('d', true) as $entry)
			{
				foreach ($entry->propstat->prop->children('cal',true) as $cal)
				{
					if($cal->getName() == 'calendar-data')
					{
						$cal = str_replace (array("\r\n ", "\n ", "\r "), '', $cal);
						preg_match_all('/(.[^;|:]*)?(;|:)(.*)/', $cal, $matches, PREG_SET_ORDER);

						foreach($matches as $values)
						{
							if($values[1] == 'BEGIN')
							{
								$this->startElement(trim($values[3]));
							}
							else if($values[1] == 'END')
							{
								$this->endElement(trim($values[3]));
							}
							else
							{
								$this->Value($values[1], trim($values[3]));
							}
						}
					}
				}
			}
			
			//order events:
			array_multisort($this->startdatearray, SORT_ASC, $this->data);
			$i = 1;
			foreach($this->data as $key => $value)
			{
				$this->data[$key]['pos'] = $i++;
			}

		}
		else
			$this->error('Calendar: caldav', 'caldav: Calendar read request failed!');
	}
}


// -----------------------------------------------------------------------------
// call the service
// -----------------------------------------------------------------------------

$service = new calendar_caldav(array_merge($_GET, $_POST));
echo $service->json();

?>