<?php
class User extends CI_Controller
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
        $sha1                    = random_string('sha1',16);
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
        $sha1                    = random_string('sha1',16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';

        $this->load->view('loop/header', $data);
            $this->load->view('login/log-error', $data);
        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function log_in()
    {
        $sha1                    = random_string('sha1',16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';

        $this->load->view('loop/header', $data);
        $this->load->view('login/log-in', $data);
        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function log_out()
    {
        $sha1                    = random_string('sha1',16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';

        $this->load->view('loop/header', $data);
            $this->load->view('login/log-out', $data);
        $this->load->view('loop/footer', $data);
    }
    //--->

    //--->
    public function sign_in()
    {
        $sha1                    = random_string('sha1',16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';
        

        $this->load->view('loop/header', $data);
            $this->load->view('login/sign-in', $data);
        $this->load->view('loop/footer', $data);

        

    }
    //--->

//----->
}