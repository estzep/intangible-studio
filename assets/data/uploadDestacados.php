<?php
    // Include the database configuration file
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';

    $newOrden = $_POST["inputOrden"];
    $query = $db->query("SELECT COUNT(*) AS count FROM destacados WHERE orden = ".$newOrden);
    $data = $query->fetch_assoc();
    $count = $data['count'];
    if ($count > 0) {
        $db->query("UPDATE destacados SET orden = orden + 1 WHERE orden >= ".$newOrden." ORDER BY orden DESC");
    }
    $idProyecto = $_POST['inputProyecto'];
    if (isset($_POST["upload"]) && ($idProyecto != "none")) {
        $insert = $db->query("INSERT INTO destacados(orden, proyecto) VALUES (".$newOrden.", '".$idProyecto."')");
        if ($insert) {
            $statusMsg = "El proyecto ha sido destacado exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Hubo un error con la base de datos.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = 'Selecciona un proyecto para subir.';
        $statusType = 'warning';
    }
    header("Location: ../../admin/destacados?status=$statusMsg&type=$statusType");
    exit;
?>