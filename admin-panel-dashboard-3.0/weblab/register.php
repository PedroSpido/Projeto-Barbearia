<?php
require_once '../config/db.php';
require_once '../src/User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpf = $_POST['cpf'];
    $telefone_1 = $_POST['telefone_1'];
    $estado = $_POST['estado'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $cep = $_POST['cep'];

    $user = new User($pdo);
    if ($user->register($name, $email, $password, $cpf, $telefone_1, $estado, $bairro, $rua, $numero, $complemento, $cep)) {
        header('Location: login.php');
    } else {
        $error = "Falha no registro.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CMS Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required class="form-control">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="form-control">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required class="form-control">
            <label for="cpf">CPF:</label>
            <input type="text" id="cpf" name="cpf" class="form-control">
            <label for="telefone_1">Telefone 1:</label>
            <input type="text" id="telefone_1" name="telefone_1" class="form-control">
            <label for="estado">Estado:</label>
            <input type="text" id="estado" name="estado" class="form-control">
            <label for="bairro">Bairro:</label>
            <input type="text" id="bairro" name="bairro" class="form-control">
            <label for="rua">Rua:</label>
            <input type="text" id="rua" name="rua" class="form-control">
            <label for="numero">Número:</label>
            <input type="text" id="numero" name="numero" class="form-control">
            <label for="complemento">Complemento:</label>
            <input type="text" id="complemento" name="complemento" class="form-control">
            <label for="cep">CEP:</label>
            <input type="text" id="cep" name="cep" class="form-control">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        </form>
    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
