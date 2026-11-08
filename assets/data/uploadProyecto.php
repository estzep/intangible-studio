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
    if (isset($_POST["upload"])) {
        mkdir($targetDir.$inPath);
        $filesArray = array();
        $countFiles = count($_FILES['inputFiles']['name']);
        for($i = 0; $i < $countFiles; $i++){
            $fileName = $_FILES['inputFiles']['name'][$i];
            $filesArray[$i + 1] = $fileName; 
            move_uploaded_file($_FILES['inputFiles']['tmp_name'][$i], $targetDir.$inPath.'/'.$fileName);
        }
        $inImgs = json_encode($filesArray);
        $db->query("INSERT INTO proyectos (`id`, `path`, `titulo`, `subtitulo`, `lugar`, `fecha`, `descripcion`, `imagenDestacada`, `imgPos`, `imagenes`, `style`, `clickable`) VALUES ('".$inId."', '".$inPath."', '".$inTitle."', '".$inSubtitle."', '".$inPlace."', '".$inDate."', '".$inDesc."', '".$inDest."', '".$inPos."', '".$inImgs."', '".$inStyle."', '".$inClickable."')");
        // Allow certain file formats
        $statusMsg = 'Se creo el proyecto exitosamente!';
        $statusType = 'success';
    } else {
        $statusMsg = 'Error al subir.';
        $statusType = 'danger';
    }
    header("Location: ../../admin/proyectos?status=$statusMsg&type=$statusType");
    exit;
?>