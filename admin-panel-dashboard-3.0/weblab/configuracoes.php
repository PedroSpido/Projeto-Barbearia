<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configurações do Administrador</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Tema Light CSS (exemplo) -->
    <link id="theme-link-light" rel="stylesheet" href="caminho/para/tema-light.css">
    <!-- Tema Dark CSS (exemplo) -->
    <link id="theme-link-dark" rel="stylesheet" href="caminho/para/tema-dark.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Configurações do Administrador</h2>
    <form id="adminSettingsForm" onsubmit="saveAndRedirect(event)">
       
        <div class="form-group">
            <label for="usernameInput">Nome de Usuário:</label>
            <input type="text" class="form-control" id="usernameInput" placeholder="Digite o nome de usuário">
        </div>
        <div class="form-group">
            <label for="passwordInput">Senha:</label>
            <input type="password" class="form-control" id="passwordInput" placeholder="Digite a senha">
        </div>
        <div class="form-group">
            <label for="emailInput">Email:</label>
            <input type="email" class="form-control" id="emailInput" placeholder="Digite o email do administrador">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
            <a href="#" class="btn btn-secondary ml-2" onclick="history.back(); return false;"><i class="fas fa-times"></i> Cancelar</a>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

<script>
    // Função para alterar o tema com base na seleção do usuário
    function changeTheme(theme) {
        if (theme === 'light') {
            document.getElementById('theme-link-light').href = 'caminho/para/tema-light.css'; // Substitua com o caminho real para o tema light
            document.getElementById('theme-link-dark').disabled = true; // Desabilita o tema dark
        } else if (theme === 'dark') {
            document.getElementById('theme-link-dark').href = 'caminho/para/tema-dark.css'; // Substitua com o caminho real para o tema dark
            document.getElementById('theme-link-light').disabled = true; // Desabilita o tema light
        }
    }

    // Função para salvar tema selecionado e redirecionar para o index.html
    function saveAndRedirect(event) {
        event.preventDefault(); // Impede o envio do formulário
        var selectedTheme = document.getElementById('themeSelect').value;
        localStorage.setItem('selectedTheme', selectedTheme); // Armazena o tema selecionado em localStorage
        window.location.href = 'index.html'; // Redireciona para o index.html
    }

    // Verifica se há um tema armazenado em localStorage e aplica-o
    document.addEventListener('DOMContentLoaded', function() {
        var storedTheme = localStorage.getItem('selectedTheme');
        if (storedTheme === 'light') {
            changeTheme('light');
            document.getElementById('themeSelect').value = 'light';
        } else if (storedTheme === 'dark') {
            changeTheme('dark');
            document.getElementById('themeSelect').value = 'dark';
        }
    });
</script>

</body>
</html>
