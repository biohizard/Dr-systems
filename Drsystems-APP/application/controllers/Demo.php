<?php
class Demo extends CI_Controller {
//----->

    //--->
    public function __construct(){
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->default= $this->load->database('default', TRUE);
        $this->load->model('log/Querys');
        }
    //--->

    //--->
    public function index(){       

        $xr8_data = $this->Querys->logNew();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));

        $sha1  = random_string('sha1', 16);
        $since = "user";

        $data['sha1']           = $sha1;
        $data['page_title']     = "";
        $data['sub_page_title'] = 'Reg&iacute;strate';
        $data['css']            = 'login';
        $data['js']             = 'login';

        session_check($since,$sha1);        
        }
    //--->

    //--->
    public function create(){
        $xr8_data = $this->Querys->logNew();
        //----->json
        //$this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
    //--->

    //--->
    public function readerdata(){

        $id = $_GET["id"];
        $xr8_data = $this->Querys->sociosRead($id);
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));

        }
    //--->

    //--->
    public function update(){
        $xr8_data = $this->Querys->socios_nuevo();
        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
    //--->

    //--->
    public function delete(){
        $xr8_data = $this->Querys->socios_nuevo();
        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
    //--->

//----->
}
