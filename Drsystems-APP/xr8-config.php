<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */

//Fecha
date_default_timezone_set('America/Mexico_City');
//echo 'Fecha/hora actual: ', date('Y-m-d h:i:s', time());

$a_ngrok = explode(".", $_SERVER['HTTP_HOST']);

define("GTV","golden trade value");

//Local o Web
if ($_SERVER['HTTP_HOST'] == 'localhost') {
  define("ZONA", 'local');
  define("PAGETITLE", 'Local : ');
} elseif ($a_ngrok['1'] == 'ngrok') {
  define("ZONA",'ngrok');
  define("PAGETITLE", 'Local Ngrok: ');
} else {
  define("ZONA", 'web');
  define("PAGETITLE", 'Remote : ');
}

//Config Local o Web
if (ZONA == "local") {
  //----->
  define("TITLE", PAGETITLE . "Dr. Systems v1 - ");

  define("BASE_URL", '//' . $_SERVER['HTTP_HOST'] . '/server/2023/Dr-systems/');

  define("APP_URL", BASE_URL . "Drsystems-APP/");
  define("API_URL", BASE_URL . "Drsystems-API/");
  define("CDN_URL", BASE_URL . "Drsystems-CDN/Drsystems-CDN-app/");

  define("INDEX_PAGE", APP_URL . 'index.php/');
  define("DEFAULTROUTER", 'login/sign_in');

  define("HOSTNAME", '107.180.40.108');
  define("USERNAME", 'mxaifafbo');
  define("PASSWORD", 'mxaifafbo2023');
  define("DATABASE", 'aifafbomx_db');
  //----->
} else if (ZONA == "ngrok") {

  //----->
  /*
            define("TITLE", PAGETITLE ." Money ngrok - ");

            define("BASE_URL", '//'.$_SERVER['HTTP_HOST'].'/server/DevOps/GoldenTradeValue/');
            
              define("APP_URL",BASE_URL."GoldenTradeValue-APP/");
              define("API_URL",BASE_URL."GoldenTradeValue-API/");
              define("CDN_URL",BASE_URL."GoldenTradeValue-CDN-app/");
              
              define("INDEX_PAGE", APP_URL.'index.php/');
              define("DEFAULTROUTER", 'user/login');

              define("HOSTNAME", 'labs26.com');
              define("USERNAME", 'labs26');
              define("PASSWORD", '12345aeiou');
              define("DATABASE", 'labs26');
              */
  //----->

} else {
  //----->
  define("TITLE", PAGETITLE . "Dr. Systems v1 - ");

  define("BASE_URL", '//' . $_SERVER['HTTP_HOST'] . '/server/2023/Dr-systems/');

  define("APP_URL", BASE_URL . "Drsystems-APP/");
  define("API_URL", BASE_URL . "Drsystems-API/");
  define("CDN_URL", BASE_URL . "Drsystems-CDN/Drsystems-CDN-app/");

  define("INDEX_PAGE", APP_URL . 'index.php/');
  define("DEFAULTROUTER", 'login/sign_in');

  define("HOSTNAME", '107.180.40.108');
  define("USERNAME", 'mxaifafbo');
  define("PASSWORD", 'mxaifafbo2023');
  define("DATABASE", 'aifafbomx_db');
  //----->
}