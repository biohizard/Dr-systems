<?php
class Vale extends CI_Controller
{
    //----->
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);

        $this->load->model('log/Model_log');
        $this->load->model('vale/Querys');
        //$xr8_data = $this->Model_log->logNew();
    }
    public function index()
    {
        $xr8_data          = $this->Model_log->logNew();
        $xr8_data["class"] = "Saldo";
            $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    public function createdata()
    {
        $xr8_data          = $this->Querys->saldoCreate();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    public function readedata()
    {
        if ($_GET['type'] == "actual"){
            $xr8_data   = $this->Querys->valeActual();
        }else {
            $xr8_data  = array("Error"  => 101);
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    public function updatedata()
    {
        $xr8_data          = $this->Querys->saldoUpdate();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    public function deletedata()
    {
        $xr8_data          = $this->Querys->saldoDelete();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    public function utilitydata()
    {
    }
    //----->    
}