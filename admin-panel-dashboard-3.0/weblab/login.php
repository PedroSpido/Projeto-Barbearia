<?php
require_once '../config/db.php';
require_once '../src/User.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User($pdo);
    $loggedUser = $user->login($email, $password);

    if ($loggedUser) {
        $_SESSION['user_id'] = $loggedUser['cod_cliente'];
        header('Location: produtos.php');
        exit();
    } else {
        $error = "Email ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - CMS Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>
    <div class="container-fluid">
        <form method="POST">
            <div class="row">
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <img src="img/slider/depositphotos_61929635-stock-illustration-set-of-vintage-barber-shop.jpg" alt="Login Image" class="img-fluid">
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="login-wrapper">
                        <div class="login-container">
                            <h2 class="login-title">Login</h2>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Digite seu email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Digite sua senha" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            <a href="register.php" class="btn btn-link btn-block">Cadastrar</a>
                            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
