<?php

/**
 * The welcome hello view model.
 *
 * @package  app
 * @extends  ViewModel
 */
class View_Home_Page extends ViewModel
{
	/**
	 * Prepare the view data, keeping this in here helps clean up
	 * the controller.
	 * 
	 * @return void
	 */
	public function view()
	{
		$this->name = $this->request()->param('name', 'World');
	}
}
