<?php
class Redirect extends CI_Controller {
//----->
    //--->
    public function __construct(){
        parent::__construct();

        $this->load->database();
        $this->default= $this->load->database('default', TRUE);
        $this->load->model('log/Querys');

        }
    //--->

    //--->
    public function index()
    {
        $sha1                   = random_string('sha1', 16);
        $since                  = "";
        $data['sha1']           = $sha1;
        $data['since']          = $since;
        $data['page_title']     = "";
        $data['sub_page_title'] = 'Redirect';
        $data['css']            = 'redirect';
        $data['js']             = 'redirect';

        session_start();

        if ($_SESSION['Permissions'] == "administrador") {
            $url = INDEX_PAGE . "dashboard/admin/?sucess=101&since=" . $since . "&sha1=" . $sha1;
           header("Location: $url");
        } else {
            $url = INDEX_PAGE . "dashboard/vendedor/?sucess=101&since=" . $since . "&sha1=" . $sha1;
            header("Location: $url");
        }

    }
    //--->
//----->
}
