<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Querys extends CI_Model
{

    //--->
    function saldoCreate()
    {
        $random = random_string('alnum', 20);
        $date   = date("Y-m-d H:m:s");
        $r_id   = random_string('md5', 4);

        //-------------------------------------------------------------------------> Begin: Pagos

            //id id_advance time detail_id_advance detail_time_update detail_saldo detail_saldo_actual
        /*
            id_advance      : U-03fb5ca7539c770b6b
            save_id_advance : C-zr8h0iji96crde4
            generar_fecha_saldo : 2021-04-01
            generar_saldo_saldo : 1000
        */
            
            $metales_pagos_data = array(
                'id_advance'            => random_string('sha1', 20),
                'detail_id_advance'     => $_POST['save_id_advance'],
                'detail_time_update'    => $_POST['generar_fecha_saldo'],
                'detail_saldo'          => $_POST['generar_saldo_saldo'],
                'detail_saldo_actual'   => $_POST['generar_saldo_saldo']
            );

            $this->db->insert('saldo',$metales_pagos_data);
            
        //-------------------------------------------------------------------------> End:   Pagos
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
    function metalesdetallesRead()
    {
        $this->db->select('
            `metales`.id                  AS m_id,
            `metales`.id_advance          AS m_id_advance,
            `metales`.time                AS m_time,
            `metales`.detail_type         AS m_detail_type,
            `metales`.detail_id_advance   AS m_detail_id_advance,
            `metales`.detail_fecha        AS m_detail_fecha,
            `metales`.detail_status       AS m_detail_status,
            `metales`.detail_tipo         AS m_detail_tipo,
            `metales`.detail_grs_original AS m_detail_grs_original,
            `metales`.detail_grs          AS m_detail_grs,
            `metales`.detail_precio       AS m_detail_precio
        ');
        $this->db->from('metales');
        //$this->db->join('saldo', 'saldo.detail_id_advance = metales.detail_id_advance');
        $this->db->where('metales.detail_id_advance', $_GET['id']);
        $this->db->like('metales.`time`',Date("Y-m-"));
        $this->db->order_by('`metales`.id', 'DESC');

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
                "Message"    => "Error Cierres",
                "Code"       => 104,
                "Contorller" => "metalesdetalles",
                "class"      => "metalesdetalles",
                "fuction"    => "metalesdetallesRead",
                "id"         => "cierres"
            );
        }

        return  $data;
    }
    //--->

    //--->
    function metalesReadEntregas()
    {
        /*
            SELECT
            metales_entregas.id,
            metales_entregas.id_advance,
            metales_entregas.time,
            metales_entregas.metales_id_advance,
            metales_entregas.metales_detail_id_advance,
            metales_entregas.entregas_fecha,
            metales_entregas.entregas_no_vale,
            metales_entregas.entregas_no_ext,
            metales_entregas.entregas_grs_af,
            metales_entregas.entregas_barra,
            metales_entregas.entregas_ley,
            metales_entregas.entregas_fino,
            metales.id AS m_id,
            metales.id_advance AS m_id_advance
            FROM
            metales_entregas
            JOIN metales ON metales.id_advance = metales_entregas.metales_id_advance
            WHERE
            metales_entregas.metales_detail_id_advance = 'C-zr8h0iji96crde4'
            ORDER BY
            metales_entregas.id DESC
        */        
        $this->db->select('        
        `metales_entregas`.id,
        `metales_entregas`.id_advance,
        `metales_entregas`.time,
        `metales_entregas`.metales_detail_type,
        `metales_entregas`.metales_detail_id_advance,
        `metales_entregas`.entregas_fecha,
        `metales_entregas`.entregas_no_vale,
        `metales_entregas`.entregas_no_ext,
        `metales_entregas`.entregas_grs_af,
        `metales_entregas`.entregas_barra,
        `metales_entregas`.entregas_ley,
        `metales_entregas`.entregas_fino
        ');
        /*
        ,
        `metales`.id         AS id_metales,
        `metales`.id_advance AS id_advance_metales
        */
        $this->db->from('metales_entregas');
        //$this->db->join('metales', 'metales.id_advance = `metales_entregas`.metales_id_advance');
        $this->db->where   ("`metales_entregas`.metales_detail_id_advance",$_GET['id']);
        $this->db->order_by("`metales_entregas`.id", "DESC");

        $query = $this->db->get();
        $row = $query->row_array();

        //---A
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        } else {
            $date   = date("Y-m-d H:m:s");
            $data[] = array(
                "Time"       => $date,
                "Message"    => "Error Entregas",
                "Code"       => 104,
                "Contorller" => "metalesdetalles",
                "class"      => "metalesdetalles",
                "fuction"    => "metalesReadEntregas",
                "id"         => "entregas"
            );
        }

        return  $data;
    }
    //--->

    //--->
    function metalesReadCierres()
    {

        $this->db->select  ('        
            metales_cierres.id,
            metales_cierres.id_advance,
            metales_cierres.time,
            metales_cierres.metales_id_advance,
            metales_cierres.metales_detail_id_advance,
            metales_cierres.entregas_fecha,
            metales_cierres.cierres_fino,
            metales_cierres.cierres_precio,
            metales_cierres.cierres_importe,
            metales.id         AS m_id,
            metales.id_advance AS m_id_advance,
            metales.detail_precio');
        $this->db->from    ('metales_cierres');
        $this->db->join    ('metales', 'metales.id_advance = metales_cierres.metales_id_advance');
        $this->db->where   ('`metales_cierres.metales_detail_id_advance',$_GET['id']);
        $this->db->order_by('`metales_cierres`.id','DESC');
        
        //----->
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){$data[] = $row;}
            }else{
                $date   = date("Y-m-d H:m:s");
                $data[] = array(
                    "Time"       => $date,
                    "Message"    => "Error Cierres dos",
                    "Code"       => 104,
                    "Contorller" => "metalesdetalles",
                    "class"      => "metalesdetalles",
                    "fuction"    => "metalesReadCierres",
                    "id"         => "cierresdos"
                );
                }
        //----->

        return  $data;
    }
    //---> 

    //--->
    function metalesReadPagos()
    {
        $this->db->select  ('        
            metales_pagos.id,
            metales_pagos.id_advance,
            metales_pagos.time,
            metales_pagos.metales_id_advance,
            metales_pagos.metales_detail_id_advance,
            metales_pagos.entregas_fecha,
            metales_pagos.pagos_total,
            metales_pagos.pagos_pagos,
            metales_pagos.pagos_saldos,
            metales_pagos.pagos_observaciones
            ');
        $this->db->from    ('metales_pagos');
        //$this->db->join    ('metales', 'metales.id_advance = metales_pagos.metales_id_advance');
        //$this->db->where   ('`metales_pagos.metales_detail_id_advance',$_GET['id']);
        $this->db->where   ('`metales_pagos.metales_id_advance',$_GET['id']);
        $this->db->order_by('`metales_pagos`.id','DESC');
        
        //----->
        $query = $this->db->get();
        $row = $query->row_array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){$data[] = $row;}
            }else{
                $date   = date("Y-m-d H:m:s");
                $data[] = array(
                    "Time"       => $date,
                    "Message"    => "Error Cierres dos",
                    "Code"       => 104,
                    "Contorller" => "metalesdetalles",
                    "class"      => "metalesdetalles",
                    "fuction"    => "metalesReadCierres",
                    "id"         => "pagos"
                );
                }
        //----->

        return  $data;
    }
    //---> 

    //--->
    function metalesReadOne()
    {
        /*
            // 20210329172648
            // http://localhost/server/DevOps/GoldenTradeValue/GoldenTradeValue-API/index.php/metalesdetalles/readerdata/?type=one&id=Un6jmxDklzUwyJBGbw9r

            [
            {
                "id": "2",
                "id_advance": "Un6jmxDklzUwyJBGbw9r",
                "time": "2021-03-24 01:01:31",
                "detail_type": "clientes",
                "detail_id_advance": "C-zr8h0iji96crde4",
                "firstname": "jorge",
                "secondname": "garibaldo",
                "detail_fecha": "2021-03-24 01:01:31",
                "detail_status": "abierto",
                "detail_tipo": "compra",
                "detail_metal": "oro",
                "detail_grs": "96.65",
                "detail_precio": "1255.00",
                "detail_saldo": "0.00"
            }
            ]
        */        
 
        $this->db->select('
        metales.id,
        metales.id_advance,
        metales.time,
        metales.detail_type,
        metales.detail_id_advance,
        metales.detail_fecha,
        metales.detail_status,
        metales.detail_tipo,
        metales.detail_metal,
        metales.detail_grs_original,
        metales.detail_grs,
        metales.detail_precio,
        saldo.detail_saldo AS saldo_saldo,
        saldo.detail_saldo_actual AS saldo_saldo_actual,
        clientes.email,
        clientes.firstname,
        clientes.secondname,
        metales_entregas.entregas_fino
        ');
        $this->db->from('metales');
        $this->db->join('clientes', 'clientes.id_advance     = metales.detail_id_advance');
        $this->db->join('metales_entregas', 'metales_entregas.metales_id_advance = metales.id_advance');
        $this->db->join('saldo'   , 'saldo.detail_id_advance = metales.detail_id_advance');


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
    
    //--->
    function metaleSaldoBase()
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
        */        
 
        $this->db->select('Count(saldo.id) AS saldo');
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
    //--->

    //--->
    function metaleSaldoActual()
    {
        $this->db->select("
        `metales_pagos`.id,
        `metales_pagos`.id_advance,
        `metales_pagos`.time,
        `metales_pagos`.pagos_saldos AS saldo
        ");
        
        $this->db->from("metales_pagos");
        $this->db->order_by("`metales_pagos`.id","DESC");
        $this->db->limit(1); 

        $query = $this->db->get();
        $row = $query->row_array();

        //---A)
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
        } else {
            $data[] = array("Error"  => 104,"Saldo Actual" => "Error");
        }

        return  $data;
    }    
    //--->

    //----------------------------------------------------------------------> Metales create 
        /********************************************
        *                   CRUD                    *
        *               Metales Unico               *
        ********************************************/
        //--->v
        function metalesCreate()
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
                /*
                $datax = array(
                    'id_advance'         => random_string('sha1', 20),
                    'detail_id_advance'  => $_POST['save_id_advance']
                );
                */
                //$this->db->insert('vale', $datax);  
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
                    'metales_detail_type'       => $x_type_value,
                    'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                    'entregas_fecha'            => $date,
                    'entregas_no_vale'          => $_POST['save_vale'],
                    'entregas_no_ext'           => $_POST['save_nolext'],
                    'entregas_grs_af'           => $_POST['save_grsaf'],
                    'entregas_barra'            => $_POST['save_barra'],
                    'entregas_ley'              => $_POST['save_ley'],
                    'entregas_fino'             => $fino_x
                );

                $this->db->insert('metales_entregas',$metales_entregas_data);            
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
        //--->v
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
            */

            $xSa = $_POST['generarSaldo'];
            $xT  = $_POST['generarPagoTotal'];
            $xP  = $_POST['generarPago'];

            $xSa = ($xSa) + ($xT) - ($xP);

            $metales_pagos_data = array(
                'id_advance'                => $random,
                'entregas_fecha'            => $date,
                'metales_id_advance'        => $_POST['save_id_advance_user'],
                'pagos_total'               => $_POST['generarPagoTotal'],
                'pagos_pagos'               => $_POST['generarPago'],
                'pagos_tipopagos'           => $_POST['generarTipoPago'],
                'pagos_saldos'              => $xSa,
                'pagos_observaciones'       => $_POST['generarObservaciones']
            );
            
            $this->db->insert('metales_pagos',$metales_pagos_data);

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
    //----------------------------------------------------------------------> Metales create 


    //----------------------------------------------------------------------> Metales create unico
        /********************************************
        *                   CRUD                    *
        *               Metales Unico               *
        ********************************************/
        //--->
        function metalesCreateUnico()
        {
            /*
            eu_id_advance_x: C-zr8h0iji96crde4
            eu_nvale: 116
            eu_nolext: 1983
            eu_grsaf: 0
            eu_grs: 100
            eu_ley: 24
            eu_fino: 100.00
            eu_precio: 1347.15
            eu_finopza: 100.00
            eu_importe: 134715.00
            eu_pagos: 100000
            eu_tota: 134715.00
            eu_saldo: 90663.00    
            */
            //print_r($_POST);

            $random_x = random_string('alnum', 20);
            $date     = date("Y-m-d");
            $r_id     = random_string('md5', 4);

            if($_POST['eu_finopza'] > 0){
                $fino_x = $_POST['eu_finopza'];
            }else{
                $fino_x = $_POST['eu_fino'];
            }
            $save_total = $_POST['eu_tota'];
            $save_pagos = $_POST['eu_pagos'];
            //-------------------------------------------------------------------------> Begin: Pagos

                //#	ID Cierre	Fecha	Total	Pagos	Saldo	Observaciones
        
                /********************************************
                *           tabla: metales                  *
                ********************************************/         
                //------------------------------------------>  
                    /*    
                    $random          = random_string('alnum', 20);
                    $randomIdAdvance = random_string('alnum', 20);
                    */
                    $r_id   = random_string('md5', 4);
                    
                    $grs    = floatval($_POST['eu_finopza']);
                    $precio = floatval($_POST['eu_precio']);
            
                    $saldo  = $grs * $precio;
                    //------------------------------------->
                    $random          = random_string('alnum', 20);
                    $x      = $_POST['eu_id_advance_x'];
                    $x_type = explode("-", $x);
                    if($x_type[0] == "C"){
                        $x_type_value = "clientes";
                    }         

                    $metales_id_advance       = random_string('alnum', 20);
                    $metalesdetail_type       = $x_type_value;
                    $metalesdetail_id_advance = $_POST['eu_id_advance_x'];
                    $metalesdetail_fecha      = date("Y-m-d H:m:s");
                    //------------------------------------->
                    
                    $data = array(
                    'id_advance'           => $metales_id_advance,
                    'detail_type'          => $metalesdetail_type,
                    'detail_id_advance'    => $metalesdetail_id_advance,
                    'detail_fecha'         => $date,

                    'detail_status'        => 'cerrado',
                    'detail_tipo'          => 'compra',
                    'detail_metal'         => 'oro',
                    'detail_grs_original'  => $_POST['eu_grs'],
                    'detail_grs'           => $_POST['eu_grs'],
                    'detail_precio'        => $_POST['eu_precio']
                    );
                    $this->db->insert('metales', $data); 
                //------------------------------------------>  
                /********************************************
                *           tabla: metales                  *
                *   'detail_id_advance'  =>
                ********************************************/         
                //------------------------------------------>              
                $datax = array(
                    'id_advance'         =>  random_string('alnum', 20),
                    'detail_id_advance'  =>  $metales_id_advance
                );
                $this->db->insert('vale', $datax);  
                //------------------------------------------>
            
                /********************************************
                *           tabla: saldo                 *
                ********************************************/         
                //------------------------------------------>  
                $save_total = $_POST['eu_tota'];
                $save_pagos = $_POST['eu_pagos'];
                
                $this->db->set('detail_saldo_actual',"detail_saldo_actual+$save_total-$save_pagos", FALSE);
                    $this->db->where('detail_id_advance',$metalesdetail_id_advance);
                        $this->db->update('saldo');
                //------------------------------------------>  
            

                /********************************************
                *           tabla: entregas                 *
                ********************************************/         
                //------------------------------------------>
                /*
                $metales_id_advance       => C-zr8h0iji96crde4
                $metalesdetail_type       => cliente -> C- "cliente"
                $metalesdetail_id_advance => id_advance -> tabla metales
                */
                $metales_entregas_data = array(
                    'id_advance'                => $random,
                    'metales_id_advance'        => $metales_id_advance,
                    'metales_detail_type'       => $metalesdetail_type,
                    'metales_detail_id_advance' => $metalesdetail_id_advance,
                    'entregas_fecha'            => $date,
                    'entregas_no_ext'           => $_POST['eu_nolext'],
                    'entregas_grs_af'           => $_POST['eu_grsaf'],
                    'entregas_barra'            => $_POST['eu_grs'],
                    'entregas_ley'              => $_POST['eu_ley'],
                    'entregas_fino'             => $_POST['eu_finopza']
                );
                
                $this->db->insert('metales_entregas',$metales_entregas_data);            
                //------------------------------------------>  
                
                /********************************************
                *           tabla: entregas                 *
                ********************************************/         
                //------------------------------------------>
    
                $metales_cierres_data = array(
                    'id_advance'                => $random,
                    'metales_id_advance'        => $metales_id_advance,
                    'metales_detail_type'       => $metalesdetail_type,
                    'metales_detail_id_advance' => $metalesdetail_id_advance,
                    'entregas_fecha'            => $date,
                    'cierres_fino'              => $_POST['eu_fino'],
                    'cierres_precio'            => $_POST['eu_precio'],
                    'cierres_importe'           => $_POST['eu_fino']*$_POST['eu_precio'],
                );
                
                $this->db->insert('metales_cierres',$metales_cierres_data);
                //------------------------------------------>  

                /********************************************
                *           tabla: pagos                 *
                ********************************************/         
                //------------------------------------------>  

                $metales_pagos_data = array(
                    'id_advance'                => $random,
                    'metales_id_advance'        => $metales_id_advance,
                    'metales_detail_type'       => $metalesdetail_type,
                    'metales_detail_id_advance' => $metalesdetail_id_advance,
                    'entregas_fecha'            => $date,
                    'pagos_total'               => $_POST['eu_tota'],
                    'pagos_pagos'               => $_POST['eu_pagos'],
                    'pagos_saldos'              => $_POST['eu_saldo'],
                    'pagos_observaciones'       => 0
                );
            
                $this->db->insert('metales_pagos',$metales_pagos_data);
                //------------------------------------------>              

            //-------------------------------------------------------------------------> End:   Pagos
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
    //----------------------------------------------------------------------> Metales create unico

    //----------------------------------------------------------------------> Metales create multiple
        /********************************************
        *                   CRUD                    *
        *               Metales Detalles            *
        ********************************************/
            //--->
            function metalesCreateMultiple()
            {
                $random20 = random_string('alnum', 20);
                $date     = date("Y-m-d");
                $x      = $_POST['id_advance'];
                $x_type = explode("-", $x);
                if($x_type[0] == "C"){$x_type_value = "clientes";}
                
                /*
                    id_advance: C-zr8h0iji96crde4
                    idEntrega: vHg5kQlNpBbo9j4JVmwc
                    emFinos[]: 88.88
                    emPrecio[]:  1317.20 
                    emImporte[]:  117072.74 
                    emTotal[]:  117072.74 
                    emPagos[]: 0
                    emSaldo[]: 251787.74
                    emObservaciones[]: observaciones 1

                        saldo       -> update
                        cierres     -> update 
                        entregas    -> update
                        cierres dos -> insert
                        pagos       -> insert

                cierres       -> fino,precio,importe
                pagos         ->total, pagos, saldo
                observaciones -> observaciones
                */
                
                $emTotal         = $_POST['emTotal'];
                $emPagos         = $_POST['emPagos'];
                $emSaldo         = $_POST['emSaldo'];
                $emObservaciones = $_POST['emObservaciones'];

                $emFinos         = $_POST['emFinos'];
                $emPrecio        = $_POST['emPrecio'];
                $emImporte       = $_POST['emImporte'];

                /********************************************
                *           tabla: metales                  *
                ********************************************/         
                //------------------------------------------>  
                $ycount = count($emTotal)-1;
                for ($i = 0; $i <= $ycount; $i++) {
                    $this->db->set('detail_grs',"detail_grs-$emFinos[$i]", FALSE);
                    $this->db->where('id_advance', $_POST['idEntrega']);
                        $this->db->update('metales');
                }

                //------------------------------------------>  
                
                /********************************************
                *           tabla: saldo                 *
                ********************************************/         
                //------------------------------------------>  
                $ycount = count($emTotal)-1;
                for ($i = 0; $i <= $ycount; $i++) {
                    $this->db->set('detail_saldo_actual',"detail_saldo_actual+$emTotal[$i]-$emPagos[$i]", FALSE);
                    $this->db->where('detail_id_advance',$_POST['id_advance']);
                        $this->db->update('saldo');
                }

                //CIERRES
                //------------------------------------------------>
                /*
                    id_advance
                    
                    metales_id_advance

                    metales_detail_type
                    metales_detail_id_advance

                    entregas_fecha

                    cierres_fino
                    cierres_precio
                    cierres_importe
                */
                $ycount = count($emTotal)-1;
                for ($i = 0; $i <= $ycount; $i++) {
                    $cierres[] = array(
                        'id_advance'                 => random_string('alnum', 20),
                        'metales_id_advance'         => $_POST['idEntrega'],
                        'metales_detail_type'        => 'clientes',
                        'metales_detail_id_advance'  => $_POST['id_advance'],
                        'entregas_fecha'             => $date, 
                        'cierres_fino'               => str_replace(' ', '',$emFinos[$i]),
                        'cierres_precio'             => str_replace(' ', '',$emPrecio[$i]),
                        'cierres_importe'            => str_replace(' ', '',$emImporte[$i])
                    );
                }
                
                $this->db->insert_batch('metales_cierres',$cierres);
                //------------------------------------------------>

                //PAGOS
                //------------------------------------------------>
                $ycount = count($emTotal)-1;
                for ($i = 0; $i <= $ycount; $i++) {
                    $pagos[] = array(
                        'id_advance'                 => random_string('alnum', 20),
                        'metales_id_advance'         => $_POST['idEntrega'],
                        'metales_detail_type'        => 'clientes',
                        'metales_detail_id_advance'  => $_POST['id_advance'],
                        'entregas_fecha'             => $date, 
                        'pagos_total'                => str_replace(' ', '',$emTotal[$i]),
                        'pagos_pagos'                => str_replace(' ', '',$emPagos[$i]),
                        'pagos_saldos'               => str_replace(' ', '',$emSaldo[$i]),
                        'pagos_observaciones'        => $emObservaciones[$i]
                    );
                }
                
                $this->db->insert_batch('metales_pagos',$pagos);
                //------------------------------------------------>

                $status[] = array(
                    "Ok"              => 101,
                    "Metales Detalle" => "Ok",
                    "Cierres"         => "Ok",
                    "Saldo"           => "Ok",
                    "Entregas"        => "Ok",
                    "Cierres"         => "Ok",
                    "Pagos"           => ""
                );
                return    $status;
            }
            //--->
        //------------------------------------------->


        //----------------------------------------------------------------------> Metales create 
            /********************************************
            *                   CRUD                    *
            *               Metales Unico               *
            ********************************************/
            //--->
            function cierreSimpleCreate(){

                /*
                    save_id_advance: SJNLCu2XWdzfonIZlxhV
                    save_id_advance_user: C-zr8h0iji96crde4
                    input_cs_fino          :  2.55
                    input_cs_precio        : $ 1347.15
                    input_cs_importe       : 3435.23
                    input_cs_total         : 3435.23
                    input_cs_pagos         :  0
                    input_cs_saldo         : 3435.23
                    input_cs_observaciones :  demo 1
                */
                $random = random_string('alnum', 20);
                $date   = date("Y-m-d");
                $r_id   = random_string('md5', 4);

                $fino_x = $_POST['input_cs_fino'];
                        
                $x      = $_POST['save_id_advance_user'];
                $x_type = explode("-", $x);
                if($x_type[0] == "C"){$x_type_value = "clientes";}
                //-------------------------------------------------------------------------> Begin: Pagos



                    /********************************************
                    *           tabla: metales                  *
                    ********************************************/         
                    //------------------------------------------>  
                    $this->db->set('detail_grs',"detail_grs-$fino_x", FALSE);
                        $this->db->where('id_advance', $_POST['save_id_advance']);
                            $this->db->update('metales');
                    //------------------------------------------>  
                    
                    /********************************************
                    *           tabla: saldo                 *
                    ********************************************/         
                    //------------------------------------------>  

                    $save_total = $_POST['input_cs_total'];
                    $save_pagos = $_POST['input_cs_pagos'];
                    
                    $this->db->set('detail_saldo_actual',"detail_saldo_actual+$save_total-$save_pagos", FALSE);
                        $this->db->where('detail_id_advance', $_POST['save_id_advance_user']);
                            $this->db->update('saldo');
                    
                    //-------------------------------------->  
                    
                    /********************************************
                    *           tabla: entregas                 *
                    ********************************************/         
                    //------------------------------------------>  
                    /*
                    $metales_entregas_data = array(
                        'id_advance'                => $random,
                        'metales_id_advance'        => $_POST['save_id_advance'],
                        'metales_detail_type'       => $x_type_value,
                        'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                        'entregas_fecha'            => $date,
                        'entregas_no_vale'          => $_POST['save_vale'],
                        //'entregas_no_ext'           => $_POST['save_nolext'],
                        'entregas_no_ext'           => 0,
                        //'entregas_grs_af'           => $_POST['save_grsaf'],
                        'entregas_grs_af'           => $_POST['save_grsaf'],
                        'entregas_barra'            => $_POST['save_barra'],
                        'entregas_ley'              => $_POST['save_ley'],
                        'entregas_fino'             => $fino_x
                    );
                    */
                    //$this->db->insert('metales_entregas',$metales_entregas_data);            
                    //------------------------------------------>  
                    
                    /********************************************
                    *           tabla: entregas                 *
                    ********************************************/         
                    //------------------------------------------>  
                    $metales_cierres_data = array(
                        'id_advance'                => $random ,
                        'metales_id_advance'        => $_POST['save_id_advance'],
                        'metales_detail_type'       => $x_type_value,
                        'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                        'entregas_fecha'            => $date,
                        'cierres_fino'              => $fino_x,
                        'cierres_precio'            => $_POST['input_cs_importe'],
                        'cierres_importe'           => $fino_x*$_POST['input_cs_importe'],
                    );

                $this->db->insert('metales_cierres',$metales_cierres_data);
                    //------------------------------------------>  
                    
                    /********************************************
                    *           tabla: pagos                 *
                    ********************************************/         
                    //------------------------------------------>              
                    $metales_pagos_data = array(
                        'id_advance'                => $random,
                        'metales_id_advance'        => $_POST['save_id_advance'],
                        'metales_detail_type'       => $x_type_value,
                        'metales_detail_id_advance' => $_POST['save_id_advance_user'],
                        'entregas_fecha'            => $date,
                        'pagos_total'               => $_POST['input_cs_total'],
                        'pagos_pagos'               => $_POST['input_cs_pagos'],
                        'pagos_saldos'              => $_POST['input_cs_saldo'],
                        'pagos_observaciones'       => $_POST['input_cs_observaciones']
                    );
                    $this->db->insert('metales_pagos',$metales_pagos_data);
                    //------------------------------------------>              

                    /********************************************
                    *           tabla: metales                  *
                    *   'detail_id_advance'  =>
                    ********************************************/         
                    //------------------------------------------>              
                    $dataVale = array(
                        'id_advance'         => random_string('alnum', 20),
                        'detail_id_advance'  => $random
                    );
                    $this->db->insert('vale',$dataVale);  
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
        //----------------------------------------------------------------------> Metales create 
        
}