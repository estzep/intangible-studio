<?php
    // Include the database configuration file
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';
    
    $targetDir = "../logos/";
    if (isset($_POST['remove'])) {
        if(isset($_POST['checkboxRemove']) && is_array($_POST['checkboxRemove']) ) {
            foreach($_POST['checkboxRemove'] as $targetOrden) {
                $query = $db->query("SELECT file FROM logofolio WHERE orden = '".$targetOrden."'");
                $data = $query->fetch_assoc();
                $file = $data['file'];

                $query = $db->query("SELECT COUNT(*) AS count FROM logofolio WHERE file ='".$file."'");
                $data = $query->fetch_assoc();
                $count = $data['count'];
                if ($count==1) {
                    unlink($targetDir.$file);
                }

                $db->query("DELETE FROM logofolio WHERE orden = '".$targetOrden."'");

                $statusMsg = "{$file}, ";
            }
            foreach ($_POST['checkboxRemove'] as $targetOrden) {
                $db->query("UPDATE logofolio SET orden = orden - 1 WHERE orden >= ".$targetOrden." ORDER BY orden ASC");
            }
            $statusMsg = "Los logos: {$statusMsg} fueron eliminados exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Hubo un error con los elementos eliminados.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = "Hubo un error con el formulario.";
        $statusType = 'danger';
    }
    header("Location: ../../admin/logos?status=$statusMsg&type=$statusType");
    exit;
?>