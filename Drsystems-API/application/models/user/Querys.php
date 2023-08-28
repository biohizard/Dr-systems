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
        function logNew(){
            /*
            SQL
            INSERT INTO `log` (`id_advance`) VALUES ('134365578098ouikgtdf')
            */

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
        function userRead($id_advance,$all){

            /*
            SELECT
            `user`.id,
            `user`.id_advance,
            `user`.time,
            `user`.`user`,
            `user`.permissions,
            `user`.email,
            `user`.`password`,
            `user`.firstname,
            `user`.secondname
            FROM
            `user`
            WHERE
            `user`.id_advance = 'CLjFxfEC16HE9AZ948Ws'
            */

            //---A)
            $this->db->select('
            `user`.id_advance,
            `user`.time,
            `user`.`user`,
            `user`.permissions,
            `user`.email,
            `user`.firstname,
            `user`.secondname,
            `user`.telefono,
            `user`.puesto
                ');
            $this->db->from('user');

            /*all o single*/
            if ($all == true) {

                $this->db->where('user.`activo`','true');

                }else{

                    $this->db->where('user.`id_advance`',$id_advance);
                    $this->db->where('user.`activo`','true');

                    }

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
        function usuarioNew(){

            /*
            INSERT INTO `labs26`.`user`
            (`id`, `id_advance`, `time`, `user`, `permissions`, `email`, `firstname`, `secondname`)
            VALUES (4, '5exr6ctyuiox6crtyui', '2020-04-29 16:07:47', 'demo', 'vendedor', 'vendedor2@empresa.com', 'jose', 'martin')
            */
            $data = array(
                'id_advance' => random_string('sha1', 20),
                'time'       => date("Y-m-d H:m:s"),
                'activo'     => "true",
                'user'       => $_POST['user'],
                'permissions'=> $_POST['permissions'],
                'email'      => $_POST['email'],
                'password'   => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost']),
                'firstname'  => $_POST['first'],
                'secondname' => $_POST['second'],
                'telefono'   => $_POST['tel'],
                'puesto'     => $_POST['puesto']
            );

            $this->db->insert('user', $data);

                    //--->Mostrar Info de la tienda
                    /*
                    $this->db->select('*');

                    $this->db->from('negocios_mitienda');
                    $this->db->where ('negocios_mitienda.mtda_correo',$_POST['email']);

                    $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {$data[] = $row;}
                                return $data;
                            }else{
                                return false;
                                }
                                */

                        //$status = "$query";

                        //return $status;
                        $status = "[OK: 1]";
                        return    $status;
            }
        //--->

        //--->
        function socios_actualizar(){

            /*
            INSERT INTO `labs26`.`user`
            (`id`, `id_advance`, `time`, `user`, `permissions`, `email`, `firstname`, `secondname`)
            VALUES (4, '5exr6ctyuiox6crtyui', '2020-04-29 16:07:47', 'demo', 'vendedor', 'vendedor2@empresa.com', 'jose', 'martin')
                                        /*
            Array (
            [user] => admin
            [permissions] => administrador
            [email] => biohizard@gmail.com
            [first] => jorge
            [second] => garibaldo
            [tel] => 55555
            [puesto] => vendedor )
            */
            if (empty($_POST['password'])){
                $data = array(

                    'user'       => $_POST['user'],
                    'permissions'=> $_POST['permissions'],
                    'email'      => $_POST['email'],
                    'firstname'  => $_POST['first'],
                    'secondname' => $_POST['second'],
                    'telefono'   => $_POST['tel'],
                    'puesto'     => $_POST['puesto']
                    );
                }else{
                    $data = array(

                        'user'       => $_POST['user'],
                        'permissions'=> $_POST['permissions'],
                        'email'      => $_POST['email'],
                        'password'   => password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost']),
                        'firstname'  => $_POST['first'],
                        'secondname' => $_POST['second'],
                        'telefono'   => $_POST['tel'],
                        'puesto'     => $_POST['puesto']
                        );
                    }


            $this->db->where('id_advance',$_POST['id_advance']);
            $this->db->update('user', $data);

                    //--->Mostrar Info de la tienda
                    /*
                    $this->db->select('*');

                    $this->db->from('negocios_mitienda');
                    $this->db->where ('negocios_mitienda.mtda_correo',$_POST['email']);

                    $query = $this->db->get();

                        if ($query->num_rows() > 0) {
                            foreach ($query->result() as $row) {$data[] = $row;}
                                return $data;
                            }else{
                                return false;
                                }
                                */

                        //$status = "$query";

                        //return $status;
                        $status = "[OK: 1]";
                        return    $status;


        //--->
        }

        function socios_borrar(){

              $data = array('activo'=> 'false');

                $this->db->where('id_advance',$_POST['id_advance']);
                $this->db->update('user', $data);

                    //return $status;
                    $status = "[OK: 1]";
                    return    $status;
            }
        //--->
        //--->
        function userFInd($user,$all){
            //---A)
            $this->db->select('
            `user`.id_advance,
            `user`.time
                ');
            $this->db->from('user');
            //$this->db->like('user',$user);
            $this->db->where('user',$user);

                $query = $this->db->get();
                $row = $query->row_array();
            //---A)

                if ($query->num_rows() > 0) {
                    foreach ($query->result() as $row) {
                        $row->Message = "Datasuccessful";
                        $row->Existence  = true;
                        $data[] = $row;
                        }
                        return $data;
                    }

        }
        //--->
        }
/* End of file database.php */