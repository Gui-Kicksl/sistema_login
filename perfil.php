<?php
// perfil.php - Página acessível apenas pelo admin

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

if (($_SESSION['nivel'] ?? '') !== 'admin') {
    header('Location: painel.php');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$login_em = htmlspecialchars($_SESSION['login_em'] ?? '', ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container perfil">
        <h2>🛡️ Perfil do administrador</h2>
        <table class="dados">
            <tr><th>Usuário</th><td><?php echo $usuario; ?></td></tr>
            <tr><th>Nível</th><td>admin</td></tr>
            <tr><th>Login em</th><td><?php echo $login_em; ?></td></tr>
        </table>

        <a href="painel.php">Voltar ao painel</a>

        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>
