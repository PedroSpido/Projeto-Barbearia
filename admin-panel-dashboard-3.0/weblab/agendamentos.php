<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos - CMS Dashboard</title>
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
</head>
<body>

   <div class="wrapper">
        <!-- Sidebar -->
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

        <!-- Conteúdo da página -->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">Agendamentos</a>
                    </div>
                </nav>
            </div>
    
            <!-- Conteúdo principal -->
            <div class="main-content">
                <!-- Botões de ação -->
                <div class="text-right mb-3">
                    <button class="btn btn-primary" id="openAddAppointmentModalBtn">Adicionar Agendamento</button>
                </div>
    
                <!-- Tabela de Agendamentos -->
                <div class="table-responsive">
                    <table class="table" id="appointmentTable">
                        <thead class="text-primary">
                            <tr>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Cliente</th>
                                <th>Funcionário</th>
                                <th>Serviço</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dados dos Agendamentos são inseridos aqui -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Adicionar Agendamento -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAppointmentModalLabel">Adicionar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário para Adicionar Agendamento -->
                    <form id="addAppointmentForm">
                        <div class="form-group">
                            <label for="appointmentDate">Data:</label>
                            <input type="date" class="form-control" id="appointmentDate" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentTime">Hora:</label>
                            <input type="time" class="form-control" id="appointmentTime" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentClient">Cliente:</label>
                            <input type="text" class="form-control" id="appointmentClient" placeholder="Digite o nome do cliente" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentEmployee">Funcionário:</label>
                            <input type="text" class="form-control" id="appointmentEmployee" placeholder="Digite o nome do funcionário" required>
                        </div>
                        <div class="form-group">
                            <label for="appointmentService">Serviço:</label>
                            <input type="text" class="form-control" id="appointmentService" placeholder="Digite o serviço agendado" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addAppointmentBtn">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Editar Agendamento -->
    <div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAppointmentModalLabel">Editar Agendamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário para Editar Agendamento -->
                    <form id="editAppointmentForm">
                        <input type="hidden" id="editAppointmentIndex">
                        <div class="form-group">
                            <label for="editAppointmentDate">Data:</label>
                            <input type="date" class="form-control" id="editAppointmentDate">
                        </div>
                        <div class="form-group">
                            <label for="editAppointmentTime">Hora:</label>
                            <input type="time" class="form-control" id="editAppointmentTime">
                        </div>
                        <div class="form-group">
                            <label for="editAppointmentClient">Cliente:</label>
                            <input type="text" class="form-control" id="editAppointmentClient">
                        </div>
                        <div class="form-group">
                            <label for="editAppointmentEmployee">Funcionário:</label>
                            <input type="text" class="form-control" id="editAppointmentEmployee">
                        </div>
                        <div class="form-group">
                            <label for="editAppointmentService">Serviço:</label>
                            <input type="text" class="form-control" id="editAppointmentService">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveAppointmentChangesBtn">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal de Excluir Agendamento -->
    <div class="modal fade" id="deleteAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="deleteAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAppointmentModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este agendamento?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteAppointmentBtn">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="js/agendamentos.js"></script>
    
        
</body>
</html>