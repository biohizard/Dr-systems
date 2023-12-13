<?php
class Login extends CI_Controller
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
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'user';
        $data['js']              = 'user';
        $this->load->view('loop/header', $data);
        
        $this->load->view('loop/footer/dark_light'    , $data);
        $this->load->view('loop/footer/copyright'    , $data);
        $this->load->view('loop/footer/footer'        , $data);
    }
    //--->

    //--->
    public function sign_in()
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

                $this->load->view('login/sign-in', $data);

            $this->load->view('loop/footer/copyright'    , $data);
            $this->load->view('loop/footer/dark_light'   , $data);
            $this->load->view('loop/footer/footer'       , $data);
        //End: </body>
        //-------------------------------------------------->
    }
    //--->

    //--->
    public function log_in()
    {
        session_start();
        session_destroy();

        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Log-in';
        $data['sub_page_title2'] = 'Check';
        $data['css']             = 'log_in/log_in';
        $data['js']              = 'log_in/log_in';

        //---------------------------------------------------------------->

        //----------> 1
        $LSf47vWou0wNVEsEuT1i = $this->input->post('LSf47vWou0wNVEsEuT1i');
        $PHt0gjv8TbmLTQCWVB81 = $this->input->post('PHt0gjv8TbmLTQCWVB81');

        if(is_null($this->input->post('Mbv2GRxrFw8vMe1P5Pgo')))
        {
            $rememberme = True;
        } else {
            $rememberme = False;
        }
        //----------> 1

        //----------> 2
        /*Begin: Models */
        $data_user = $this->Querys->checkDatauser($LSf47vWou0wNVEsEuT1i,$PHt0gjv8TbmLTQCWVB81);
        /*End:   Models */
        $data['data_user'] = $data_user;
        //$data['data_user'] = $data['data_user'][0]->user;
        //----------> 2

        //----------> 3
        if(isset($data_user)){
            /*
            user admin
            pass 12345
            user admin
            pass 00000
            no impor si esta mal el pass
            https://phppasswordhash.com/
            */
            //----------> 3.1
            if (
                $data['data_user'][0]->user == $LSf47vWou0wNVEsEuT1i and//
                password_verify($PHt0gjv8TbmLTQCWVB81, $data['data_user'][0]->password)
            ){
                //pass ok
                $data['data_user_r'] = "is set & pass ok". " user: " .$data['data_user'][0]->user . "" . $LSf47vWou0wNVEsEuT1i . " pass: " . $PHt0gjv8TbmLTQCWVB81 . " ********* ".$data['data_user'][0]->password;

                session_start();
                $_SESSION['ID']            = $data['data_user'][0]->id;
                $_SESSION['IDadvance']     = $data['data_user'][0]->id_advance;
                $_SESSION['User']          = $data['data_user'][0]->user;
                $_SESSION['Permissions']   = $data['data_user'][0]->permissions;
                $_SESSION['Email']         = $data['data_user'][0]->email;
                $_SESSION['Firstname']     = $data['data_user'][0]->firstname;
                $_SESSION['Secondname']    = $data['data_user'][0]->secondname;
                $_SESSION['Message']       = $data['data_user'][0]->Message;
                $_SESSION['Time']          = date("Y-m-d H:m:s");

                $data['url'] = INDEX_PAGE . "dashboard?Data=Successful&code=101&sha1=" . $sha1;

            } else {
                //pass not
                $data['data_user_r'] = "is set & pass not". " user: " .$data['data_user'][0]->user . "" . $LSf47vWou0wNVEsEuT1i . " pass: " . $PHt0gjv8TbmLTQCWVB81 . " ********* ".$data['data_user'][0]->password;
                $data['url'] = INDEX_PAGE . "login/log_out?error=102&since=login&sha1=" . $sha1;
            }
            //----------> 3.1

        }else{
            //----------> 3.2
            $data['data_user_r'] = "is set error";
            $data['url'] = INDEX_PAGE . "login/log_out?error=101&since=login&sha1=" . $sha1;
            //----------> 3.2
        }
        //----------> 3

        //---------------------------------------------------------------->

        /*Begin: Views */
        $this->load->view('loop/header'    , $data);
        $this->load->view('loop/body/login', $data);
        
            $this->load->view('login/log-in'   , $data);

        $this->load->view('loop/footer/dark_light'    , $data);
        $this->load->view('loop/footer/copyright'    , $data);
        $this->load->view('loop/footer/footer'        , $data);
        /*End:   Views */
    }
    //--->

    //--->
    public function log_out()
    {
        session_start();
        session_destroy();

        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['page_title']      = "User";
        $data['sub_page_title']  = 'Log-out';
        $data['sub_page_title2'] = 'Check';
        $data['css']             = 'log_out/log_out';
        $data['js']              = 'log_out/log_out';
        
        $data['url']             = INDEX_PAGE . "?error=102&since=login&sha1=" . $sha1;

        $this->load->view('loop/header', $data);
        $this->load->view('loop/body/login', $data);
        
            $this->load->view('login/log-out', $data);
        

        $this->load->view('loop/footer/dark_light'    , $data);
        $this->load->view('loop/footer/copyright'    , $data);
        $this->load->view('loop/footer/footer'        , $data);
    }
    //--->

    //--->
    public function log_error()
    {
        session_start();
        session_destroy();

        $sha1                    = random_string('sha1', 16);
        $data['sha1']            = $sha1;
        $data['page_title']      = "";
        $data['sub_page_title']  = 'User';
        $data['sub_page_title2'] = 'Login';
        $data['css']             = 'log_error/log_error';
        $data['js']              = 'log_error/log_error';

        $data['url']             = INDEX_PAGE . "?error=102&since=login&sha1=" . $sha1;

        $this->load->view('loop/header', $data);
        $this->load->view('loop/body/login', $data);
        
            $this->load->view('login/log-error', $data);
        
        $this->load->view('loop/footer/dark_light'    , $data);
        $this->load->view('loop/footer/copyright'    , $data);
        $this->load->view('loop/footer/footer'        , $data);
    }
    //--->

    //----->
}