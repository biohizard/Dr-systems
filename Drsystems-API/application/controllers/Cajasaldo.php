<?php
class Cajasaldo extends CI_Controller
{

    //--->
    public function __construct()
    {
        parent::__construct();

        // Your own constructor code
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);

        $this->load->model('log/Model_log');
        $this->load->model('cajasaldo/Querys');

        $xr8_data = $this->Model_log->logNew();
    }
    //--->

    //--->
    public function index()
    {

        $info = array(
            "Author " => "Labs26",
            "Api    " => "GoldenTradeValue",
            "Version" => "1.1.0",
            "Type   " => "CRUD",
            "Name   " => "CAJA SALDO",
            "Url    " => "http://",
            "Segment" => "/cajasaldo/"

        );
        $createOptions = array(
            "options_1" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=",
            "options_2" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=2020-01",
            "options_3" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=2020-06",
            "options_4" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=2020-01&uGk0ahH53zvvk2aq1Kbr=",
            "options_5" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=2020-01&uGk0ahH53zvvk2aq1Kbr=inicial",
            "options_6" => "cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=2020-01&uGk0ahH53zvvk2aq1Kbr=final"
        );
        $create = array(
            "name" => "Create",
            "type" => "POST",
            "options" =>  $createOptions
        );
        $read = array(
            "name" => "Read",
            "type" => "GET"
        );
        $update = array(
            "name" => "Update",
            "type" => "POST"
        );
        $delete = array(
            "name" => "Delete",
            "type" => "POST"
        );

        $api  = array($info);
        $crud = array($create, $read, $update, $delete);

        $xr8_data['API']  = $api;
        $xr8_data['CRUD'] = $crud;

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function createdata()
    {
        /*
        fecha:2020-06-01
        origen_id:CLjFxfEC16HE9AZ948Ws
        saldo:777971↵
        entrada:0↵
        salida:0
        nocompra:0
        concepto:Saldo inicia del mes↵
        totalbilletes:0
        notas:0
        */
        
        if (
            is_null($_POST['fecha'])             or
            is_null($_POST['origen_id_advance']) or
            is_null($_POST['saldo'])             or
            is_null($_POST['entrada'])           or
            is_null($_POST['salida'])            or
            is_null($_POST['nocompra'])          or
            is_null($_POST['concepto'])          or
            is_null($_POST['totalbilletes'])     or
            is_null($_POST['notas'])
        ) {
            $xr8_data   = "Error: 1001";
        } else {
            $xr8_data   = $this->Querys->cajaSaldocreate();
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
     
    }
    //--->

    //--->
    public function readerdata()
    {
        //$xr8_data                        = $this->Model_log->logNew();
        //$fecha                           = 'CLjFxfEC16HE9AZ948Ws';    

        //aMiEgqwaxoVhBqo8yJze = fecha    

        //uGk0ahH53zvvk2aq1Kbr = tipo
        //8oKU5EuntaiY8GSaVEZi = inicial
        //8IIgxBy4fA9ubUuXq2Fr= final
        /*
            id_advance                      = ec66331706175538efd5
            a18a603769c1f98ad927e7367c7aa51 = b326b5062b2f0e69046810717534cb09
        */

        if (!empty($_GET)) {

            if (empty($_GET['aMiEgqwaxoVhBqo8yJze'])) {

                //cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=
                //$xr8_data = array("Ok"  => 101, "tipo" => "date now & inicial");
                $tipo = 1;
                $xr8_data = $this->Querys->cajaSaldoread($tipo);

            } elseif (isset($_GET['aMiEgqwaxoVhBqo8yJze'])) {

                //cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=1

                if (isset($_GET['aMiEgqwaxoVhBqo8yJze']) and empty($_GET['uGk0ahH53zvvk2aq1Kbr'])) {

                    //cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=1&uGk0ahH53zvvk2aq1Kbr=
                    //$xr8_data  = array("Ok"  => 102, "tipo" => "a date specific & inicial");
                    $tipo = 2;
                    $xr8_data = $this->Querys->cajaSaldoread($tipo);

                } else if (isset($_GET['aMiEgqwaxoVhBqo8yJze']) and isset($_GET['uGk0ahH53zvvk2aq1Kbr'])) {

                    //cajasaldo/readerdata?aMiEgqwaxoVhBqo8yJze=1&uGk0ahH53zvvk2aq1Kbr=2
                    //$xr8_data  = array("Ok"  => 103, "tipo" => "a date specific & inicial 0 final");
                    $tipo = 3;
                    $xr8_data = $this->Querys->cajaSaldoread($tipo);

                } else {
                    //
                    $xr8_data  = array("Error"  => 103);
                }

            } else {
                //
                $xr8_data  = array("Error"  => 102);
            }
        } else {
            //SI NO EXISTEN LOS $_GET
            $xr8_data  = array("Error"  => 101);
        }

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

    //--->
    public function utilitydata()
    {

        if (!empty($_GET['type'])) {

            if ($_GET['type'] == 'total') {
                $xr8_data = $this->Querys->utilityTotal();
            } else if ($_GET['type'] == 'buscar') {
                $xr8_data = $this->Querys->utilityBuscar();
            } else {
                $xr8_data  = array("Error"  => 103);
            }
        } else {

            $xr8_data  = array("Error"  => 102);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->    

    //----->
}
