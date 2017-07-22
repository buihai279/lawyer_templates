<?php 
/**
* Class Customize Theme
*/
new Lawyer_Customize_Controls();
class Lawyer_Customize_Controls
{
	private $_theme_mods=array();
	
	function __construct()
	{
		$option=array(
				'introduce'=>true,
				'welcome'=>true,
				'practice'=>true,
				'skills'=>true,
				'approach'=>true,
				'clients'=>true,
				'band'=>true,
				'content'=>true,
				'contacts'=>true,
				'footer'=>true,
			);
		$this->_theme_mods=get_theme_mods();
		if ($option['introduce']==true) {
			$this->introduce();
		}
		if ($option['welcome']==true) {
			$this->welcome();
		}
		if ($option['practice']==true) {
			$this->practice();
		}
		if ($option['skills']==true) {
			$this->skills();
		}
		if ($option['approach']==true) {
			$this->approach();
		}
		if ($option['clients']==true) {
			$this->clients();
		}
		if ($option['band']==true) {
			$this->band();
		}
		if ($option['content']==true) {
			$this->content();
		}
		if ($option['contacts']==true) {
			$this->contacts();
		}
		if ($option['footer']==true) {
			$this->footer();
		}
	}
	public function introduce()
	{
		require_once CONTROL_DIR.'introduce_section.php';
		new Introduce($this->_theme_mods);
	}
	public function welcome()
	{
		require_once CONTROL_DIR.'welcome_section.php';
		new Welcome($this->_theme_mods);
	}
	public function practice()
	{
		require_once CONTROL_DIR.'practice_section.php';
		new Practice($this->_theme_mods);
	}
	public function skills()
	{
		require_once CONTROL_DIR.'skills_section.php';
		new Skills($this->_theme_mods);
	}
	public function approach()
	{
		require_once CONTROL_DIR.'approach_section.php';
		new Approach($this->_theme_mods);
	}
	public function clients()
	{
		require_once CONTROL_DIR.'clients_section.php';
		new Clients($this->_theme_mods);
	}
	public function band()
	{
		require_once CONTROL_DIR.'band_section.php';
		new Band($this->_theme_mods);
	}
	public function content()
	{
		require_once CONTROL_DIR.'content_section.php';
		new Content($this->_theme_mods);
	}
	public function contacts()
	{
		require_once CONTROL_DIR.'contacts_section.php';
		new Contacts($this->_theme_mods);
	}
	public function footer()
	{
		require_once CONTROL_DIR.'footer_section.php';
		new Footer($this->_theme_mods);
	}
}?>