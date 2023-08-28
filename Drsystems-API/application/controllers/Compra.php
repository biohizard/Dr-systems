<?php
class Compra extends CI_Controller
{
    //----->

    //--->
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);

        $this->load->model('log/Model_log');
        $this->load->model('compra/Querys');
        $xr8_data = $this->Model_log->logNew();
    }
    //--->

    //--->
    public function index()
    {
        $xr8_data['index'] = array(array("Page"=>"Compra"));
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function createdata()
    {
        /*
        Array
        (
            [fecha1] => 2020-06-01
            [rfc1] => 1
            [pais1] => 2
            [giro1] => 3
            [first] => 4
            [second] => 5
            [email] => 6
            [tel] => 7
            [rfc] => 8
            [curp] => 9
            [direccion] => 0
        )
        */
        if (
            is_null($_POST['fecha1'])   or
            is_null($_POST['rfc1'])     or
            is_null($_POST['pais1'])    or
            is_null($_POST['giro1'])    or
            is_null($_POST['first'])    or
            is_null($_POST['second'])   or
            is_null($_POST['email'])    or
            is_null($_POST['tel'])      or
            is_null($_POST['rfc'])      or
            is_null($_POST['curp'])     or
            is_null($_POST['direccion'])
        ) {
            $xr8_data   = "Error: 1001";
        } else {
            $xr8_data   = $this->Querys->clientesCreate();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function readerdata()
    {
        $xr8_data   = $this->Querys->compraRead();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function updatedata()
    {
        
        //print_r($_POST);

        $id_advance = $_POST['id_advance'];
        $xr8_data = $this->Querys->clientesUpdate($id_advance);

        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        
    }
    //--->

    //--->
    public function deletedata()
    {
        $xr8_data = $this->Querys->clientesDelete();
        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //----->
}
