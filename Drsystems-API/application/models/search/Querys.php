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
  function clientesRead($id_advance, $all)
  {

    //---A)
    /*clientesRead($id_advance, $all);
    $this->db->select('
            `clientes`.id_advance,
            `clientes`.time,
            `clientes`.email,
            `clientes`.firstname,
            `clientes`.secondname,
            `clientes`.telefono,
            `clientes`.rfc,
            `clientes`.curp,
            `clientes`.direccion,
            `razonsocial`.id_advance_origen AS rs_id_advance,
            `razonsocial`.fechaconsti       AS rs_fecha,
            `razonsocial`.rfc               AS rs_rfc,
            `razonsocial`.pais              AS rs_pais,
            `razonsocial`.giro              AS rs_giro
            ');
        */            
    $this->db->select('*');
    $this->db->from('clientes');
        
        
    $this->db->join('razonsocial', 'razonsocial.id_advance_origen = clientes.id_advance');


    if($all == true){
    $this->db->where('clientes.`activo`', 'true');
    }elseif($all == false){
    $this->db->where('clientes.`id_advance`', $id_advance);
    $this->db->where('clientes.`activo`', 'true');
    }

        $query = $this->db->get();
        $row = $query->row_array();
        //---A)

        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            //04/06/2020'
            //'2020-05-30
            
            //$row->rs_fecha  = date("Y-m-d", strtotime($row->rs_fecha));
            $row->Message = "Datasuccessful";
            $data[] = $row;
        }
        return $data;
        }
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

 //--->
  function searchRead()
  {
    $quest = $_GET['term'];

    $random = random_string('sha1', 20);
    $date   = date("Y-m-d H:m:s");
    $r_id   = random_string('md5', 4);

    $status = [
      "category"    => "Search",
      "description" => "search/querys/quest",
      "id advance"  => $random,
      "date"        => $date,
      "http_code"   => 404,
      "code"        => 1001,
      "request"     => true,
      "request_id"  => $r_id
    ];

    $this->db->select('*');
    $this->db->from('clientes');
    $this->db->or_like('clientes.firstname',$quest);
    $this->db->or_like('clientes.secondname',$quest);
    $this->db->order_by("id", "DESC");

    $query = $this->db->get();
    $row = $query->row_array();
    
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        
        $id_advance = $row->id_advance;
        $Type = explode('-',$id_advance);
        if($Type[0] == "C"){
          $tipo= "cliente";
        }else{
          $tipo = "error";
        }

          $row->type = $tipo;
          $data[] = $row;
      }
    } else {
      $data[] = array(
              "Error"    => 101,
              "Buscador" => "Error User",
              "Status"   => $status
      );
    }
    return    $data;
  }
 //--->

}
/* End of file database.php */