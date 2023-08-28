<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    //--->
    function entregasCreate()
    {
        /*
        save_nolext: 0
        save_grsaf: 0
        save_vale: 101
        save_barra: 150
        save_ley: 12
        save_fino: 75.00
        save_id_advance_user: C-zr8h0iji96crde4
        */
        $random = random_string('alnum', 20);
        $date   = date("Y-m-d");
        $r_id   = random_string('md5', 4);

        $fino_x = $_POST['save_fino'];
                
        $x      = $_POST['save_id_advance_user'];
        $x_type = explode("-", $x);
        if($x_type[0] == "C"){$x_type_value = "clientes";}
        //-------------------------------------------------------------------------> Begin: Pagos

            /********************************************
            *           tabla: metales                  *
            *   'detail_id_advance'  =>
            ********************************************/         
            //------------------------------------------>              
            
            $datax = array(
                'id_advance'         => random_string('sha1', 20),
                'detail_id_advance'  => $random
            );
            
            $this->db->insert('vale', $datax);  
            //------------------------------------------>

            /********************************************
            *           tabla: metales                  *
            ********************************************/         
            //------------------------------------------>  
                //$this->db->set('detail_grs',"detail_grs-$fino_x", FALSE);
                //$this->db->where('id_advance', $_POST['save_id_advance']);
                    //$this->db->update('metales');
            //------------------------------------------>  
            
            /********************************************
            *           tabla: saldo                 *
            ********************************************/         
            //------------------------------------------>  

            //$save_total = $_POST['save_total'];
            //$save_pagos = $_POST['save_pagos'];
            
            
            //$this->db->set('detail_saldo_actual',"detail_saldo_actual+$save_total-$save_pagos", FALSE);
                //$this->db->where('detail_id_advance', $_POST['save_id_advance_user']);
                    //$this->db->update('saldo');
            
            //----//-------------------------------------->  
            
            /********************************************
            *           tabla: entregas                 *
            ********************************************/         
            //------------------------------------------>  
                    /*
            save_id_advance: IOYu05dhEVrLeX6jMFqg
            save_preio: 1238.80
            metales_saldo_actual: 17489.00
            save_nolext: 
            save_grsaf: 
            save_barra: 499.9
            save_ley: 12.58
            save_fino: 262.03
            save_id_advance_user: C-zr8h0iji96crde4
            save_vale: 155
            INSERT INTO `metales_entregas` (
                detail_grs, 
                `id_advance`, `metales_id_advance`, `metales_detail_type`, `metales_detail_id_advance`, `entregas_fecha`, `entregas_no_vale`, `entregas_no_ext`, `entregas_grs_af`, `entregas_barra`, `entregas_ley`, `entregas_fino`) VALUES (detail_grs-262.03, '3d9irV5XhB8m6uL7QFOs', 'IOYu05dhEVrLeX6jMFqg', 'clientes', 'C-zr8h0iji96crde4', '2021-05-10', '155', '', '', '499.9', '12.58', '262.03')
        */
            $metales_entregas_data = array(
                'id_advance'                => $random,
                //'metales_id_advance'        => $_POST['save_id_advance'],
                //'metales_detail_type'       => $x_type_value,
                'user_id_advance'           => $_POST['save_id_advance_user'],
                //'entregas_fecha'            => $date,
                'entregas_no_vale'          => $_POST['save_vale'],
                'entregas_no_ext'           => $_POST['save_nolext'],
                'entregas_grs_af'           => $_POST['save_grsaf'],
                'entregas_barra'            => $_POST['save_barra'],
                'entregas_ley'              => $_POST['save_ley'],
                'entregas_fino'             => $fino_x,
                'entregas_fino_original'    => $fino_x
            );

            $this->db->insert('tabsentregas',$metales_entregas_data);            
            //------------------------------------------>  
            
            /********************************************
            *           tabla: entregas                 *
            ********************************************/         
            //------------------------------------------>  
            /*
            $metales_cierres_data = array(
                'id_advance'                => $random ,
                'metales_id_advance'        => $_POST['save_id_advance'],
                'metales_detail_type'       => $x_type_value,
                'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                'entregas_fecha'            => $date,
                'cierres_fino'              => $fino_x,
                'cierres_precio'            => $_POST['save_preio'],
                'cierres_importe'           => $fino_x*$_POST['save_preio'],
            );
            */
            //$this->db->insert('metales_cierres',$metales_cierres_data);
            //------------------------------------------>  
            
            /********************************************
            *           tabla: pagos                 *
            ********************************************/         
            //------------------------------------------>              
            /*
            $metales_pagos_data = array(
                'id_advance'                => $random ,
                'metales_id_advance'        => $_POST['save_id_advance'],
                'metales_detail_type'       => $x_type_value,
                'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                'entregas_fecha'            => $date,
                'pagos_total'               => $_POST['save_total'],
                'pagos_pagos'               => $_POST['save_pagos'],
                'pagos_saldos'              => $_POST['save_saldo'],
                'pagos_observaciones'       => 0
            );
            */
            //$this->db->insert('metales_pagos',$metales_pagos_data);
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
    function entregasRead()
    {
        $this->db->select('
        `tabsentregas`.id,
        `tabsentregas`.id_advance,
        `tabsentregas`.time,
        `tabsentregas`.user_id_advance,
        `tabsentregas`.entregas_no_vale,
        `tabsentregas`.entregas_no_ext,
        `tabsentregas`.entregas_grs_af,
        `tabsentregas`.entregas_barra,
        `tabsentregas`.entregas_ley,
        `tabsentregas`.entregas_fino,
        `tabsentregas`.entregas_fino_original,
            `saldo`.detail_saldo AS saldo_saldo,
            `saldo`.detail_saldo_actual AS saldo_saldo_actual,
            `clientes`.email,
            `clientes`.firstname,
            `clientes`.secondname            
        ');        
        $this->db->from('tabsentregas');
        $this->db->where('tabsentregas.user_id_advance', $_GET['id']);
        
        $this->db->join('clientes', 'clientes.id_advance     = tabsentregas.user_id_advance');
        $this->db->join('saldo'   , 'saldo.detail_id_advance = tabsentregas.user_id_advance');

        $this->db->order_by('`tabsentregas`.id', 'DESC');

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
                "Message"    => "Error Tabs Entregas",
                "Code"       => 104,
                "Contorller" => "DbTabsEntregas",
                "class"      => "DbTabsEntregas",
                "fuction"    => "DbTabsEntregasRead",
                "id"         => "user"
            );
        }

        return  $data;
    }
    //--->
        
}    