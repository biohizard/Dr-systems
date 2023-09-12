<?php
class User extends CI_Controller
{
    //----->

    //--->
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->default = $this->load->database('default', TRUE);
        $this->load->model('user/Querys');
    }
    //--->

    //--->
    public function index()
    {
    }
    //--->

    //---> C
    public function userNew()
    {
        /*
        user: I
        permissions: user
        email: U
        password: AEIOU
        first: A
        second: E
        tel: 99
        puesto: dr



        */
        if (
            empty($this->input->post('user')) ||
            empty($this->input->post('permissions')) ||
            empty($this->input->post('email')) ||
            empty($this->input->post('password')) ||
            empty($this->input->post('first')) ||
            empty($this->input->post('second')) ||
            empty($this->input->post('tel')) ||
            empty($this->input->post('puesto'))
        ) {
            $xr8_data =  array('code' => 'user new', 'value' => False);
        } else {
            $xr8_data = $this->Querys->userNew();
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //---> R
    public function userView()
    {
        $xr8_data   = $this->Querys->userView();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //---> U
    public function userUpdate()
    {
        if (
            /*
id_advance: U-03fb5ca7539c770b6b
user: admin
permissions: user
email: admin@gtvsa.com
password: *********
first: Admin2
second: Root2
tel: 00001111
puesto: dr
            */
            empty($this->input->post('user'))        ||
            empty($this->input->post('permissions')) ||
            empty($this->input->post('email'))       ||
            empty($this->input->post('password'))    ||
            empty($this->input->post('first'))   ||
            empty($this->input->post('second'))
        ) {
            $xr8_data =
                array(
                    'code' => 'User Update',
                    'value' => False
                );
        } else {
            $xr8_data = $this->Querys->userUpdate();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //---> D
    public function userDelete()
    {
        if (
            empty($this->input->post('id_advance'))
        ) {
            $xr8_data =
                array(
                    'code' => 'User Delete',
                    'value' => False
                );
        } else {
            $xr8_data = $this->Querys->userDelete();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //----->
}