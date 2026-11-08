<?php
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';

    $targetDir = "../projects/";

    if (isset($_POST['remove'])) {
        $id = $_POST['remove'];
        $query = $db->query("SELECT COUNT(*) AS count FROM destacados WHERE proyecto ='".$id."'");
        $data = $query->fetch_assoc();
        $count = $data['count'];
        if (!($count >= 1)) {
            $query = $db->query("SELECT * FROM proyectos WHERE id ='".$id."'");
            $data = $query->fetch_assoc();
            $folder = $data['path'];
            $title = $data['titulo'];
            $imgs = json_decode($data['imagenes'], true);
            $path = $targetDir.$folder;
            for ($i = 1; $i <= sizeof($imgs); $i++) {
                $img = $imgs[$i];
                unlink($path.'/'.$img);
            }
            rmdir($path);

            $db->query("DELETE FROM proyectos WHERE id = '".$id."'");

            $statusMsg = "El proyecto {$title} eliminado exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = 'Elimina el proyecto de Proyectos Destacados antes.';
            $statusType = 'danger';
        }
    } else {
        $statusMsg = 'No se pudo eliminar el proyecto.';
        $statusType = 'danger';
    }
    header("Location: ../../admin/proyectos?status=$statusMsg&type=$statusType");
    exit;
?>