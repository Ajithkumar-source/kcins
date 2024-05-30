<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';
class Dashboard extends BaseController {

	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

	public function index()
	{
		$data['title'] = "KCINS-Dashboard";
		$this->loadViews('Dashboard', $data,NULL,NULL);
	}
}
