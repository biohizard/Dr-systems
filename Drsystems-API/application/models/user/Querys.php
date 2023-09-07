<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    *
    *
    *
    *
    *
    **/

    class Querys extends CI_Model {

        //--->
        function userView(){
            //---A)
            /*
            SELECT
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
            FROM
            `user`
            */
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
        }
/* End of file database.php */