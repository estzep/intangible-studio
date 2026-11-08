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
                    $query = $db->query("SELECT * FROM logofolio WHERE orden = ".$n);
                    $data = $query->fetch_assoc();
                    $data['orden'] = $newOrden;
                    $updates[] = $data;
                    $db->query("DELETE FROM logofolio WHERE id = '".$data['id']."'");
                }
                $n = $n + 1;
            }
            foreach ($updates as $data) {
                $id = $data['id'];
                $orden = $data['orden'];
                $file = $data['file'];
                $db->query("INSERT INTO logofolio(id, orden, file) VALUES (".$id.", ".$orden.", '".$file."')");
            }
            $statusMsg = "Orden de los logos se modifico exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Hubo un error. No pueden haber dos logos con el mismo lugar.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = "Hubo un error al intentar actualizar los logos.";
        $statusType = 'danger';
    }
    header("Location: ../../admin/logos?status=$statusMsg&type=$statusType");
    exit;
?>