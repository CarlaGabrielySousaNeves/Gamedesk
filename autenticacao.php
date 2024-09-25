<?php
// Defina um nome de usuário e senha válidos
$valid_username = 'admin';
$valid_password = '1234';

// Verifique se o usuário não enviou o cabeçalho Authorization
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    // Solicite a autenticação
    header('WWW-Authenticate: Basic realm="Área Restrita"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Você deve fornecer um nome de usuário e senha válidos.';
    exit;
} else {
    // Verifique as credenciais
    if ($_SERVER['PHP_AUTH_USER'] === $valid_username && $_SERVER['PHP_AUTH_PW'] === $valid_password) {
        echo "Bem-vindo, {$_SERVER['PHP_AUTH_USER']}!";
    } else {
        // Credenciais inválidas
        header('WWW-Authenticate: Basic realm="Área Restrita"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Nome de usuário ou senha incorretos.';
        exit;
    }
}
?>
