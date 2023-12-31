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
    function logNew()
    {

        $response = file_get_contents('http://worldtimeapi.org/api/timezone/America/Mexico_City');
        $obj = json_decode($response);


        $data['id_advance'] = random_string('alpha', 20);
        $data['time']       = $obj->{'datetime'};


        $this->db->insert('log', $data);

        $status = "[OK: new record log]";
        return    $status;
    }
    //--->

    //--->
    function checkDatauser($user, $password)
    {

        /*
            SELECT
            usuarios.id AS id,
            usuarios.id_advance AS id_advance,
            usuarios.time AS time,
            usuarios.`user` AS `user`,
            usuarios.`password` AS `password`,
            usuarios.nombre AS nombre,
            usuarios.email AS email,
            usuarios.activo AS activo
            FROM
            usuarios
            WHERE
            usuarios.`user` = 'root'

            */
        /*
        Array (
            [ID] => 1 [IDadvance] => U-03fb5ca7539c770b6b
            [User] => admin
            [Permissions] => admin
            [Email] => admin@gtvsa.com
            [Firstname] => Admin
            [Secondname] => Root
            [Message] => Datasuccessful
            [Time] => 2023-09-03 02:09:13
            )
        */
        //---A)
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user.`user`', $user);
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

}
/* End of file database.php */
