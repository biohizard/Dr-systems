<?php
class Clientes extends CI_Controller
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
        $this->load->model('clientes/Querys');
        $xr8_data = $this->Model_log->logNew();
    }
    //--->

    //--->
    public function index()
    {
        $xr8_data = $this->Model_log->logNew();
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

        //$xr8_data                        = $this->Model_log->logNew();
        //$id_advance                      = 'CLjFxfEC16HE9AZ948Ws';    
        //a181a603769c1f98ad927e7367c7aa51 = all    
        //b326b5062b2f0e69046810717534cb09 = true
        //68934a3e9455fa72420237eb05902327 = false
        /*
            id_advance                      = ec66331706175538efd5
            a18a603769c1f98ad927e7367c7aa51 = b326b5062b2f0e69046810717534cb09
        */
        
        if(empty($_GET['id_advance']) && $_GET['a181a603769c1f98ad927e7367c7aa51'] == 'b326b5062b2f0e69046810717534cb09'){

            /*
            all
            id_advance                       =
            a181a603769c1f98ad927e7367c7aa51 = b326b5062b2f0e69046810717534cb09
            */
            $xr8_data   = array('all' => "all");
            $id_advance = null;
            $all        = true;
            $xr8_data   = $this->Querys->clientesRead($id_advance, $all);


        }else if(!empty($_GET['id_advance']) && $_GET['a181a603769c1f98ad927e7367c7aa51'] == '68934a3e9455fa72420237eb05902327'){
            
            /*
                localhost/server/DevOps/GoldenTradeValue/GoldenTradeValue-API/index.php/clientes/readerdata?
                id_advance=&
                zr8h0iji96crde4&a181a603769c1f98ad927e7367c7aa51=68934a3e9455fa72420237eb05902327            
            one
            
            */

            $id_advance = $_GET['id_advance'];
            $all        = false;
            $xr8_data   = $this->Querys->clientesRead($id_advance, $all);

        }else{ $xr8_data  = array("Error"  => 101); }

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
