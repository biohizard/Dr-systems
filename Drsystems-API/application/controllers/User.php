<?php
class User extends CI_Controller {
//----->

    //--->
    public function __construct(){
        parent::__construct();
        //EMAIL
        /*
        Non-SSL Settings (NOT recommended)
        Usuario:	confirmacion@pideboletos.com
        Contraseña:	Use the email account's password.
        Incoming Mail Server:	mail.lonex.com
        Puerto IMAP: 143
        Puerto de POP3: 110
        Servidor de Correo Saliente::	mail.lonex.com
        Puerto SMTP: 25/2525
        */
        $configEmail = Array(
            'useragent' => 'Tech LUXZA SYSTEMS',
            'protocol'  => 'smtp',
            'smtp_crypto' => 'tls',
            'smtp_host' => 'mail.lonex.com',
            'smtp_timeout' => 20,
            'smtp_port' =>  2525,
            'smtp_user' => 'confirmacion@pideboletos.com',
            'smtp_pass' => '12345aeiou',
            'mailtype'  => 'html',
            'charset'   => 'utf-8'
            );
        $this->load->library('email', $configEmail);

        // Your own constructor code
        $this->load->database();
        $this->default= $this->load->database('default', TRUE);

            $this->load->model('log/Model_log');
            $this->load->model('user/Querys');
            $xr8_data = $this->Model_log->logNew();
    }
    //--->

    //--->
    public function index(){
        $xr8_data = $this->Model_log->logNew();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

        //--->
        public function createdata(){
            $xr8_data = $this->Querys->logNew();
                /*
                'id_advance' => random_string('sha1', 20),
                'time'       => date("Y-m-d H:m:s"),
                'user'       => $_POST['user'],
                'permissions'=> $_POST['permissions'],
                'email'      => $_POST['email'],
                'password'   => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost']),
                'firstname'  => $_POST['first'],
                'secondname' => $_POST['second'],
                'telefono'   => $_POST['tel'],
                'puesto'     => $_POST['puesto']
                */
                if (
                    empty($_POST['user'])        ||
                    empty($_POST['permissions']) ||
                    empty($_POST['email'])       ||
                    empty($_POST['password'])    ||
                    empty($_POST['first'])       ||
                    empty($_POST['second'])      ||
                    empty($_POST['puesto'])
                    ){
                        echo "algo post vacio";
                    }else{
                        $xr8_data   = $this->Querys->usuarioNew();
                        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
                    }
        }
        //--->

        //--->
        public function readerdata(){
            /* Rec Log*/
            $xr8_data = $this->Model_log->logNew();

            //$id_advance = 'CLjFxfEC16HE9AZ948Ws';
            //a181a603769c1f98ad927e7367c7aa51 = all
            //b326b5062b2f0e69046810717534cb09 = true
            //68934a3e9455fa72420237eb05902327 = false

            if ((empty($_GET['id_advance'])) && ($_GET['a181a603769c1f98ad927e7367c7aa51'] == 'b326b5062b2f0e69046810717534cb09')){
                /*All*/
                $id_advance = null;
                $all        = True;
                }else{
                    /*id advance*/
                    $id_advance = $_GET['id_advance'];
                    $all        = False;
                    }

                $xr8_data   = $this->Querys->userRead($id_advance,$all);
                $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
        //--->

        //--->
        public function updatedata(){
            $id_advance = $_POST['id_advance'];
            $xr8_data = $this->Querys->socios_actualizar($id_advance);
            //----->json
            $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
        //--->

        //--->
        public function deletedata(){
          $xr8_data = $this->Querys->socios_borrar();
            //----->json
            $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
        //--->

        //--->
        public function lostpassword(){
          //email
          $LSf47vWou0wNVEsEuT1i = $_POST['LSf47vWou0wNVEsEuT1i'];

          $data['demo'] = 'Demo de Email';

          $list = array($LSf47vWou0wNVEsEuT1i);
          $bcc  = array('info@gtvsa.com',);

          $this->email->set_newline("\r\n");
          $this->email->from('info@gtvsa.com','GTV / Recuperacion');
          $this->email->to($list);
          //$this->email->bcc($bcc);
          $this->email->subject('GTV Recuperacion');

              $body = $this->load->view('user/lostpassword', $data, TRUE);
              $this->email->message("demo EMAIL");

              $xr8_data['Messenge'] = 'Email';

              try{

                  $this->email->send();
                  $xr8_data['sendemail']="Email Send";

                  }catch(Exception $e){

                      $e->getMessage();
                      $xr8_data['sendemail']="Email No Send";

                      }
                      $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
        //--->

        //--->
        public function finddata(){
            /* Rec Log*/
            $xr8_data = $this->Model_log->logNew();

            //$id_advance = 'CLjFxfEC16HE9AZ948Ws';
            //a181a603769c1f98ad927e7367c7aa51 = all
            //b326b5062b2f0e69046810717534cb09 = true
            //68934a3e9455fa72420237eb05902327 = false

            if ((empty($_GET['user'])) && ($_GET['a181a603769c1f98ad927e7367c7aa51'] == '68934a3e9455fa72420237eb05902327')){            
                echo 1;
                }else{
                    $user       = $_GET['user'];
                    $all        = False;    
                }

                $xr8_data   = $this->Querys->userFind($user,$all);
                $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
        }
        //--->        
//----->
}
