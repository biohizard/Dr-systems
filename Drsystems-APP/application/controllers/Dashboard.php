<?php
class Dashboard extends CI_Controller
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
        session_check($since,$sha1);

        $data['sha1']            = $sha1;
        $data['page_title']      = "Dashboard";
        $data['sub_page_title']  = 'Inicio';
        $data['sub_page_title2'] = '';
        $data['css']             = 'dashboard/dash_1';
        $data['js']              = 'dashboard/dash_1';
        $data['session']         = $_SESSION;
        
        $data['url']             = INDEX_PAGE . "?error=102&since=login&sha1=" . $sha1;

        $this->load->view('loop/header'    , $data);
        $this->load->view('loop/dark_light', $data);

        $this->load->view('loop/footer'    , $data);
    }
    //--->

//----->
}
