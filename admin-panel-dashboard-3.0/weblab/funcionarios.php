<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Funcionários - CMS Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
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
                        <a class="navbar-brand" href="#">Funcionários</a>
                    </div>
                </nav>
            </div>

            <!-- Conteúdo Principal -->
            <div class="main-content">
                <!-- Botões de Ação -->
                <div class="text-right mb-3">
                    <button class="btn btn-primary" id="openAddEmployeeModalBtn">Adicionar Funcionário</button>
                </div>

                <!-- Tabela de Funcionários -->
                <div class="table-responsive">
                    <table class="table table-hover" id="employeesTable">
                        <thead class="text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Posição</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th>Salário</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dados do Funcionário serão inseridos aqui dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Adicionar Funcionário -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Adicionar Funcionário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Adicionar Funcionário -->
                    <form id="addEmployeeForm">
                        <div class="form-group">
                            <label for="employeeName">Nome:</label>
                            <input type="text" class="form-control" id="employeeName" placeholder="Digite o nome do funcionário" required>
                        </div>
                        <div class="form-group">
                            <label for="employeePosition">Posição:</label>
                            <input type="text" class="form-control" id="employeePosition" placeholder="Digite a posição do funcionário" required>
                        </div>
                        <div class="form-group">
                            <label for="employeeEmail">Email:</label>
                            <input type="email" class="form-control" id="employeeEmail" placeholder="Digite o email do funcionário" required>
                        </div>
                        <div class="form-group">
                            <label for="employeePhone">Telefone:</label>
                            <input type="tel" class="form-control" id="employeePhone" placeholder="Digite o telefone do funcionário" required>
                        </div>
                        <div class="form-group">
                            <label for="employeeSalary">Salário:</label>
                            <input type="text" class="form-control" id="employeeSalary" placeholder="Digite o salário do funcionário" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addEmployeeBtn">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Editar Funcionário -->
    <div class="modal fade" id="editEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editEmployeeModalLabel">Editar Funcionário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Editar Funcionário -->
                    <form id="editEmployeeForm">
                        <input type="hidden" id="editEmployeeIndex">
                        <div class="form-group">
                            <label for="editEmployeeName">Nome:</label>
                            <input type="text" class="form-control" id="editEmployeeName">
                        </div>
                        <div class="form-group">
                            <label for="editEmployeePosition">Posição:</label>
                            <input type="text" class="form-control" id="editEmployeePosition">
                        </div>
                        <div class="form-group">
                            <label for="editEmployeeEmail">Email:</label>
                            <input type="email" class="form-control" id="editEmployeeEmail">
                        </div>
                        <div class="form-group">
                            <label for="editEmployeePhone">Telefone:</label>
                            <input type="tel" class="form-control" id="editEmployeePhone">
                        </div>
                        <div class="form-group">
                            <label for="editEmployeeSalary">Salário:</label>
                            <input type="text" class="form-control" id="editEmployeeSalary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveEmployeeChangesBtn">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmar Exclusão de Funcionário -->
    <div class="modal fade" id="deleteEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="deleteEmployeeModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteEmployeeModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir este funcionário?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteEmployeeBtn">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="js/funcionarios.js"></script>
</body>
</html>
