<?php 

session_start();

include "config.php";
$statusMsg = '';

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Use prepared statements to prevent SQL injection attacks
    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count == 1) {
        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM users WHERE username = ? AND password = PASSWORD(?)");
        $stmt->bind_param("ss", $inputUsername, $inputPassword);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count == 1) {
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ? AND password = PASSWORD(?)");
            $stmt->bind_param("ss", $inputUsername, $inputPassword);
            $stmt->execute();
            $result = $stmt->get_result();
            $data = $result->fetch_assoc();
            $access = $data['access'];
            if ($access) {
                $statusMsg = 'Bienvenido';
                $_SESSION['username'] = $data['username'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['id'] = $data['id'];
                $_SESSION['access'] = $data['access'];
                header("Location: ../../admin/");
                exit();
            } else {
                $statusMsg = 'Este usuario no tiene acceso.';
            }
        } else {
            $statusMsg = "Contraseña incorrecta.";
        }
    } else {
        $statusMsg = "No hay usuarios con ese nombre.";
    }
} else {
    $statusMsg = "Porfavor llena todos los campos.";
}
header("Location: ../../admin/?status=$statusMsg");
exit();

?>