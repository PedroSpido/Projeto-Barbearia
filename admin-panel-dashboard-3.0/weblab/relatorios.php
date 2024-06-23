<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatórios - Barbearia</title>
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Adicione estilos personalizados aqui */
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
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#">Relatórios</a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                            <!-- Itens de Navegação Adicionais, se necessário -->
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Conteúdo Principal -->
            <div class="main-content">
                <!-- Botões para gerar relatórios -->
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-primary w-100" id="generateAppointmentsReportBtn">Gerar Relatório de Agendamentos</button>
                        </div>
                        <div class="col-md-6 mb-3">
                            <button class="btn btn-primary w-100" id="generateSalesReportBtn">Gerar Relatório de Vendas</button>
                        </div>
                    </div>

                    <!-- Tabela de Agendamentos -->
                    <div class="table-responsive" id="appointmentsTableContainer">
                        <h3 class="mt-5">Agendamentos</h3>
                        <table class="table table-hover" id="appointmentsTable">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                    <th>Procedimento</th>
                                    <th>Status</th>
                                    <th>Valor</th>
                                    <th>Profissional</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados dos Agendamentos -->
                                <tr>
                                    <td>1</td>
                                    <td>2024-06-15</td>
                                    <td>10:00</td>
                                    <td>João Silva</td>
                                    <td>Corte</td>
                                    <td>Concluído</td>
                                    <td>R$ 40,00</td>
                                    <td>Carlos</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2024-06-15</td>
                                    <td>14:00</td>
                                    <td>Júlio Oliveira</td>
                                    <td>Barba</td>
                                    <td>Pendente</td>
                                    <td>R$ 30,00</td>
                                    <td>André</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2024-06-15</td>
                                    <td>15:30</td>
                                    <td>Marcos Santos</td>
                                    <td>Lavagem</td>
                                    <td>Concluído</td>
                                    <td>R$ 25,00</td>
                                    <td>Carlos</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>2024-06-15</td>
                                    <td>16:30</td>
                                    <td>Ricardo Lima</td>
                                    <td>Química</td>
                                    <td>Concluído</td>
                                    <td>R$ 80,00</td>
                                    <td>João</td>
                                </tr>
                                <!-- Adicionar mais agendamentos conforme necessário -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Gráfico de Status dos Agendamentos -->
                    <div class="mt-5">
                        <h3>Status dos Agendamentos</h3>
                        <canvas id="appointmentsChart" width="400" height="200"></canvas>
                    </div>

                    <!-- Tabela de Vendas -->
                    <div class="table-responsive mt-5" id="salesTableContainer">
                        <h3>Vendas</h3>
                        <table class="table table-hover" id="salesTable">
                            <thead class="text-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Produto</th>
                                    <th>Quantidade</th>
                                    <th>Valor Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados das Vendas -->
                                <tr>
                                    <td>1</td>
                                    <td>2024-06-15</td>
                                    <td>Maria Silva</td>
                                    <td>Shampoo</td>
                                    <td>2</td>
                                    <td>R$ 30,00</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2024-06-15</td>
                                    <td>João Oliveira</td>
                                    <td>Condicionador</td>
                                    <td>1</td>
                                    <td>R$ 15,00</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2024-06-15</td>
                                    <td>Carlos Santos</td>
                                    <td>Barbeador</td>
                                    <td>1</td>
                                    <td>R$ 50,00</td>
                                </tr>
                                <!-- Adicionar mais vendas conforme necessário -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Gráfico de Produtos mais Vendidos -->
                    <div class="mt-5">
                        <h3>Produtos mais Vendidos</h3>
                        <canvas id="salesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <!-- Seu código JavaScript personalizado -->
    <script src="js/relatorios.js"></script>

</body>

</html>
