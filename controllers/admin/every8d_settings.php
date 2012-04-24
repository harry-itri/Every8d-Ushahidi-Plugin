<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Every8d Settings Controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author	   Harry C.W. Li <harryli@itri.org.tw> 
 * @package    Every8d
 * @module	   Every8d Settings Controller	
 * @copyright  Industrial Technology Research Institute - http://www.itri.org.tw
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
* 
*/


class Every8d_Settings_Controller extends Admin_Controller
{
	public function index()
	{
		$this->template->this_page = 'addons';
		$this->template->content = new View("admin/plugins_settings");
		$this->template->content->title = "Every8D Settings";
		$this->template->content->settings_form = new View("admin/every8d_settings");
	   
		$form = array
        (
            'userid' => '',
            'password' => '',
        );
        
        
        $errors = $form;
        $form_error = FALSE;
        $form_saved = FALSE;
        
        if ($_POST)
        {
            // Instantiate Validation, use $post, so we don't overwrite $_POST
            // fields with our own things
            $post = new Validation($_POST);

            // Add some filters
            $post->pre_filter('trim', TRUE);

            // Add some rules, the input field, followed by a list of checks, carried out in order
            $post->add_rules('userid', 'required', 'length[1,50]');
            $post->add_rules('password', 'required', 'length[1,50]');
            
            // Test to see if things passed the rule checks
            if ($post->validate())
            {
                // Yes! everything is valid
                $every8d = new Every8d_Model(1);
                
                $every8d->userid = $post->userid;
                $every8d->password = $post->password;
                $every8d->save();

                // Everything is A-Okay!
                $form_saved = TRUE;

                // repopulate the form fields
                $form = arr::overwrite($form, $post->as_array());
            }
            else
            {
                // repopulate the form fields
                $form = arr::overwrite($form, $post->as_array());

                // populate the error fields, if any
                $errors = arr::overwrite($errors, $post->errors('settings'));
                $form_error = TRUE;
            }
        }
        else
        {
            // Retrieve Current Settings
            $every8d = ORM::factory('every8d', 1);

            $form = array
            (
                'userid' => $every8d->userid,
                'password' => $every8d->password,
            );
        }
        
        $this->template->content->settings_form->form = $form;
        $this->template->content->errors = $errors;
		$this->template->content->form_error = $form_error;
		$this->template->content->form_saved = $form_saved;
	}	
}