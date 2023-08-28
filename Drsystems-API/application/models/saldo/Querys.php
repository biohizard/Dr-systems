<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    function saldoCreate()
    {
        $random = random_string('sha1', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);

        $metales_pagos_data = array(
            'id_advance'            => random_string('sha1', 20),
            'detail_id_advance'     => $_POST['save_id_advance'],
            'detail_time_update'    => $_POST['generar_fecha_saldo'],
            'detail_saldo'          => $_POST['generar_saldo_saldo'],
            'detail_saldo_actual'   => $_POST['generar_saldo_saldo']
        );

        $this->db->insert('saldo',$metales_pagos_data);
        
        $status[] = array(
            "Time"       => $date,
            "Message"    => "Ok Create",
            "Code"       => 101,
            "Contorller" => "Saldo",
            "class"      => "saldo",
            "fuction"    => "createdata",
            "id"         => " "
        );
        
        return    $status;
    }

    function saldoRead()
    {
        $random = random_string('sha1', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);
      
        $status[] = array(
            "Time"       => $date,
            "Message"    => "Ok Reade",
            "Code"       => 101,
            "Contorller" => "readedata",
            "class"      => "Ok",
            "fuction"    => "Ok",
            "id"         => "Ok"
        );

        return  $data;
    }

    function saldoUpdate()
    {
        $random = random_string('sha1', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);


        $status[] = array(
            "Time"       => $date,
            "Message"    => "Ok Update",
            "Code"       => 101,
            "Contorller" => "Saldo",
            "class"      => "updatedata",
            "fuction"    => "Ok",
            "id"         => "Ok"
        );
        
        return    $status;
    }

    function saldoDelete()
    {
        $random = random_string('sha1', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);


        $status[] = array(
            "Time"       => $date,
            "Message"    => "Ok Update",
            "Code"       => 101,
            "Contorller" => "Saldo",
            "class"      => "updatedata",
            "fuction"    => "Ok",
            "id"         => "Ok"
        );
        
        return    $status;
    }

    function SaldoBase()
    {
        /*
            SELECT
            Count(saldo.id)
            FROM
            saldo
            WHERE
            saldo.detail_id_advance = '30063c359cd725358a5a'
            GROUP BY
            saldo.id_advance

            SELECT
            Count(saldo.id) AS saldo,
            clientes.firstname,
            clientes.secondname,
            saldo.detail_saldo_actual,
            saldo.detail_saldo
            FROM
            saldo
            INNER JOIN clientes ON saldo.detail_id_advance = clientes.id_advance
            WHERE
            saldo.detail_id_advance = 'C-zr8h0iji96crde4'            
        */        
 
        $this->db->select('
        saldo.id AS saldo,
        clientes.firstname,
        clientes.secondname,
        saldo.detail_saldo_actual,
        saldo.detail_saldo
        ');
        $this->db->from('saldo');
        $this->db->join    ('clientes', 'saldo.detail_id_advance = clientes.id_advance');
        $this->db->where('saldo.`detail_id_advance`',$_GET['id']);

        $query = $this->db->get();
        $row = $query->row_array();

        //---A)
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

        } else {
            $data[] = array("Error"  => 104,"Caja" => "Error");
        }

        return  $data;
    }
    function SaldoActual()
    {

        $this->db->select('*');
        $this->db->from('saldo');
        $this->db->where('saldo.`detail_id_advance`',$_GET['id']);

        $query = $this->db->get();
        $row = $query->row_array();

        //---A)
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }

        } else {
            $data[] = array("Error"  => 104,"Caja" => "Error");
        }

        return  $data;
    }      
}
/* End of file database.php */