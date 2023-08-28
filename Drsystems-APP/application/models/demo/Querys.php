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
        function inicioNew(){

            $data = array(
            'id_advance' => "1234567890qwertyuiop"
            );

            $this->db->insert('base', $data);
            /*
            $insertId = $this->db->insert_id();
            return  $insertId;
            */

                    $query = $this->db->get();
                    
                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {$data[] = $row;}
                                return $data;
                            }else{
                                return false;
                                }


                        //$status = "$query";

                        //return $status;
                        $status = "[OK: 1]";
                        return    $status;


              }
        //--->

        }
/* End of file database.php */
