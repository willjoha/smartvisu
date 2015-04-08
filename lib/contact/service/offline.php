<?php
/**
 * -----------------------------------------------------------------------------
 * @package     smartVISU
 * @author      Johannes Willnecker
 * @copyright   2015
 * @license     GPL [http://www.gnu.de]
 * -----------------------------------------------------------------------------
 */


class contact_offline extends contact
{
	public function init($request)
	{
		parent::init($request);
		
		if (($handle = fopen(const_path_system.'contact/data/offline.csv', "r")) !== false) {
			while (($data = fgetcsv($handle, 1000, ",")) !== false) {
				$this->contacts[$data[0]] = array('name' => $data[1], 'type' => $data[2]);
			}
			fclose($handle);
		}
	}
	
	public function getContact($number, &$fullname, &$type, &$photo)
	{
		parent::getContact($number, $fullname, $type, $photo);
		if (array_key_exists($number, $this->contacts))
		{
			$fullname = $this->contacts[$number]['name'];
			$type = $this->contacts[$number]['type'];
		}
		return true;
	}
}
?>