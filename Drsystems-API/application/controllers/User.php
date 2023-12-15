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
            $xr8_data = $this->Querys->querysUserNew();
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //---> R
    public function userView()
    {
        $xr8_data   = $this->Querys->querysUserView();
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //---> U
    public function userUpdate()
    {
        if (
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
            $xr8_data = $this->Querys->querysUserUpdate();
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
            $xr8_data = $this->Querys->querysUserDelete();
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($xr8_data));
    }
    //--->

    //----->
}