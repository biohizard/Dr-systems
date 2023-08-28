<?php
class Metales extends CI_Controller
{
//----->
    //---> construct
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);
        
        session_check();
    }
    //---> construct
    
    //---> index
    public function index()
    {
        $sha1                   = random_string('sha1', 16);
        $data['sha1']           = $sha1;

        $data['page_title']     = "";
        $data['sub_page_title'] = 'Compra de Metales';
        $data['css']            = 'metales';
        $data['js']             = 'metales/index/metales,metales/index/btn,metales/index/xhr';

        $data['singout']        = INDEX_PAGE . "user/logout?error=102&since=" . $_GET['since'] . "&sha1=" . $sha1;

        $data['ID']             = $_SESSION['ID'];
        $data['IDadvance']      = $_SESSION['IDadvance'];
        $data['User']           = $_SESSION['User'];
        $data['Permissions']    = $_SESSION['Permissions'];
        $data['Email']          = $_SESSION['Email'];
        $data['Firstname']      = $_SESSION['Firstname'];
        $data['Secondname']     = $_SESSION['Secondname'];
        $data['Message']        = $_SESSION['Message'];
        $data['Time']           = $_SESSION['Time'];
        //2021-02-25 23:24:03
        $data['Nowtime']        = date("Y-m-d h:m:s");

        $this->load->view('loop/header', $data);
        $this->load->view('loop/top', $data);
        $this->load->view('loop/admin-top', $data);

            //loading cierres
            $this->load->view('metales/index/2-readerCierres', $data);
            //loading nuevo cierres
            $this->load->view('metales/index/1-createCierres', $data);

        $this->load->view('loop/admin-foot', $data);
        $this->load->view('loop/footer', $data);
    }
    //---> index

    //---> index
    public function Detalles()
    {
        $sha1                   = random_string('sha1', 16);
        $data['sha1']           = $sha1;

        $data['page_title']     = "";
        $data['sub_page_title'] = 'Compra de Metales';
        $data['css']            = 'metales';
        $data['js']             = "metales/detalles/detalles,metales/detalles/btndetalles,metales/detalles/xhr,metales/detalles/tools,metales/detalles/btn/1_cierre,metales/detalles/btn/2_entregas,metales/detalles/btn/3_cierres,metales/detalles/btn/4_pagos";

        $data['singout']        = INDEX_PAGE . "user/logout?error=102&since=" . $_GET['since'] . "&sha1=" . $sha1;

        $data['ID']             = $_SESSION['ID'];
        $data['IDadvance']      = $_SESSION['IDadvance'];
        $data['User']           = $_SESSION['User'];
        $data['Permissions']    = $_SESSION['Permissions'];
        $data['Email']          = $_SESSION['Email'];
        $data['Firstname']      = $_SESSION['Firstname'];
        $data['Secondname']     = $_SESSION['Secondname'];
        $data['Message']        = $_SESSION['Message'];
        $data['Time']           = $_SESSION['Time'];

        $this->load->view('loop/header', $data);
        $this->load->view('loop/top', $data);
        $this->load->view('loop/admin-top', $data);

        //------------------------------------------------------>

        $this->load->view('metales/detalles/0-Top', $data);
        $this->load->view('metales/detalles/1-Create', $data);
        $this->load->view('metales/detalles/2-Reader', $data);

        //------------------------------------------------------>
        
        $this->load->view('loop/admin-foot', $data);
        $this->load->view('loop/footer', $data);
    }
    //---> index  
    //---> index
    public function Detalles2()
    {
        $sha1                   = random_string('sha1', 16);
        $data['sha1']           = $sha1;

        $data['page_title']     = "";
        $data['sub_page_title'] = 'Compra de Metales';
        $data['css']            = 'metales';
        /*
        $data['js']              = '
        colegiaturas/servicios/servicios,
        colegiaturas/servicios/btn,
        colegiaturas/servicios/xhr,
        colegiaturas/servicios/tools';
        */
        $data['js']             = "metales/deta2/all,metales/deta2/tools,metales/deta2/btn,metales/deta2/xhr";

        $data['singout']        = INDEX_PAGE . "user/logout?error=102&since=" . $_GET['since'] . "&sha1=" . $sha1;

        $data['ID']             = $_SESSION['ID'];
        $data['IDadvance']      = $_SESSION['IDadvance'];
        $data['User']           = $_SESSION['User'];
        $data['Permissions']    = $_SESSION['Permissions'];
        $data['Email']          = $_SESSION['Email'];
        $data['Firstname']      = $_SESSION['Firstname'];
        $data['Secondname']     = $_SESSION['Secondname'];
        $data['Message']        = $_SESSION['Message'];
        $data['Time']           = $_SESSION['Time'];

        $this->load->view('loop/header'   , $data);
        $this->load->view('loop/top'      , $data);
        $this->load->view('loop/admin-top', $data);

        //------------------------------------------------------>

        $this->load->view('metales/detalles2/0-Top'       , $data);
        $this->load->view('metales/detalles2/1-Create'    , $data);
        $this->load->view('metales/detalles2/2-Reader'    , $data);
        $this->load->view('metales/detalles2/cierreCRUD'  , $data);
        $this->load->view('metales/detalles2/entregasCRUD', $data);

        //------------------------------------------------------>

        $this->load->view('loop/admin-foot', $data);
        $this->load->view('loop/footer'    , $data);
    }
    //---> index
//----->
}