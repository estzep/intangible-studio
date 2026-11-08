<?php
    // Include the database configuration file
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';
    
    if (isset($_POST['remove'])) {
        if(isset($_POST['checkboxRemove']) && is_array($_POST['checkboxRemove']) ) {
            foreach($_POST['checkboxRemove'] as $targetOrden) {
                $query = $db->query("SELECT * FROM destacados WHERE orden = ".$targetOrden);
                $data = $query->fetch_assoc();
                $idProyecto = $data['proyecto'];

                $db->query("DELETE FROM destacados WHERE orden = '".$targetOrden."'");

                $sQuery = $db->query("SELECT * FROM proyectos WHERE id = ".$idProyecto);
                $sData = $sQuery->fetch_assoc();
                $title = $sData['titulo'];
                $statusMsg = "{$title}, ";
            }
            foreach ($_POST['checkboxRemove'] as $targetOrden) {
                $db->query("UPDATE destacados SET orden = orden - 1 WHERE orden >= ".$targetOrden." ORDER BY orden ASC");
            }
            $statusMsg = "Los proyectos: {$statusMsg} fueron eliminados de destacados exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Hubo un error con los elementos eliminados.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = "Hubo un error con el formulario.";
        $statusType = 'danger';
    }
    header("Location: ../../admin/destacados?status=$statusMsg&type=$statusType");
    exit;
?>