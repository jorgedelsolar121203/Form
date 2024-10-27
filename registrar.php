<?php
    include("conexion.php");

    if(
        isset($_POST["dni"]) && strlen($_POST["dni"]) >= 1 &&
        isset($_POST["codigo"]) && strlen($_POST["codigo"]) >= 1 &&
        isset($_POST["nombres"]) && strlen($_POST["nombres"]) >= 1 &&
        isset($_POST["apellidos"]) && strlen($_POST["apellidos"]) >= 1 &&
        isset($_POST["genero"]) && strlen($_POST["genero"]) >= 1 &&
        isset($_POST["telefono"]) && strlen($_POST["telefono"]) >= 1 &&
        isset($_POST["facultad"]) && strlen($_POST["facultad"]) >= 1 &&
        isset($_POST["escuela"]) && strlen($_POST["escuela"]) >= 1 &&
        isset($_POST["email"]) && strlen($_POST["email"]) >= 1 &&
        isset($_POST["password"]) && strlen($_POST["password"]) >= 1
    ) {
        $dni = trim($_POST["dni"]);
        $codigo = trim($_POST["codigo"]);
        $nombres = trim($_POST["nombres"]);
        $apellidos = trim($_POST["apellidos"]);
        $genero = trim($_POST["genero"]);
        $telefono = trim($_POST["telefono"]);
        $facultad = trim($_POST["facultad"]);
        $escuela = trim($_POST["escuela"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $fecha = date("Y-m-d");

        // Insertar los datos
        $consulta = "INSERT INTO datos(dni, codigo, nombres, apellidos, genero, telefono, facultad, escuela, email, password, fecha) 
                     VALUES('$dni', '$codigo', '$nombres', '$apellidos', '$genero', '$telefono', '$facultad', '$escuela', '$email', '$password', '$fecha')";

        $resultado = mysqli_query($conex, $consulta);

        if($resultado){
            echo "Tu registro se ha completado";
        } else {
            echo "Ocurrió un error en el registro.";
        }
    } else {
        echo "Llena todos los campos.";
    }
?>
