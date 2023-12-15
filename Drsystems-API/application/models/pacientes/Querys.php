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
    function querysPacientesView()
    {
        //---A)

        $this->db->select('
            `pacientes`.id,
            `pacientes`.id_advance,
            `pacientes`.time,
            `pacientes`.activo,
            `pacientes`.permissions,
            `pacientes`.email,
            `pacientes`.firstname,
            `pacientes`.secondname,
            `pacientes`.telefono
            ');
        $this->db->where('activo', 'true');
        $this->db->from('pacientes');

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
    function querysPacientesNew()
    {
        $data = array(
            'id_advance' => "P-" . random_string('sha1', 20),
            'time'       => date("Y-m-d H:m:s"),
            'activo'     => "true",
            'permissions' => $this->input->post('permissions'),
            'email'      => $this->input->post('email'),
            'firstname'  => $this->input->post('first'),
            'secondname' => $this->input->post('second'),
            'telefono'   => $this->input->post('tel'),
            'puesto'   => "pacientes"
        );

        $this->db->insert('pacientes', $data);

        $status =  array(
            'code'  => "pacientes new",
            'value' => "True"
        );
        return    $status;
    }
    //--->

    //--->
    function querysPacientesUpdate()
    {

        $user = $this->input->post('user');

            $data = array(
                'email'       => $this->input->post('email'),
                'firstname'   => $this->input->post('first'),
                'secondname'  => $this->input->post('second'),
                'telefono'    => $this->input->post('tel')
            );

        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('pacientes', $data);

        $status =  array(
            'code'  => "User Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->

    //--->
    function querysPacientesDelete()
    {
        $pacientes = $this->input->post('user');
        $data = array(
            'activo'        => 'false'
        );

        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('pacientes', $data);

        $status =  array(
            'code'  => "pacientes Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->
}
/* End of file database.php */