<?php
class Caja extends CI_Controller
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
        $sha1  = random_string('sha1', 16);
        $data['sha1']           = $sha1;

        $data['page_title']     = "";
        $data['sub_page_title'] = 'Caja';
        $data['css']            = 'caja';
        $data['js']             ='caja,cajaNuevo';

        $data['singout']        = INDEX_PAGE . "user/logout?error=102&since=" . $_GET['since'] . "&sha1=" . $sha1;

        $data['ID']              = $_SESSION['ID'];
        $data['IDadvance']       = $_SESSION['IDadvance'];
        $data['User']            = $_SESSION['User'];
        $data['Permissions']     = $_SESSION['Permissions'];
        $data['Email']           = $_SESSION['Email'];
        $data['Firstname']       = $_SESSION['Firstname'];
        $data['Secondname']      = $_SESSION['Secondname'];
        $data['Message']         = $_SESSION['Message'];
        $data['Time']            = $_SESSION['Time'];

        $this->load->view('loop/header', $data);
        $this->load->view('loop/top', $data);
        $this->load->view('loop/admin-top', $data);

        //--->
        $this->load->view('caja/0-top.php', $data);        
        $this->load->view('caja/1-Create.php', $data);     
        $this->load->view('caja/2-Read.php', $data);        
        //--->
        
        $this->load->view('loop/admin-foot', $data);
        $this->load->view('loop/footer', $data);
    }
    //---> index
//----->
}