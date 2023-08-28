<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    //--->
    function pagosCreate()
    {

        $random = random_string('alnum', 20);
        $date   = date("Y-m-d");
        $r_id    = random_string('md5', 4);
        /*
        (SA) = Saaldo anterior
        (T)  = Total
        (P)  =  Pago
        (Sa) = Saldo actual
        formula : (SA) + (T) - (P) = Sa

        save_id_advance_user: C-zr8h0iji96crde4
        generarPagoTotal: 100.00
        generarPago: 50000
        generarTipoPago: pago
        generarSaldo: 0.00
        generarObservaciones:     
        
        save_id_advance_user: C-A2L9lTPoIBcCg8f6O3
        generarPagoTotal: 0.00
        generarPago: 100000
        generarTipoPago: anticipo
        generarSaldo: saldo
        generarObservaciones: anticipo
        */

        $xSa = $_POST['generarSaldo'];
        $xT  = $_POST['generarPagoTotal'];
        $xP  = $_POST['generarPago'];

        $xSa = ($xSa) + ($xT) - ($xP);

        $metales_pagos_data = array(
            'id_advance'                => $random,
            'entregas_fecha'            => $date,
            'user_id_advance'           => $_POST['save_id_advance_user'],
            'pagos_total'               => $_POST['generarPagoTotal'],
            'pagos_pagos'               => $_POST['generarPago'],
            'pagos_tipopagos'           => $_POST['generarTipoPago'],
            'pagos_saldos'              => $xSa,
            'pagos_observaciones'       => $_POST['generarObservaciones']
        );
        
        $this->db->insert('tabspagos',$metales_pagos_data);

            /********************************************
            *           tabla: saldo                 *
            ********************************************/         
            //------------------------------------------>  
            $xTotal = floatval($_POST['generarPagoTotal']);
            $xPago  = floatval($_POST['generarPago']);
            $x      =$xTotal-$xPago;
            

            $this->db->set('detail_saldo_actual',$xSa,FALSE);
                $this->db->where('detail_id_advance',$_POST['save_id_advance_user']);
                    $this->db->update('saldo');

            //------------------------------------------>  

            //------------------------------------------>              

            $status[] = array(
                "Ok"      => 101,
                "Cierres" => "Ok",
                "Saldo"   => "Ok",
                "Entregas"=> "Ok",
                "Cierres" => "Ok",
                "Pagos"   => "Ok",
                "demo"    => $metales_pagos_data
            );
            
            return    $status;
    }
    //--->

    //--->
    function pagosRead()
    {
        $this->db->select('
            `tabspagos`.id,
            `tabspagos`.id_advance,
            `tabspagos`.time,
            `tabspagos`.user_id_advance,
            `tabspagos`.tabs_id_advance,
            `tabspagos`.entregas_fecha,
            `tabspagos`.pagos_total,
            `tabspagos`.pagos_pagos,
            `tabspagos`.pagos_tipopagos,
            `tabspagos`.pagos_saldos,
            `tabspagos`.pagos_observaciones,
            `saldo`.detail_saldo AS saldo_saldo,
            `saldo`.detail_saldo_actual AS saldo_saldo_actual,
            `clientes`.email,
            `clientes`.firstname,
            `clientes`.secondname            
        ');        
        $this->db->from('tabspagos');
        $this->db->where('tabspagos.user_id_advance', $_GET['id']);
        
        $this->db->join('clientes', 'clientes.id_advance     = tabspagos.user_id_advance');
        $this->db->join('saldo'   , 'saldo.detail_id_advance = tabspagos.user_id_advance');

        $this->db->order_by('`tabspagos`.id', 'DESC');

        $query = $this->db->get();
        $row = $query->row_array();

        //---A)
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
        
}    