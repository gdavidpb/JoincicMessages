<!DOCTYPE html>
<head>
<meta charset="utf-8" >
<title>Mensaje TextVeloper </title>
</head>	
<body>
 Mensaje <br>
 <form>
	<textarea name="mensajes" id="mensajes" value="mensajes" rows="6" maxlength="140"></textarea>
	<br>
	<button type="submit">Enviar</button>
 </form>
	<br>
<?php
if(isset($_REQUEST['mensajes']))
{
	$mensaje = $_REQUEST['mensajes'];

	include 'api_client/textveloper.api.client.php';
	
		$link=mysql_connect("localhost","root","123456");
		
		mysql_select_db("pruebasms",$link) OR DIE ("Error: No es posible establecer la conexión");
		
		$numerotlf=mysql_query("select telefono from participantes",$link);
	
		while($fila=mysql_fetch_assoc($numerotlf))
		{
			$sms = new api();
			$parameters = array();
			$parameters['cuenta_token'] = '0f0e8682057a87d03db1c5f0364ddcd0';
			$parameters['subcuenta_token'] = '6b47ba41e5fa76d15c6e2734eb99cbf2';
			$parameters['telefono'] = $fila['telefono'];
			$parameters['mensaje'] = $mensaje;
			$sms->enviar($parameters,true);
			// true:  Si deseas mostrar la respuesta en formato JSON que retorna la solicitud
			// false: Si no deseas mostrar  la respuesta en formato JSON que retorna la solicitud
		}
}			
?>
</html>