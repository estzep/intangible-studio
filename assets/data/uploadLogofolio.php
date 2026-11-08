<?php
    // Include the database configuration file
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';

    // File upload path
    $targetDir = "../logos/";
    $newOrden = $_POST["inputOrden"];
    $query = $db->query("SELECT COUNT(*) AS count FROM logofolio WHERE orden = ".$newOrden);
    $data = $query->fetch_assoc();
    $count = $data['count'];
    if ($count > 0) {
        $db->query("UPDATE logofolio SET orden = orden + 1 WHERE orden >= ".$newOrden." ORDER BY orden DESC");
    }
    $fileName = basename($_FILES["inputFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    if (isset($_POST["upload"]) && !empty($_FILES["inputFile"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('jpg','png','jpeg','gif', 'svg');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to server
            if (move_uploaded_file($_FILES["inputFile"]["tmp_name"], $targetFilePath)) {
                // Insert image file name into database
                $insert = $db->query("INSERT INTO logofolio(orden, file) VALUES (".$newOrden.", '".$fileName."')");
                if ($insert) {
                    $statusMsg = "El logo ".$fileName." se subio exitosamente!";
                    $statusType = 'success';
                } else {
                    $statusMsg = "Hubo un error al subir la imagen a la base de datos.";
                    $statusType = 'danger';
                } 
            } else {
                $statusMsg = "Hubo un error al subir las imagenes.";
                $statusType = 'danger';
            }
        } else {
            $statusMsg = 'No se pudo subir la imagen. Solo se aceptan imagenes tipo: jpg, jpeg, png, gif, y svg.';
            $statusType = 'danger';
        }
    } else {
        $statusMsg = 'Porfavor selecciona un archivo para subir.';
        $statusType = 'warning';
    }
    header("Location: ../../admin/logos?status=$statusMsg&type=$statusType");
    exit;
?>