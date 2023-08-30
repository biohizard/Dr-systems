<?php
class Login extends CI_Controller
{
    //----->

    //--->
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
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
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';

        $this->load->view('loop/header', $data);

        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function log_error()
    {
        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';

        $this->load->view('loop/header', $data);
        $this->load->view('loop/dark_light', $data);
        $this->load->view('login/log-error', $data);
        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function log_in()
    {
        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Log-in';
        $data['sub_page_title2'] = 'Check';
        $data['css']             = 'login/log_in';
        $data['js']              = 'login/log_in';
        $this->load->view('loop/header'  , $data);
        $this->load->view('loop/dark_light', $data);
        $this->load->view('login/log-in', $data);
        $this->load->view('loop/footer'  , $data);
    }
    //--->

    //--->
    public function log_out()
    {
        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Log-out';
        $data['sub_page_title2'] = 'Check';
        $data['css']             = 'log_out/log_out';
        $data['js']              = 'log_out/log_out';

        $this->load->view('loop/header', $data);
        $this->load->view('loop/dark_light', $data);
        $this->load->view('login/log-out', $data);
        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function sign_in()
    {
        //http://localhost/server/2023/Dr-systems/Drsystems-CDN/Drsystems-CDN-app/css/sign_in/sign_in.css
        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Sign-in';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'sign_in/sign_in';
        $data['js']              = 'sign_in/sign_in';
        $this->load->view('loop/header'  , $data);
        $this->load->view('loop/dark_light', $data);
        $this->load->view('login/sign-in', $data);
        $this->load->view('loop/footer'  , $data);
    }
    //--->

    //----->
}
