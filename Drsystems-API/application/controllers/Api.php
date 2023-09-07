<?php
class Api extends CI_Controller {
//----->

    //--->
    public function __construct(){
        parent::__construct();
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
