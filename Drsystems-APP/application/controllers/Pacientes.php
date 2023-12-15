<?php
class Pacientes extends CI_Controller
{
    //----->

    //--->
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);
        $this->load->model('log/Querys');
        $this->Querys->logNew();
    }
    //--->

    //--->
    public function index()
    {
        $sha1                    = random_string('sha1', 16);
        $since                   = "Dashboard";
        session_check($since, $sha1);

        $data['sha1']            = $sha1;
        $data['page_title']      = "Pacientes";
        $data['sub_page_title']  = 'Inicio';
        $data['sub_page_title2'] = '';
        $data['css']             = 'pacientes/pacientes';
        $data['js']              = 'pacientes/pacientes';
        $data['session']         = $_SESSION;

        $data['url']             = INDEX_PAGE . "?error=102&since=login&sha1=" . $sha1;

        $this->load->view('loop/header', $data);
        $this->load->view('loop/body/dashboard', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/beginmenu', $data);
        //----->
        $this->load->view('pacientes/pacientes/inicio', $data);
        $this->load->view('pacientes/pacientes/inicio2', $data);
        //----->
        $this->load->view('dashboard/endmenu', $data);
        $this->load->view('pacientes/pacientes/inicio3', $data);
        $this->load->view('loop/footer/dark_light', $data);
        $this->load->view('loop/footer/copyright', $data);
        $this->load->view('loop/footer/footer', $data);
    }
    //--->

    //--->
    public function consultas()
    {
        $sha1                    = random_string('sha1', 16);
        $since                   = "Dashboard";
        session_check($since, $sha1);

        $data['sha1']            = $sha1;
        $data['page_title']      = "Pacientes";
        $data['sub_page_title']  = 'Inicio';
        $data['sub_page_title2'] = '';
        $data['css']             = 'pacientes/pacientes';
        $data['js']              = 'pacientes/pacientes';
        $data['session']         = $_SESSION;

        $data['url']             = INDEX_PAGE . "?error=102&since=login&sha1=" . $sha1;

        $this->load->view('loop/header', $data);
        $this->load->view('loop/body/dashboard', $data);
        $this->load->view('dashboard/header', $data);
        $this->load->view('dashboard/beginmenu', $data);
        //----->
        $this->load->view('pacientes/consultas/inicio', $data);
        $this->load->view('pacientes/consultas/inicio2', $data);
        //----->
        $this->load->view('dashboard/endmenu', $data);

        $this->load->view('loop/footer/dark_light', $data);
        $this->load->view('loop/footer/copyright', $data);
        $this->load->view('loop/footer/footer', $data);
    }
    //--->

    //----->
}
