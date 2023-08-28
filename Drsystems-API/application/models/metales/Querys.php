<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *Create
 *Read
 *Update
 *Delete
 **/

class Querys extends CI_Model
{

/********************************************
*                   CRUD                    *
********************************************/
    //--->
    function metalesCreate()
    {   
      /*
        d_advance: U-03fb5ca7539c770b6b
        save_id_advance: C-zr8h0iji96crde4
        generar_c_fecha: 2021-04-01
        generar_c_tipo: compra
        generar_c_metal: oro
        generar_c_grs: 100
        generar_c_precio: 1129.21
      */
        $random = random_string('alnum', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);
        
        $grs    = floatval($_POST['generar_c_grs']);
        $precio = floatval($_POST['generar_c_precio']);

        $saldo  = $grs * $precio;

        $x      = $_POST['save_id_advance'];
        $x_type = explode("-", $x);
        if($x_type[0] == "C"){
          $x_type_value = "clientes";
        }
        

        $data = array(
          'id_advance'           => $random,
          'detail_type'          => $x_type_value,
          'detail_id_advance'    => $_POST['save_id_advance'],
          'detail_fecha'         => $_POST['generar_c_fecha'],
          'detail_status'        => 'abierto',
          'detail_tipo'          => $_POST['generar_c_tipo'],
          'detail_grs_original'  => $_POST['generar_c_grs'],
          'detail_grs'           => $_POST['generar_c_grs'],
          'detail_precio'        => $_POST['generar_c_precio']
        );

        $this->db->insert('metales', $data);
      /*
        id
        id_advance
        time
        detail_id_advance
        detail_time_update
        detail_saldo
        detail_saldo_actual
      */

    
    $this->db->set('detail_time_update',$_POST['generar_c_fecha'], FALSE);
    $x = $_POST['generar_c_precio'];
    $this->db->set('detail_saldo_actual',"detail_saldo_actual+$x", FALSE);
    $this->db->where('detail_id_advance', $_POST['save_id_advance']);
    //$this->db->update('saldo');

        $status = [
            "category"    => "Request",
            "description" => "Create Caja New",
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
  function metalesRead()
  {
    $this->db->select("
    clientes.id,
    clientes.email,
    clientes.firstname,
    clientes.secondname,
    clientes.telefono,
    clientes.id_advance,
    clientes.activo,
    saldo.detail_id_advance   AS s_id_advance,
    saldo.detail_saldo        AS s_detail_saldo,
    saldo.detail_saldo_actual AS s_saldo_actual
    ");
    $this->db->from  ("clientes");
    $this->db->join  ('saldo'   , 'saldo.detail_id_advance = clientes.id_advance');
    $this->db->where ('clientes.`activo`','true');
    
      $query = $this->db->get();
      $row = $query->row_array();
      
        if ($query->num_rows() > 0) {
          foreach ($query->result() as $row){$data[] = $row;}
        }else{$data[] = array("Error"  => 104,"Caja" => "Error");}

          return $data;
  }
  //--->

    //--->
    function metalesReadOne()
    {
        /*
        SELECT
        metales.id,
        metales.id_advance,
        metales.time,
        metales.detail_type,
        metales.detail_id_advance,
        clientes.firstname,
        clientes.secondname,
        metales.detail_fecha,
        metales.detail_status,
        metales.detail_tipo,
        metales.detail_metal,
        metales.detail_grs,
        metales.detail_precio,
        metales.detail_saldo
        FROM
        metales
        JOIN clientes ON metales.detail_id_advance = clientes.id_advance
        WHERE
        metales.detail_id_advance = "C-zr8h0iji96crde4" AND
        metales.detail_fecha LIKE "%2021-03-%"
        ORDER BY
        metales.id DESC
        */        
 
        $this->db->select('
            `metales`.id,
            `metales`.id_advance,
            `metales`.time,
            `metales`.detail_type,
            `metales`.detail_id_advance,
            `clientes`.firstname,
            `clientes`.secondname,
            `metales`.detail_fecha,
            `metales`.detail_status,
            `metales`.detail_tipo,
            `metales`.detail_metal,
            `metales`.detail_grs,
            `metales`.detail_precio,
            `metales`.detail_saldo            
        ');
        $this->db->from('metales');
        $this->db->join('clientes', 'metales.detail_id_advance = clientes.id_advance');
        $this->db->where('metales.`id_advance`',$_GET['id']);

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
    //--->

}
/* End of file database.php */
