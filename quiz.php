<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$documento=$_POST["documento"];
	$nombre=$_POST["nombres"];
	$apellidos=$_POST["apellidos"];

	try{
		$conexion=new PDO ('mysql:host=sql5.freemysqlhosting.net; dbname=sql5124996', 'sql5124996', 'c2d2UyxQzL');
		$conexion->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");
		$sql="insert into aprendices (documento, nombres, apellidos) values (:doc, :nom, :ape)";
		
		/* eliminar datos
		$sql="delete from aprendices where nombres=:nom";*/

		$resultado=$conexion->prepare($sql);
		$resultado->execute(array(":doc"=>$documento, ":nom"=>$nombre, ":ape"=>$apellidos));
		
		/* eliminar datos
		$resultado->execute(array(":nom"=>$nombre));*/

	$sql="SELECT * FROM aprendices";
		$resultado=$conexion->prepare($sql);
		$resultado->execute();
		while ($registro=$resultado->fetch(PDO::FETCH_ASSOC)){
			
			echo"documento: " .$registro['documento'] . $registro['nombres'] .$registro['apellidos'] ."<br>";
		}
	
	}catch (exception $e){
		die('error: ' . $e->getmessage());
	}
?>
</body>
</html>