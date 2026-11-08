<?php
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';
    $updates = array();

    if(isset($_POST['update']) && is_array($_POST['ordenUpdate']) ) {
        $arrayUpdate = $_POST['ordenUpdate'];
        if (count($arrayUpdate) == count(array_unique($arrayUpdate))) {
            $n = 1;
            foreach($_POST['ordenUpdate'] as $newOrden) {
                if (!($n == $newOrden)) {
                    $query = $db->query("SELECT * FROM destacados WHERE orden = ".$n);
                    $data = $query->fetch_assoc();
                    $data['orden'] = $newOrden;
                    $updates[] = $data;
                    $db->query("DELETE FROM destacados WHERE id = '".$data['id']."'");
                }
                $n = $n + 1;
            }
            foreach ($updates as $data) {
                $id = $data['id'];
                $orden = $data['orden'];
                $proyecto = $data['proyecto'];
                $db->query("INSERT INTO destacados(id, orden, proyecto) VALUES (".$id.", ".$orden.", '".$proyecto."')");
            }
            $statusMsg = "Orden de los proyectos destacados se modifico exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Hubo un error. No pueden haber dos proyectos destacados con el mismo lugar.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = "Hubo un error al intentar actualizar los proyectos destacados.";
        $statusType = 'danger';
    }
    header("Location: ../../admin/destacados?status=$statusMsg&type=$statusType");
    exit;
?>