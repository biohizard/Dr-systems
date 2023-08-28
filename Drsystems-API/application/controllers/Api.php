<?php
class Api extends CI_Controller {
//----->

    //--->
    public function __construct(){
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->default= $this->load->database('default', TRUE);

            $this->load->model('log/Model_log');
        }
    //--->

    //--->
    public function index(){
      $xr8_data['Api Connection'] = random_string('alpha', 20);
      $xr8_data['Api Time']       = date("Y-m-d H:i:s.u");
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
    //--->

//----->
}
