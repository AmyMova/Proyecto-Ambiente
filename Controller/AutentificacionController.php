<?php
session_start();

class AuthController {
    
    // Método para iniciar sesión
    public static function login($username, $password) {
        if($username === 'NumeroCedula' && $password === 'Contrasenna') {
            // Iniciar sesión
            $_SESSION['IdUsuario'] = 1; 
            return true;
        } else {
            return false;
        }
    }
    
    // Método para cerrar sesión
    public static function logout() {
        // Destruir todas las variables de sesión
        session_destroy();
    }
    
    // Método para verificar si el usuario está autenticado
    public static function isAuthenticated() {
        return isset($_SESSION['IdUsuario']);
    }
}

// Ejemplo de uso
if(isset($_POST['NumeroCedula']) && isset($_POST['Contrasenna'])) {
    $username = $_POST['NumeroCedula'];
    $password = $_POST['Contrasenna'];

    // Intentar iniciar sesión
    if(AuthController::login($username, $password)) {
        // Redirigir al usuario a la página principal
        header("Location: home.php");
        exit();
    } else {
        // Mostrar un mensaje de error
        $_SESSION['error'] = "Credenciales inválidas. Por favor, inténtalo de nuevo.";
        header("Location: index.php");
        exit();
    }
}

if(isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Cerrar sesión
    AuthController::logout();
    // Redirigir al usuario al inicio de sesión
    header("Location: index.php");
    exit();
}

// Para verificar si el usuario está autenticado
if(AuthController::isAuthenticated()) {
    // El usuario está autenticado
    // Puedes hacer cualquier acción que desees para un usuario autenticado aquí
} else {
    // El usuario no está autenticado
    // Puedes redirigirlo a la página de inicio de sesión u otra página apropiada
}
?>
