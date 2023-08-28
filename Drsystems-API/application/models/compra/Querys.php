<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
    *Create
    *Read
    *Update
    *Delete
    **/

class Querys extends CI_Model
{

  //--->
  function clientesCreate()
  {
    $random = random_string('sha1', 20);
    $date   = date("Y-m-d H:m:s");
    $r_id   = random_string('md5', 4);

    $data0 = array(
      'id_advance'        => random_string('sha1', 20),
      'time'              => $date,
      'id_advance_origen' => $random,
      'fechaconsti'       => $_POST['fecha1'],
      'rfc'               => $_POST['rfc1'],
      'pais'              => $_POST['pais1'],
      'giro'              => $_POST['giro1'],
    );

    $data1 = array(
      'id_advance' => $random,
      'time'       => $date,
      'activo'     => "true",
      'firstname'  => $_POST['first'],
      'secondname' => $_POST['second'],
      'email'      => $_POST['email'],
      'telefono'   => $_POST['tel'],
      'rfc'        => $_POST['rfc'],
      'curp'       => $_POST['curp'],
      'direccion'  => $_POST['direccion']

    );    
    $this->db->insert('razonsocial', $data0);
    $this->db->insert('clientes'   , $data1);

    //return $status;
    $status = [
      "category"    => "Request",
      "description" => "Create Cliente New",
      "id advance"  => $random,
      "date"        => $date,
      "http_code"   => 404,
      "code"        => 1001,
      "request"     => true,
      "request_id"  => $r_id
    ];

    return    $status;
  }
  //--->

  //--->
  function compraRead()
  {
      //---->
      $this->db->select('
        metales.id                 AS metales_id,
        metales.id_advance         AS metales_id_advance,
        metales.time               AS metales_time,
        metales.detail_fecha,
        metales.detail_status,
        metales.detail_tipo,
        metales.detail_grs,
        metales.detail_precio,
        metales.detail_saldo
      ');
      $this->db->select('metales.detail_id_advance, COUNT(metales.detail_id_advance) as detail_total_operaciones');
      $this->db->from('metales');
      
      $this->db->group_by("metales.detail_id_advance");

      $query = $this->db->get();
      $row = $query->row_array();
      
      if ($query->num_rows() > 0) {
        foreach ($query->result() as $row){ 
          //---->
          $detail_id_advance_db = $row->detail_id_advance;
          $Type = explode('-',$detail_id_advance_db);
          
          $Time_minify =explode(' ',$row->metales_time);
          $row->Time_minify = $Time_minify[0];
          
          
          ######################################################
          #                   detail_cliente                   #
          ######################################################
          
          $this->db->select('
            clientes.rfc        AS clientes_rfc,
            clientes.telefono   AS clientes_telefono,
            clientes.secondname AS clientes_apellido,
            clientes.firstname  AS clientes_nombre,
            clientes.email      AS clientes_email,
            clientes.curp       AS clientes_curp,
            clientes.direccion  AS clientes_direccion,
            clientes.activo     AS clientes_activo,
            clientes.time       AS clientes_time,
            clientes.id         AS clientes_id,
            clientes.id_advance AS clientes_id_advance
          ');

          $this->db->from('clientes');
          $this->db->where("clientes.id_advance",$detail_id_advance_db);

          $query = $this->db->get();
          $row2 = $query->row_array();
          if ($query->num_rows() > 0) {
            foreach ($query->result() as $row2) {
                $row->detail_cliente =  $row2;               
            }
          }
          ######################################################
          #                   detail_cliente                   #
          ######################################################

          //---->
        $data[] = $row;
        }

      }
      return $data;
      //---->
  }
  //--->

  //--->
  function clientesUpdate()
  {
    $random = random_string('sha1', 20);
    $date   = date("Y-m-d H:m:s");
    $r_id   = random_string('md5', 4);

            /*
        Array ( 
            [id_advance] => 0f9385c23d1d5825d266 

            [rfc1] => 3 
            [pais1] => 3 
            [giro1] => 3 

            [first] => viernes3 
            [second] => gomez3 
            [email] => viernes@gomez.com3 
            [tel] => 55111122223 
            [rfc] => SAOK790530QZ23 
            [curp] => BEML920313HMCLNS093 
            [direccion] => Av. Paseo de la Reforma No 347, Cuauhtémoc, CP 06500 Ciudad de México, CDMX3 )        

        */
    $data0 = array(
      'firstname'  => $_POST['first'],
      'secondname' => $_POST['second'],
      'email'      => $_POST['email'],
      'telefono'   => $_POST['tel'],
      'rfc'        => $_POST['rfc'],
      'curp'       => $_POST['curp'],
      'direccion'  => $_POST['direccion']      
    );

    $this->db->where('id_advance', $_POST['id_advance']);
    $this->db->update('clientes', $data0);

    $data1 = array(
      'rfc'         => $_POST['rfc1'],
      'pais'        => $_POST['pais1'],
      'giro'        => $_POST['giro1'],      
      'fechaconsti' => $_POST['fecha1']
    );
    $this->db->where('id_advance_origen', $_POST['id_advance']);
    $this->db->update('razonsocial', $data1);

    //return $status;
    $status = [
      "category"    => "Request",
      "description" => "Update Cliente New",
      "id advance"  => $random,
      "date"        => $date,
      "http_code"   => 404,
      "code"        => 1001,
      "request"     => true,
      "request_id"  => $r_id
    ];

    return    $status;
  }
  //--->

  function clientesDelete()
  {
    $random = random_string('sha1', 20);
    $date   = date("Y-m-d H:m:s");
    $r_id   = random_string('md5', 4);

    $data = array('activo' => 'false');

    $this->db->where('id_advance', $_POST['id_advance']);
    $this->db->update('clientes', $data);

    //return $status;
    $status = [
      "category"    => "Request",
      "description" => "Delete Cliente New",
      "id advance"  => $random,
      "date"        => $date,
      "http_code"   => 404,
      "code"        => 1001,
      "request"     => true,
      "request_id"  => $r_id
    ];
    return    $status;
  }
  //--->

}
/* End of file database.php */