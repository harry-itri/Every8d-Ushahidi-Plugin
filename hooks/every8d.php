<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Every8d Hook
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Harry C.W. Li <harryli@itri.org.tw> 
 * @package    Every8d
 * @module	   Every8d Hook Controller	
 * @copyright  Industrial Technology Research Institute - http://www.itri.org.tw
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
* 
*/

class every8d {
	
	/**
	 * Registers the main event add method
	 */
	public function __construct()
	{	
		// Hook into routing
		Event::add('system.pre_controller', array($this, 'add'));
	}
	
	/**
	 * Adds all the events to the main Ushahidi application
	 */
	public function add()
	{
		// SMS Provider
		plugin::add_sms_provider("every8d");
	}
}

new every8d;