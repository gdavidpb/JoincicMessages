<?php

class Textveloper {

    var $post_url  = '';
    var $display   = '';
    var $url       = '';
    var $post_data = '';
    var $result    = '';
    var $return    = '';
	var $domain    = 'http://api.textveloper.com/';
	
    /* @parameter1 = cuenta_token
     * @parameter2 = subcuenta_token
     * @parameter3 = telefono
     * @parameter4 = mensaje
     */

    function enviar($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/enviar/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    /* @parameter1 = cuenta_token
     * @parameter2 = subcuenta_token
     */

    function historial_envios($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/historial-envios/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    /* @parameter1 = cuenta_token */

    function saldo_cuenta($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/saldo-cuenta/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    /* @parameter1 = cuenta_token
     * @parameter2 = subcuenta_token
     */

    function saldo_subcuenta($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/saldo-subcuenta/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    /* @parameter1 = cuenta_token */

    function historial_transferencias($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/historial-transferencias/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    /* @parameter1 = cuenta_token */

    function historial_compras($parameters, $show_results = false) 
    {
        $this->url       =  $this->domain.'/historial-compras/';
        $this->display   =  $show_results;
        $this->post_data =  $parameters;
        $this->makeCurl();
    }

    private function makeCurl() 
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_BINARYTRANSFER, 1);
        curl_setopt($curl, CURLOPT_URL, $this->url);
        curl_setopt($curl, CURLOPT_POST, 3);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $this->post_data);

        $this->result = curl_exec($curl);
        curl_close($curl);

        if ($this->display) 
        {
            echo $this->result;
        }
    }

}





?>