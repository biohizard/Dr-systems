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
    function userView()
    {
        //---A)

        $this->db->select('
            `user`.id,
            `user`.id_advance,
            `user`.time,
            `user`.activo,
            `user`.`user`,
            `user`.permissions,
            `user`.email,
            `user`.firstname,
            `user`.secondname,
            `user`.telefono,
            `user`.puesto
            ');
        $this->db->where('activo', 'true');
        $this->db->from('user');

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
    function userNew()
    {
        $data = array(
            'id_advance' => "U-" . random_string('sha1', 20),
            'time'       => date("Y-m-d H:m:s"),
            'activo'     => "true",
            'user'       => $this->input->post('user'),
            'permissions' => $this->input->post('permissions'),
            'email'      => $this->input->post('email'),
            'password'   => password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost']),
            'firstname'  => $this->input->post('first'),
            'secondname' => $this->input->post('second'),
            'telefono'   => $this->input->post('tel'),
            'puesto'     => $this->input->post('puesto')
        );

        $this->db->insert('user', $data);

        $status =  array(
            'code'  => "user new",
            'value' => "True"
        );
        return    $status;
    }
    //--->

    //--->
    function userUpdate()
    {
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
        $user = $this->input->post('user');
        $pass = $this->input->post('password');

        if($pass == '*********'){
            $data = array(
                'user'        => $user,
                'permissions' => $this->input->post('permissions'),
                'email'       => $this->input->post('email'),
                'firstname'   => $this->input->post('first'),
                'secondname'  => $this->input->post('second'),
                'telefono'    => $this->input->post('tel'),
                'puesto'      => $this->input->post('puesto')
            );
        }else{
            $data = array(
                'user'        => $user,
                'permissions' => $this->input->post('permissions'),
                'email'       => $this->input->post('email'),
                'firstname'   => $this->input->post('first'),
                'secondname'  => $this->input->post('second'),
                'telefono'    => $this->input->post('tel'),
                'puesto'      => $this->input->post('puesto'),
                'password'    => password_hash($this->input->post('password'), PASSWORD_BCRYPT, ['cost'])
            );
        }


        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('user', $data);

        $status =  array(
            'code'  => "User Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->

    //--->
    function userDelete()
    {
        $user = $this->input->post('user');
        $data = array(
            'activo'        => 'false'
        );

        $this->db->where('id_advance', $this->input->post('id_advance'));
        $this->db->update('user', $data);

        $status =  array(
            'code'  => "User Update",
            'value' => "True"
        );

        return    $status;
    }
    //--->
}
/* End of file database.php */