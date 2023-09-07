<?php
    class User extends CI_Controller {
    //----->

        //--->
        public function __construct(){
            parent::__construct();
            $this->load->database();
            $this->default= $this->load->database('default', TRUE);
            $this->load->model('user/Querys');   
            }
        //--->

        //--->
        public function index(){
        }
        //--->

        //--->
        public function userView(){
            $xr8_data   = $this->Querys->userView();
            $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));        
        }
        //--->

    //----->
}