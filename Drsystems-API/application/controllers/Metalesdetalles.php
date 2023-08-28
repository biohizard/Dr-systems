<?php
class Metalesdetalles extends CI_Controller
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
        $this->load->model('metalesdetalles/Querys');
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
    /*
        createdata()
            $this->Querys->idOperacion();
            $this->Querys->cajaCreate();
    */
    public function createdata()
    {
        /*
        save tabs cierres ?type=generarcierre
        save tabs pagos   ?type=saveTabsPago
        */
        if ($_GET['type'] == "generarcierre"){
            $xr8_data   = $this->Querys->metalesCreate();
        }else if ($_GET['type'] == "saveTabsPago"){
            $xr8_data   = $this->Querys->pagosCreate();
        }else if ($_GET['type'] == "generarsaldo"){
            $xr8_data   = $this->Querys->saldoCreate();
        }else if ($_GET['type'] == "generarcierreunico"){
            $xr8_data   = $this->Querys->metalesCreateUnico();
        }else if ($_GET['type'] == "generarmultipleentrada"){
            $xr8_data   = $this->Querys->metalesCreateMultiple();
        }else if ($_GET['type'] == "cierreSimple"){
            $xr8_data   = $this->Querys->cierreSimpleCreate();
        }else {
            $xr8_data  = array("Error"  => 101);
        }
                
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    /*
    /metales/readerdata?type=cierres
    date=2020-07
    metalesdetalles/readerdata/?type=entregas&id=C-zr8h0iji96crde4
    */
    public function readerdata()
    {
        if ($_GET['type'] == "cierres"){
            $xr8_data   = $this->Querys->metalesdetallesRead();
        }else if ($_GET['type'] == "entregas"){
            $xr8_data   = $this->Querys->metalesReadEntregas();
        }else if ($_GET['type'] == "cierresdos"){
            $xr8_data   = $this->Querys->metalesReadCierres();
        }else if ($_GET['type'] == "pagos"){
            $xr8_data   = $this->Querys->metalesReadPagos();
        }else if ($_GET['type'] == "one"){
            $xr8_data   = $this->Querys->metalesReadOne();
        }else if ($_GET['type'] == "saldo"){
            $xr8_data   = $this->Querys->metaleSaldoBase();
        }else if ($_GET['type'] == "saldoactual"){
            $xr8_data   = $this->Querys->metaleSaldoActual();
        }else {
            $xr8_data  = array("Error"  => 101);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function updatedata()
    {
        $xr8_data = $this->Querys->cajaUpdate();

        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function deletedata()
    {
        $xr8_data = $this->Querys->cajaDelete();
        //----->json
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //--->
    public function utilitydata()
    {

        if (!empty($_GET['type'])) {

            if($_GET['type'] == 'total') {

                $xr8_data = $this->Querys->utilityTotal();

            }else if ($_GET['type'] == 'buscar') {
                //-----> Begin: Buscar
                
                //--->
                /*
                A) Model buscar user si existe alguna coicidencia imprime un json
                B)si no existe ninguna coicidencia ejecuta Model buscar clientes
                C) Model buscar clientes si existe alguna coicidencia imprime un json
                D) si no existe ninguna coicidencia Model buscar proveedor
                E)si no existe ninguna coicidencia ejecuta Model buscar clientes
                f) si no existe ninguna coicidencia IMPRIME error 104

                */
                $dataUser = $this->Querys->utilityBuscarUser();
                
                    if(!array_key_exists("Error",$dataUser[0])){
                        
                        //A)
                        $this->output->set_content_type('application/json')->set_output(json_encode($dataUser));

                    }else if(array_key_exists("Error",$dataUser[0]) && $dataUser[0]['Error'] == 101){
                        
                        //B)
                        $dataClientes = $this->Querys->utilityBuscarClientes();

                        if(!array_key_exists("Error",$dataClientes[0])){

                            //C)
                            $this->output->set_content_type('application/json')->set_output(json_encode($dataClientes));

                        }else if(array_key_exists("Error",$dataClientes[0]) && $dataClientes[0]['Error'] == 101){
                            
                            //D)
                            $dataProveedor = $this->Querys->utilityBuscarProveedor();

                            if(!array_key_exists("Error",$dataProveedor[0])){
                                
                                //E)
                                $this->output->set_content_type('application/json')->set_output(json_encode($dataProveedor));

                            }else if(array_key_exists("Error",$dataProveedor[0]) && $dataProveedor[0]['Error'] == 101){
                                
                                //F)
                                $dataError = array("Error" => 104,"Buscador" =>"Error");
                                $this->output->set_content_type('application/json')->set_output(json_encode($dataError));

                            }

                        }

                    }
                
                //--->



                //-----> End: Buscar
            }else if ($_GET['type'] == 'ultimafecha') {

                $xr8_data = $this->Querys->utilityUltimafecha();
                $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));

            }else if ($_GET['type'] == 'cancelados') {
                //-------------------->
                if (empty($_GET['id_advance'])){
                    $date = date("Y-m");
                }else{
                    $date = $_GET['id_advance'];
                }
        
                if (empty($_GET['id_advance']) && $_GET['a181a603769c1f98ad927e7367c7aa51'] == 'b326b5062b2f0e69046810717534cb09') {
        
                    /*
                    all
                    id_advance                       =
                    a181a603769c1f98ad927e7367c7aa51 = b326b5062b2f0e69046810717534cb09
                    */
                    $id_advance = null;
                    $all        = true;
                    $xr8_data   = $this->Querys->utilityCancelados($id_advance, $all, $date);
                } else if (!empty($_GET['id_advance']) && $_GET['a181a603769c1f98ad927e7367c7aa51'] == '68934a3e9455fa72420237eb05902327') {
        
                    /*
                    one
                    id_advance                       = ec66331706175538efd5
                    a181a603769c1f98ad927e7367c7aa51 = 68934a3e9455fa72420237eb05902327
                    */
        
                    $id_advance = $_GET['id_advance'];
                    $all        = false;
                    $xr8_data   = $this->Querys->utilityCancelados($id_advance, $all, $date);
                } else {
                    $xr8_data  = array("Error"  => 101);
                }
        
        
                $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
                //-------------------->
            }else{

                $xr8_data  = array("Error"  => 103);
                $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
                
            }

        } else {
            $xr8_data  = array("Error"  => 102);
            $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }

        
    }
    //--->    

    //----->
}