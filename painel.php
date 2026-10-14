<?php
// painel.php - Página protegida com boas-vindas

session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: login.html');
    exit;
}

$usuario = htmlspecialchars($_SESSION['usuario'], ENT_QUOTES, 'UTF-8');
$nivel = $_SESSION['nivel'] ?? 'comum';
$login_em = htmlspecialchars($_SESSION['login_em'] ?? '', ENT_QUOTES, 'UTF-8');

if ($nivel === 'admin') {
    $mensagem = 'Você é administrador e tem acesso total ao sistema.';
} else {
    $mensagem = 'Você é um usuário comum. Algumas áreas são restritas.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container painel">
        <h2>✅ Bem-vindo, <?php echo $usuario; ?>!</h2>
        <p>Você está logado com sucesso no sistema.</p>
        <p class="nivel <?php echo $nivel; ?>"><?php echo $mensagem; ?></p>
        <p class="data-login">Login realizado em <?php echo $login_em; ?></p>

        <?php if ($nivel === 'admin'): ?>
            <a href="perfil.php">Acessar perfil do administrador</a>
        <?php endif; ?>

        <div class="logout">
            <a href="logout.php">Sair do sistema</a>
        </div>
    </div>
</body>
</html>