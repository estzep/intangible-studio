<?php
    // Include the database configuration file
    include 'config.php';
    $statusMsg = '';
    $statusType = 'warning';

    // File upload path
    $targetDir = "../projects/";

    $inId = $_POST["inputId"];
    $inPath = $_POST["inputFolder"];
    $inTitle = $_POST["inputTitle"];
    $inSubtitle = $_POST["inputSubtitle"];
    $inPlace = $_POST["inputPlace"];
    $inDate = $_POST["inputDate"];
    $inClickable = $_POST["inputClickable"];
    $inPos = $_POST["inputPos"];
    if (isset($inClickable)) {
        $inDesc = $_POST["inputDescription"];
        $inStyle = $_POST["inputStyle"];
    } else {
        $inDesc = NULL;
        $inStyle = 1;
        $inClickable = NULL;
    }
    $inDest = $_POST['inputDestacada'];
    if ($inStyle == 2) {
        $temp = explode(', ', $inDest);
        $inDest =  '[' . '"' . implode('", "', $temp) . '"' . ']';
    }
    if (isset($_POST["update"])) {
        if (isset($_POST['oldInputFiles']) && is_array($_POST['oldInputFiles'])) {
            $filesArray = array();
            $i = 0;
            foreach($_POST['oldInputFiles'] as $oldImg) {
                $img = $_FILES['inputFiles']['name'][$i];
                if (!empty($img)) {
                    $filesArray[$i + 1] = $img;
                    // echo "<br>Agregasion<br>";
                    move_uploaded_file($_FILES['inputFiles']['tmp_name'][$i], $targetDir.$inPath.'/'.$img);
                } else {
                    $filesArray[$i + 1] = $oldImg;
                }
                $i++;
            }
            $inImgs = json_encode($filesArray);
            // echo "NEW:<br>".$inImgs;
            $query = $db->query("SELECT * FROM proyectos WHERE id = ".$inId);
            $data = $query->fetch_assoc();
            $folder = $data['path'];
            $oldImgs = json_decode($data['imagenes'], true);
            // echo "<br>OLD:<br>".json_encode($oldImgs);
            foreach($oldImgs as $n => $oldImg) {
                $found = false;
                foreach($filesArray as $m => $img) {
                    if ($oldImg == $img) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    unlink($targetDir.$folder.'/'.$oldImg);
                    // echo "<br>Borrasion<br>";
                }
            }
            $db->query("UPDATE proyectos SET titulo = '".$inTitle."', subtitulo = '".$inSubtitle."', lugar = '".$inPlace."', fecha = '".$inDate."', descripcion = '".$inDesc."', imagenDestacada = '".$inDest."', imgPos = '".$inPos."', imagenes = '".$inImgs."', style = '".$inStyle."', clickable = '".$inClickable."' WHERE id = '".$inId."'");
            $statusMsg = "El proyecto fue modificado exitosamente!";
            $statusType = 'success';
        } else {
            $statusMsg = "Error en el formulario. No se pudo modificar el proyecto.";
            $statusType = 'danger';
        }
    } else {
        $statusMsg = 'No se pudo modificar el proyecto.';
        $statusType = 'danger';
    }
    header("Location: ../../admin/proyectos?status=$statusMsg&type=$statusType");
    exit;
?>