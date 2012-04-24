<?php
/**
 * Every8d Installer
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Harry C.W. Li <harryli@itri.org.tw> 
 * @package    Every8d
 * @module	   Every8d Installer	
 * @copyright  Industrial Technology Research Institute - http://www.itri.org.tw
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
* 
*/

class Every8d_Install 
{

	/**
	 * Constructor to load the shared database library
	 */
	public function __construct()
	{
		$this->db = Database::instance();
	}

	/**
	 * Creates the required database tables for the smssync plugin
	 */
	public function run_install()
	{	
	
		$this->db->query("
			CREATE TABLE IF NOT EXISTS " . Kohana::config('database.default.table_prefix') . "every8d_settings (
				id int(11) unsigned NOT NULL AUTO_INCREMENT,
				userid varchar(255) NOT NULL DEFAULT '',
				password varchar(255) NOT NULL DEFAULT '',
				PRIMARY KEY (id)
			);
		");
		
		$query = $this->db->query("SELECT * FROM " .  Kohana::config('database.default.table_prefix') . "every8d_settings");
		if( count($query) == 0 )
		{
			$query = $this->db->query("
				INSERT INTO " . Kohana::config('database.default.table_prefix') . "every8d_settings
				(id, userid, password) values (1, '', '');
			");
		}
	}

	/**
	 * Deletes the database tables for the actionable module
	 */
	public function uninstall()
	{
	
	}
}