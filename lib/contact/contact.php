<?php

/**
 * -----------------------------------------------------------------------------
 * @package     smartVISU
 * @author      Johannes Willnecker
 * @copyright   2015
 * @license     GPL [http://www.gnu.de]
 * -----------------------------------------------------------------------------
 */


spl_autoload_register(function ($class) {
	list($contact, $class) = explode("_", $class, 2);
	if($contact == 'contact')
	{
		include const_path_system.'contact/service/'.$class.'.php';
	}
});


/**
 * This class is the base class of all contact services
 */
class contact
{
	var $debug = false;

	public function __construct($request)
	{
		$this->init($request);
	}
	/**
	 * initialization of some parameters
	 */
	public function init($request)
	{
		$this->debug = ($request['debug'] == 1);

		$this->contact_url = config_contact_url;
	}

	/**
	 * get the contact
	 */
	public function getContact($number, &$fullname, &$type, &$photo)
	{
		// is there a picture to the caller?
		if ($number != '' and is_file(const_path.'pics/phone/'.$number.'.jpg'))
			$photo = $number.'.jpg';
		elseif ($number != '' and is_file(const_path.'pics/phone/'.$number.'.png'))
			$photo = $number.'.png';
		else
			$photo = '0.jpg';

		return true;
	}

}

?>