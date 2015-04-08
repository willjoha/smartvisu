<?php
/**
 * -----------------------------------------------------------------------------
 * @package     smartVISU
 * @author      Martin Gleiß
 * @copyright   2012 - 2015
 * @license     GPL [http://www.gnu.de]
 * -----------------------------------------------------------------------------
 */


require_once const_path_system.'service.php';
require_once const_path_system.'contact/contact.php';


/**
 * This class is the base class of all phone systems
 */
class phone extends service
{

	/**
	 * initialization of some parameters
	 */
	public function init($request)
	{
		$this->debug = ($request['debug'] == 1);

		$this->server = config_phone_server;
		$this->port = config_phone_port;
		$this->user = config_phone_user;
		$this->pass = config_phone_pass;
		
		$contact_class = 'contact_'.config_contact_service;
		$this->contacts = new $contact_class($request);
	}

	/**
	 * prepare the data
	 */
	public function prepare()
	{
		foreach ($this->data as $id => $ds)
		{
			if ($ds['number'] != '' or $ds['name'] != '')
			{
				// date
				$ds['date'] = transdate('short', strtotime($ds['date']));
				
				// lookup contact
				$this->contacts->getContact($ds['number'], $ds['name'], $ds['type'], $ds['pic']);

				$ds['text'] = $ds['name'];

				// no name? caller unknown
				if ($ds['name'] == '')
					$ds['text'] = trans('phone', 'unknown');

				// combine the infos, if type is present
				if ($ds['type'] != '')
					$ds['text'] = $ds['name'].' ('.$ds['type'].')';

				// dir == 0 missed
				$ds['dirpic'] = 'dir.png';
				$ds['diralt'] = trans('phone', 'missed');

				// dir > 0 incomming
				if ($ds['dir'] > 0)
				{
					$ds['dirpic'] = 'dir_incoming.png';
					$ds['diralt'] = trans('phone', 'incoming');
				}

				// dir < 0 outgoing
				if ($ds['dir'] < 0)
				{
					$ds['dirpic'] = 'dir_outgoing.png';
					$ds['diralt'] = trans('phone', 'outgoing');
				}

				$ret[] = $ds;
			}
		}
		$this->data = $ret;
	}

}

?>
