<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
  $this->load->helper(array(
            'form',
            'url'
        ));
  $this->load->library('session');
//$this->load->database();
      
    }

    public function index() {
phpinfo();
        echo 'Hello World!';
	$this->load->view('login');
    }

    public function blog() {
//        $this->load->model('Customermodel');
//        $data['query'] = $this->customer->get_last_ten_entries();
//        $this->load->view('blog', $data);
    }
}
