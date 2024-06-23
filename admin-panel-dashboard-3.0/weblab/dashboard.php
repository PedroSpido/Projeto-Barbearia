<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Barbearia</title>
   <!-- Bootstrap CSS -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
   <!-- Google Fonts e Ícones -->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
   <!-- CSS do DataTables -->
   <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">
   <!-- Google Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
   <!-- Material Icons -->
   <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <style>
    .navbar-nav .nav-link {
    font-weight: 400; /* Defina o valor apropriado para o peso da fonte */
}
    </style>

</head>
<body>
    <div class="wrapper">
         <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>ClientTracker</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <a href="dashboard.php"><i class="material-icons">dashboard</i> Dashboard</a>
                </li>
                <li>
                    <a href="clientes.php"><i class="material-icons">people</i> Clientes</a>
                </li>
                <li>
                    <a href="funcionarios.php"><i class="material-icons">work</i> Funcionários</a>
                </li>
                <li>
                    <a href="agendamentos.php"><i class="material-icons">calendar_today</i> Agendamentos</a>
                </li>
                <li>
                    <a href="vendas.php"><i class="material-icons">monetization_on</i> Vendas</a>
                </li>
                <li>
                    <a href="estoque.php"><i class="material-icons">inventory</i> Estoque</a>
                </li>
                <li>
                    <a href="relatorios.php"><i class="material-icons">bar_chart</i> Relatórios</a>
                </li>
                <li>
                    <a href="login.php"><i class="material-icons">exit_to_app</i> Logout</a>
                </li>
            </ul>
        </nav>
        
        <!-- Page Content -->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                       
                        <a class="navbar-brand" href="#">Dashboard</a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <!-- Itens de Navegação Adicionais, se necessário -->
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Gráfico de Vendas</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chartVendas"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Produtos Mais Vendidos</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="chartProdutosMaisVendidos"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Número de Atendimentos</h4>
                            </div>
                            <div class="card-body">
                                <p>Total de atendimentos realizados este mês: <strong>120</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Faturamento</h4>
                            </div>
                            <div class="card-body">
                                <p>Faturamento total este mês: <strong>R$ 15.000,00</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title">Estoque</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Kit de Barbear - 15 unidades</li>
                            <li>Shampoo - 30 unidades</li>
                            <li>Condicionador - 25 unidades</li>
                            <li>Gel de Cabelo - 15 unidades</li>
                        </ul>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4 class="card-title">Satisfação do Cliente</h4>
                    </div>
                    <div class="card-body">
                        <p>Indicador de satisfação:</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                        <p class="mt-3">75% dos clientes satisfeitos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        $(document).ready(function() {
            // Toggle sidebar
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });

            // Chart.js
            var ctxVendas = document.getElementById('chartVendas').getContext('2d');
            var chartVendas = new Chart(ctxVendas, {
                type: 'bar',
                data: {
                    labels: ['Corte de Cabelo', 'Química', 'Lavagem de Barba'],
                    datasets: [{
                        label: 'Vendas por Serviço',
                        data: [20, 10, 15],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            var ctxProdutos = document.getElementById('chartProdutosMaisVendidos').getContext('2d');
            var chartProdutos = new Chart(ctxProdutos, {
                type: 'doughnut',
                data: {
                    labels: ['Shampoo', 'Condicionador', 'Gel de Cabelo'],
                    datasets: [{
                        label: 'Produtos Mais Vendidos',
                        data: [30, 25, 15],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235,  1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
