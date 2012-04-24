<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Every8d Post Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Harry C.W. Li <harryli@itri.org.tw> 
 * @package    Every8d
 * @module	   Every8d Post Controller	
 * @copyright  Industrial Technology Research Institute - http://www.itri.org.tw
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
* 
*/

class Every8d_Controller extends Template_Controller
{
	public $template = '';
	
	public function index()
	{
		url::redirect('reports');
	}
}
