<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    //--->
    function cierresCreate()
    {
        //$random = random_string('alnum', 20);
        $random = $_POST['save_p1_cierres_id_advance'];
        
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);


      /*
            #	ID Cierre	Fecha	Fino / Pza	Precio	Importe
                id
                id_advance
                time
                user_id_advance
                tabs_id_advance
                entregas_fecha
                cierres_fino
                cierres_precio
                cierres_importe

                save_id_advance_user: C-zr8h0iji96crde4
                save_p1_cierresTxt: 550.00 Grs
                save_p1_cierre_id_advance: ZrnUOiSXzymvgE71Rle2
                save_p1_cierres_id_advance: t852i8toHvltSEUlBoCY
                save_p2_cierres_origen: cierre
                save_p2_cierres_origen_grs: 55.00 1150.00 8x3N7OncrKhC6R0sVPEM
                save_p3_generar_fino_pza: 55
                save_p3_generar_precio: 1150.00
                save_p3_generar_importe: 63250
                save_p4_generar_pagos: 0
                save_p4_generar_TipoPago: pago
                save_p4_generar_Observaciones: obs 2
                save_p5_generar_saldo: -63750.00

                Cierre / Entregas / Cierres / Pagos

                $this->db->update('tabscierre');
                $this->db->update('tabsentregas');
                $this->db->insert('tabscierres',$cierres_data);          
                $this->db->insert('tabspagos',$tabspagos_data);        
                $this->db->update('saldo');                
        */     

        /********************************************
        *           tabla: cierres                  *
        *********************************************/    
        //------------------------------------------>
        /*
        */
        $cierre_origen_grs = explode(' ',$_POST['save_p2_cierres_origen_grs']);
        $cierre_fino_pz    = $_POST['save_p3_generar_fino_pza'];

            $this->db->set('detail_grs',"detail_grs-$cierre_fino_pz",FALSE);
            $this->db->where('id_advance',$cierre_origen_grs['2']);
                $this->db->update('tabscierre');
        
        //------------------------------------------> 

        /********************************************
        *           tabla: entregas                 *
        *********************************************/
        //------------------------------------------>
        /*        
        */
        $entregas_origen_grs = explode(' ',$_POST['save_p2_cierres_origen_grs']);
        $entregas_fino_pza   = $_POST['save_p3_generar_fino_pza'];
        $entregas_id_advance = $_POST['save_p1_cierre_id_advance'];

            $this->db->set('id_advance_cierre',$entregas_origen_grs['2'],TRUE);
            $this->db->set('id_advance_cierres',$random,TRUE);
            $this->db->set('entregas_fino',"entregas_fino-$entregas_fino_pza",FALSE);
            
                $this->db->where('id_advance',$entregas_id_advance);

                    $this->db->update('tabsentregas');
                   
        //------------------------------------------>  

        /********************************************
        *           tabla: cierres                  *
        *********************************************/    
        //------------------------------------------>  
        /*
        */        
            $cierres_data = array(
                'id_advance'                => random_string('alnum', 20),
                'user_id_advance'           => $_POST['save_id_advance_user'],
                'tabs_id_advance'           => $random,
                'entregas_fecha'            => date("Y-m-d"),
                'cierres_fino'              => $_POST['save_p3_generar_fino_pza'],
                'cierres_precio'            => $_POST['save_p3_generar_precio'],
                'cierres_importe'           => $_POST['save_p3_generar_importe']
            );
            $this->db->insert('tabscierres',$cierres_data);
        
        //------------------------------------------> 

        /********************************************
        *           tabla: pagos                    *
        *********************************************/    
        //------------------------------------------>      
        /*
        */
            $xSa = $_POST['save_p5_generar_saldo'];
            $xT  = $_POST['save_p3_generar_importe'];
            $xP  = $_POST['save_p4_generar_pagos'];

            $xSa = ($xSa) + ($xT) - ($xP);

            $tabspagos_data = array(
                'id_advance'                => random_string('alnum', 20),
                'user_id_advance'           => $_POST['save_id_advance_user'],
                'tabs_id_advance'           => $random,
                'entregas_fecha'            => date("Y-m-d"),

                'pagos_total'               => $_POST['save_p3_generar_importe'],
                'pagos_pagos'               => $_POST['save_p4_generar_pagos'],
                'pagos_tipopagos'           => $_POST['save_p4_generar_TipoPago'],
                'pagos_saldos'              => $xSa,
                'pagos_observaciones'       => $_POST['save_p4_generar_Observaciones']
            );
            
            $this->db->insert('tabspagos',$tabspagos_data);
        
        //------------------------------------------>  

        /********************************************
        *           tabla: saldo                    *
        *********************************************/         
        //------------------------------------------>  
        /*
        */        
            $xTotal = floatval($_POST['save_p5_generar_saldo']);
            $xPago  = floatval($_POST['save_p4_generar_pagos']);
            $x      =$xTotal-$xPago;
            
            $this->db->set('detail_saldo_actual',$xSa,FALSE);
            $this->db->where('detail_id_advance',$_POST['save_id_advance_user']);            
                $this->db->update('saldo');
           
        //------------------------------------------>  
        
        $status[] = array(
            "Ok"      => 101,
            "Cierres" => "Ok",
            "Saldo"   => "Ok",
            "Entregas"=> "Ok",
            "Cierres" => "Ok",
            "Pagos"   => "Ok"
        );
        
        return    $status;
    }
    //--->

    //--->
    function cierresRead()
    {
        $this->db->select('
            `tabscierres`.id,
            `tabscierres`.id_advance,
            `tabscierres`.time,
            `tabscierres`.user_id_advance,
            `tabscierres`.tabs_id_advance,
            `tabscierres`.entregas_fecha,
            `tabscierres`.cierres_fino,
            `tabscierres`.cierres_precio,
            `tabscierres`.cierres_importe,
            `saldo`.detail_saldo AS saldo_saldo,
            `saldo`.detail_saldo_actual AS saldo_saldo_actual,
            `clientes`.email,
            `clientes`.firstname,
            `clientes`.secondname            
        ');        
        $this->db->from('tabscierres');
        $this->db->where('tabscierres.user_id_advance', $_GET['id']);

        $this->db->join('clientes', 'clientes.id_advance     = tabscierres.user_id_advance');
        $this->db->join('saldo'   , 'saldo.detail_id_advance = tabscierres.user_id_advance');

        $this->db->order_by('`tabscierres`.id', 'DESC');

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
                "Message"    => "Error Tabs Cierres",
                "Code"       => 104,
                "Contorller" => "DbTabsCierres",
                "class"      => "DbTabsCierres",
                "fuction"    => "DbTabsCierresRead",
                "id"         => "user"
            );
        }

        return  $data;
    }
    //--->
        
}    