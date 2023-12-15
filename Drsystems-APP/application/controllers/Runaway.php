<?php
class Runaway extends CI_Controller
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
        session_start();
        session_destroy();

        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Sign-in';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'sign_in/sign_in';
        $data['js']              = 'sign_in/sign_in';

        $data['url']             = INDEX_PAGE . "?ok=101&since=login&sha1=" . $sha1;
        //-------------------------------------------------->
        //<head>
            $this->load->view('loop/header'              , $data);
        //Begin: <body>
            $this->load->view('loop/body/login'          , $data);



            $this->load->view('loop/footer/copyright'    , $data);
            $this->load->view('loop/footer/dark_light'   , $data);
            $this->load->view('loop/footer/footer'       , $data);
        //End: </body>
        //-------------------------------------------------->
    }
    //--->

    //--->
    public function email_send()
    {
        session_start();
        session_destroy();

        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Sign-in';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'sign_in/sign_in';
        $data['js']              = 'sign_in/sign_in';

        $data['url']             = INDEX_PAGE . "?ok=101&since=login&sha1=" . $sha1;

        //-------------------------------------------------->
        $this->load->library('email');

        $config = array();
        $config['protocol']  = 'smtp';
        $config['smtp_host'] = 'mail.lonex.com';
        $config['smtp_user'] = 'jorge@luxza.com';
        $config['smtp_pass'] = 'Ip21hAp8X$';
        $config['smtp_port'] = 2525;

        $config['Mailer']    = "XR8 Tech";
        
        $this->email->initialize($config);

        $this->email->from('jorge@luxza.com', 'Jorge Rodriguez');
        $this->email->to('biohizard@gmail.com');
        //$this->email->cc('another@another-example.com');
        //$this->email->bcc('them@their-example.com');
        
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');
        
        $this->email->send();
        //-------------------------------------------------->        

        //-------------------------------------------------->
        //<head>
            $this->load->view('loop/header'              , $data);
        //Begin: <body>
            $this->load->view('loop/body/login'          , $data);



            $this->load->view('loop/footer/copyright'    , $data);
            $this->load->view('loop/footer/dark_light'   , $data);
            $this->load->view('loop/footer/footer'       , $data);
        //End: </body>
        //-------------------------------------------------->
    }
    //--->    
//----->
}
