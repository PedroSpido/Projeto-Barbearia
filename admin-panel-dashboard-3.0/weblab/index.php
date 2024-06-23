<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento - Barbearia</title>
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
                <!-- Botão de Logout -->
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
                        <button type="button" id="sidebarCollapse" class="btn btn-link d-xl-block d-lg-block d-md-none d-none">
                            <span class="material-icons">menu</span>
                        </button>
                        <a class="navbar-brand" href="#">Agendamento</a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <div class="text-right mb-3">
                    <button class="btn btn-primary" id="addAppointmentModalBtn" data-bs-toggle="modal" data-bs-target="#addAppointmentModal">Adicionar Agendamento</button>
                </div>
                <div class="container mt-5">
                    <h2 class="mb-4">Agendamentos</h2>
                    <div class="table-responsive">
                        <table class="table table-hover" id="appointmentsTable">
                            <thead class="text-primary">
                                <tr>
                                    <th>Serviço</th>
                                    <th>Cliente</th>
                                    <th>Data</th>
                                    <th>Hora</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Dados dos Agendamentos -->
                                <tr>
                                    <td>Corte de Cabelo</td>
                                    <td>João Silva</td>
                                    <td>2024-05-26</td>
                                    <td>10:00</td>
                                    <td>Pendente</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">Editar</button>
                                        <button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal">Excluir</button>
                                        <button class="btn btn-sm btn-success complete-btn">Concluir</button>
                                    </td>
                                </tr>
                                <!-- Outros Agendamentos podem ser adicionados aqui -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Cadastro de Agendamento -->
    <div class="modal fade" id="addAppointmentModal" tabindex="-1" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAppointmentModalLabel">Cadastrar Novo Agendamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addAppointmentForm">
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Serviço:</label>
                            <select class="form-control" id="serviceName">
                                <option>Corte de Cabelo</option>
                                <option>Barba</option>
                                <option>Lavagem</option>
                                <!-- Adicione outros serviços aqui se necessário -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="clientName" class="form-label">Nome do Cliente:</label>
                            <input type="text" class="form-control" id="clientName" placeholder="Digite o nome do cliente">
                        </div>
                        <div class="mb-3">
                            <label for="appointmentDate" class="form-label">Data do Agendamento:</label>
                            <input type="date" class="form-control" id="appointmentDate">
                        </div>
                        <div class="mb-3">
                            <label for="appointmentTime" class="form-label">Horário do Agendamento:</label>
                            <input type="time" class="form-control" id="appointmentTime">
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar Agendamento</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Edição de Agendamento -->
    <div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAppointmentModalLabel">Editar Agendamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAppointmentForm">
                        <div class="mb-3">
                            <label for="editServiceName" class="form-label">Serviço:</label>
                            <select class="form-control" id="editServiceName">
                                <option>Corte de Cabelo</option>
                                <option>Barba</option>
                                <option>Lavagem</option>
                                <!-- Adicione outros serviços aqui se necessário -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editClientName" class="form-label">Nome do Cliente:</label>
                            <input type="text" class="form-control" id="editClientName" placeholder="Digite o nome do cliente">
                        </div>
                        <div class="mb-3">
                            <label for="editAppointmentDate" class="form-label">Data do Agendamento:</label>
                            <input type="date" class="form-control" id="editAppointmentDate">
                        </div>
                        <div class="mb-3">
                            <label for="editAppointmentTime" class="form-label">Horário do Agendamento:</label>
                            <input type="time" class="form-control" id="editAppointmentTime">
                        </div>
                        <input type="hidden" id="editRowIndex" name="editRowIndex">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmação de Exclusão de Agendamento -->
    <div class="modal fade" id="deleteAppointmentModal" tabindex="-1" aria-labelledby="deleteAppointmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAppointmentModalLabel">Excluir Agendamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir este agendamento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Excluir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    
    <script>
        $(document).ready(function () {
        
            // Abrir modal de cadastro ao clicar no botão
            $(document).on('click', '#addAppointmentModalBtn', function () {
                $('#addAppointmentModal').modal('show');
            });
        
            // Processar formulário de cadastro de agendamento
            $('#addAppointmentForm').submit(function (event) {
                event.preventDefault(); // Evitar o envio padrão do formulário
        
                // Obter valores dos campos do formulário e aplicar trim()
                var serviceName = $('#serviceName').val().trim();
                var clientName = $('#clientName').val().trim();
                var appointmentDate = $('#appointmentDate').val().trim();
                var appointmentTime = $('#appointmentTime').val().trim();
        
                // Limpar alertas anteriores
                $('.alert').remove();
        
                // Validar se todos os campos obrigatórios estão preenchidos
                var isValid = true;
                if (serviceName === '') {
                    $('#serviceName').after('<div class="alert alert-danger mt-2">Por favor, informe o nome do serviço.</div>');
                    isValid = false;
                }
                if (clientName === '') {
                    $('#clientName').after('<div class="alert alert-danger mt-2">Por favor, informe o nome do cliente.</div>');
                    isValid = false;
                }
                if (appointmentDate === '') {
                    $('#appointmentDate').after('<div class="alert alert-danger mt-2">Por favor, informe a data do agendamento.</div>');
                    isValid = false;
                }
                if (appointmentTime === '') {
                    $('#appointmentTime').after('<div class="alert alert-danger mt-2">Por favor, informe a hora do agendamento.</div>');
                    isValid = false;
                }
        
                // Se algum campo obrigatório não estiver preenchido, interromper o envio do formulário
                if (!isValid) {
                    return;
                }
        
                // Adicionar nova linha na tabela com os dados do novo agendamento
                var newRow = '<tr>' +
                    '<td>' + serviceName + '</td>' +
                    '<td>' + clientName + '</td>' +
                    '<td>' + appointmentDate + '</td>' +
                    '<td>' + appointmentTime + '</td>' +
                    '<td>Pendente</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">Editar</button> ' +
                    '<button class="btn btn-sm btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteAppointmentModal">Excluir</button> ' +
                    '<button class="btn btn-sm btn-success complete-btn">Concluir</button>' +
                    '</td>' +
                    '</tr>';
        
                $('#appointmentsTable tbody').append(newRow);
                $('#addAppointmentModal').modal('hide'); // Fechar modal após adicionar
        
                // Limpar campos do formulário
                $('#serviceName').val('');
                $('#clientName').val('');
                $('#appointmentDate').val('');
                $('#appointmentTime').val('');
            });
        
            // Abrir modal de edição ao clicar no botão de edição
            $(document).on('click', '.edit-btn', function () {
                var rowIndex = $(this).closest('tr').index();
                var serviceName = $(this).closest('tr').find('td:eq(0)').text().trim();
                var clientName = $(this).closest('tr').find('td:eq(1)').text().trim();
                var appointmentDate = $(this).closest('tr').find('td:eq(2)').text().trim();
                var appointmentTime = $(this).closest('tr').find('td:eq(3)').text().trim();
        
                // Preencher campos do modal de edição com os dados do agendamento selecionado
                $('#editServiceName').val(serviceName);
                $('#editClientName').val(clientName);
                $('#editAppointmentDate').val(appointmentDate);
                $('#editAppointmentTime').val(appointmentTime);
                $('#editRowIndex').val(rowIndex); // Salvar o índice da linha para identificação posterior
        
                $('#editAppointmentModal').modal('show');
            });
        
            // Abrir modal de edição ao clicar no botão de edição
    $(document).on('click', '.edit-btn', function () {
        var rowIndex = $(this).closest('tr').index();
        var serviceName = $(this).closest('tr').find('td:eq(0)').text().trim();
        var clientName = $(this).closest('tr').find('td:eq(1)').text().trim();
        var appointmentDate = $(this).closest('tr').find('td:eq(2)').text().trim();
        var appointmentTime = $(this).closest('tr').find('td:eq(3)').text().trim();

        // Preencher campos do modal de edição com os dados do agendamento selecionado
        $('#editServiceName').val(serviceName);
        $('#editClientName').val(clientName);
        $('#editAppointmentDate').val(appointmentDate);
        $('#editAppointmentTime').val(appointmentTime);
        $('#editRowIndex').val(rowIndex); // Salvar o índice da linha para identificação posterior

        $('#editAppointmentModal').modal('show');
    });

    // Processar formulário de edição de agendamento
    $('#editAppointmentForm').submit(function (event) {
        event.preventDefault();

        // Obter valores dos campos do modal de edição e aplicar trim()
        var editedServiceName = $('#editServiceName').val().trim();
        var editedClientName = $('#editClientName').val().trim();
        var editedAppointmentDate = $('#editAppointmentDate').val().trim();
        var editedAppointmentTime = $('#editAppointmentTime').val().trim();
        var editRowIndex = $('#editRowIndex').val();

        // Limpar alertas anteriores
        $('.alert').remove();

        // Validar se todos os campos obrigatórios estão preenchidos
        var isValid = true;
        if (editedServiceName === '') {
            $('#editServiceName').after('<div class="alert alert-danger mt-2">Por favor, informe o nome do serviço.</div>');
            isValid = false;
        }
        if (editedClientName === '') {
            $('#editClientName').after('<div class="alert alert-danger mt-2">Por favor, informe o nome do cliente.</div>');
            isValid = false;
        }
        if (editedAppointmentDate === '') {
            $('#editAppointmentDate').after('<div class="alert alert-danger mt-2">Por favor, informe a data do agendamento.</div>');
            isValid = false;
        }
        if (editedAppointmentTime === '') {
            $('#editAppointmentTime').after('<div class="alert alert-danger mt-2">Por favor, informe a hora do agendamento.</div>');
            isValid = false;
        }

        // Se algum campo obrigatório não estiver preenchido, interromper o envio do formulário
        if (!isValid) {
            return;
        }

        // Atualizar os dados na tabela com as informações editadas
        $('#appointmentsTable tbody tr:eq(' + editRowIndex + ')').find('td:eq(0)').text(editedServiceName);
        $('#appointmentsTable tbody tr:eq(' + editRowIndex + ')').find('td:eq(1)').text(editedClientName);
        $('#appointmentsTable tbody tr:eq(' + editRowIndex + ')').find('td:eq(2)').text(editedAppointmentDate);
        $('#appointmentsTable tbody tr:eq(' + editRowIndex + ')').find('td:eq(3)').text(editedAppointmentTime);

        $('#editAppointmentModal').modal('hide');
    });
        
            // Excluir agendamento
            $(document).on('click', '.delete-btn', function () {
                // Lógica para capturar o agendamento a ser excluído
                var row = $(this).closest('tr');
                var serviceName = row.find('td:eq(0)').text().trim();
                var clientName = row.find('td:eq(1)').text().trim();
                var appointmentDate = row.find('td:eq(2)').text().trim();
                var appointmentTime = row.find('td:eq(3)').text().trim();
        
                // Passar os dados para o modal de confirmação de exclusão
                $('#deleteAppointmentModal').modal('show').data({
                    'row': row,
                    'serviceName': serviceName,
                    'clientName': clientName,
                    'appointmentDate': appointmentDate,
                    'appointmentTime': appointmentTime
                });
            });
        
            // Confirmar exclusão de agendamento
            $('#confirmDeleteBtn').click(function () {
                // Remover a linha da tabela após a confirmação
                var row = $('#deleteAppointmentModal').data('row');
                row.remove();
        
                $('#deleteAppointmentModal').modal('hide');
                alert('Agendamento excluído com sucesso!');
            });
        
            // Marcar agendamento como concluído
            $(document).on('click', '.complete-btn', function () {
                // Lógica para marcar o agendamento como concluído
                var row = $(this).closest('tr');
                row.find('td:eq(4)').text('Concluído');
            });
        
            // Toggle do sidebar
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });
        
            // Toggle do sidebar via Overlay
            $('.more-button, .body-overlay').on('click', function () {
                $('#sidebar, .body-overlay').toggleClass('show-nav');
            });
        });
        </script>
        
       
        
</body>

</html>
