<?php
    if(
        !isset($_POST["nombrec"])||
        !isset($_POST["fecha"])||
        !isset($_POST["correo"])||
        !isset($_POST["pass"])||
        !isset($_POST["Id"])
    )exit();

    include_once "../bd/base_de_datos.php";

    $Id = $_POST["Id"];
    $nombre = $_POST["nombrec"];
    $fecha = $_POST["fecha"];
    $email = $_POST["correo"];
    $pass = $_POST["pass"];

    $sql = $base_de_datos->prepare("UPDATE usuarios SET nombrec = ?, fecha = ?, correo = ?, pass = ? WHERE Id = ?;");
    $ejecuta = $sql->execute([$nombre, $fecha, $email, $pass, $Id]);

    if($ejecuta == true){
        header("refresh:0; url=menu_bienvenida.php");
    }else{
        echo "<h2>Algo salio mal, verifica que la tabla exista</h2>";
    }