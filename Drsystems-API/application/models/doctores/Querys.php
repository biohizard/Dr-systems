<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 *
 *
 *
 *
 **/

class Querys extends CI_Model
{

    //--->
    function querysDoctoresView()
    {
        //---A)

        $this->db->select('
            `doctores`.id,
            `doctores`.id_advance,
            `doctores`.time,
            `doctores`.activo,
            `doctores`.permissions,
            `doctores`.email,
            `doctores`.firstname,
            `doctores`.secondname,
            `doctores`.telefono
            ');
        $this->db->where('activo', 'true');
        $this->db->from('doctores');

        $query = $this->db->get();
        $row = $query->row_array();
        //---A)

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $row->Message = "Datasuccessful";
                $data[] = $row;
            }
            return $data;
        }
    }
    //--->

    //--->
    function querysDoctoresNew()
    {
        $data = array(
            'id_advance' => "d-" . random_string('sha1', 20),
            'time'       => date("Y-m-d H:m:s"),
            'activo'     => "true",
            'permissions' => $this->input->post('permissions'),
            'email'      => $this->input->post('email'),
            'firstname'  => $this->input->post('first'),
            'secondname' => $this->input->post('second'),
            'telefono'   => $this->input->post('tel'),
            'puesto'   => "doctores"
        );

        $this->db->insert('doctores', $data);

        $status =  array(
            'code'  => "doctores new",
            'value' => "True"
        );
        return    $status;
    }
    //--->

    //--->
    function querysDoctoresUpdate()
    {

        $user = $this->input->post('user');

            $data = array(
                'email'       => $this->input->post('email'),
                'firstname'   => $this->input->post('first'),
                'secondname'  => $this->input->post('second'),
                'telefono'    => $this->input->post('tel')
            );

        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('doctores', $data);

        $status =  array(
            'code'  => "User Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->

    //--->
    function querysDoctoresDelete()
    {
        $pacientes = $this->input->post('user');
        $data = array(
            'activo'        => 'false'
        );

        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('doctores', $data);

        $status =  array(
            'code'  => "doctores Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->
}
/* End of file database.php */