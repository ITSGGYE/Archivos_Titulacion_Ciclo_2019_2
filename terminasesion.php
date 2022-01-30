<?php
	require_once("sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");	
	if( $usuario == false )
	{	
		header("Location: index.php");
	}
	else 
	{
		$usuario = $sesion->get("usuario");	
		$sesion->termina_sesion();	
		?>
		<script type="text/javascript">
window.onload = window.parent.location.href = "index.php";
</script>
	<?php	
		//header("location: login.php");
	}
?>