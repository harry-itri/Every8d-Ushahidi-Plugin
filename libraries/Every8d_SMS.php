<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Every8d SMS sender
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Harry C.W. Li <harryli@itri.org.tw> 
 * @package    Every8d
 * @module	   Every8d SMS sender	
 * @copyright  Industrial Technology Research Institute - http://www.itri.org.tw
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
* 
*/

class Every8d_SMS {
	/**
	 * Sends a text message (SMS) using the Every8d API
	 *
	 * @param string $to
	 * @param string $from
	 * @param string $to
	 */
	public function send($to = NULL, $from = NULL, $message = NULL)
	{
		// Get Current Every8d Settings
		$every8d = ORM::factory("every8d", 1)->find();
		
		if ($every8d->loaded)
		{
			require('SMSHttp.php');
			$sms = new SMSHttp();
			$userID = $every8d->userid;
			$password = $every8d->password;
			$subject = "OpenGeoSMS";
			$content = urlencode($message);
			$mobile = $to;
			$sendTime= "";
		
			if($sms->sendSMS($userID,$password,$subject,$content,$mobile,$sendTime))
			{
				return TRUE;
			}
			else
			{
				return "SMS transmit failed.";
			}
		}
		
		return "SMS service is not set up!";
	}
}


