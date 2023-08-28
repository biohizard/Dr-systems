<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    //--->
    function cierreCreate()
    { 
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
            'user_id_advance'      => $_POST['save_id_advance'],
            'user_type'            => $x_type_value,
            'detail_fecha'         => $_POST['generar_c_fecha'],
            'detail_status'        => 'abierto',
            'detail_tipo'          => $_POST['generar_c_tipo'],
            'detail_grs_original'  => $_POST['generar_c_grs'],
            'detail_grs'           => $_POST['generar_c_grs'],
            'detail_precio'        => $_POST['generar_c_precio']
          );
  
          $this->db->insert('tabscierre', $data);

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
    function cierreRead()
    {
        $this->db->select('
            `tabscierre`.id,
            `tabscierre`.id_advance,
            `tabscierre`.time,
            `tabscierre`.status,
            `tabscierre`.user_type,
            `tabscierre`.user_id_advance,
            `tabscierre`.detail_fecha,
            `tabscierre`.detail_status,
            `tabscierre`.detail_tipo,
            `tabscierre`.detail_metal,
            `tabscierre`.detail_grs_original,
            `tabscierre`.detail_grs,
            `tabscierre`.detail_precio,
            saldo.detail_saldo AS saldo_saldo,
            saldo.detail_saldo_actual AS saldo_saldo_actual,
            clientes.email,
            clientes.firstname,
            clientes.secondname            
        ');
        $this->db->from('tabscierre');
        $this->db->where('tabscierre.user_id_advance', $_GET['id']);
        $this->db->where('tabscierre.detail_status','abierto');

        $this->db->join('clientes', 'clientes.id_advance     = tabscierre.user_id_advance');
        $this->db->join('saldo'   , 'saldo.detail_id_advance = tabscierre.user_id_advance');

        $this->db->order_by('`tabscierre`.id', 'DESC');

        $query = $this->db->get();
        $row = $query->row_array();

          if ($query->num_rows() > 0) {
              foreach ($query->result() as $row) {
                  $data[] = $row;
              }
          } else {
              $date   = date("Y-m-d H:m:s");
              $data[] = array(
                  "Time"       => $date,
                  "Message"    => "Error Tabs Cierre",
                  "Code"       => 104,
                  "Contorller" => "DbTabsCierre",
                  "class"      => "DbTabsCierre",
                  "fuction"    => "DbTabsCierreRead",
                  "id"         => "user"
              );
          }

            return  $data;
    }
    //--->

    //--->
    function cierreUpdate()
    {
      $random = random_string('alnum', 20);
      $date   = date("Y-m-d H:m:s");
      $r_id   = random_string('md5', 4);

        if($_POST['detail_gr_original'] == ""){
        }else{
          $this->db->set('detail_grs_original',$_POST['detail_gr_original'],FALSE);
          $this->db->set('detail_grs',$_POST['detail_gr_original'],FALSE);
        }

        if($_POST['detail_precio'] == ""){
        }else{
          $this->db->set('detail_precio',$_POST['detail_precio'],FALSE);
        }

        $this->db->where('id_advance', $_POST['id_advance']);
        $this->db->update('tabscierre');

          $status = [
              "category"    => "Request",
              "description" => "Update Cierre",
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
    function cierreDelete()
    {
      $random = random_string('alnum', 20);
      $date   = date("Y-m-d H:m:s");
      $r_id   = random_string('md5', 4);

        $this->db->set('detail_status','cerrado');
        $this->db->where('id_advance',$_POST['id_advance'],TRUE);
        $this->db->update('tabscierre');

          $status = [
              "category"    => "Request",
              "description" => "Delete Cierre",
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