<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendas - Barbearia</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
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
                        <a class="navbar-brand" href="#"> Vendas </a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none" id="navbarSupportedContent">
                        </div>
                    </div>
                </nav>
            </div>
            <!-- Main Content -->
            <div class="main-content">
                <h2 class="mb-4">Registrar Nova Venda</h2>
                <!-- Botão para abrir modal de adição -->
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addSaleModal">
                    Adicionar Venda
                </button>

                <!-- Modal de adição de venda -->
                <div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="addSaleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addSaleModalLabel">Adicionar Nova Venda</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulário de adição de venda -->
                                <form id="addSaleForm">
                                    <div class="form-group">
                                        <label for="addSaleId">ID:</label>
                                        <input type="text" class="form-control" id="addSaleId" placeholder="Digite o ID">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSaleDate">Data:</label>
                                        <input type="date" class="form-control" id="addSaleDate">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSaleClient">Cliente:</label>
                                        <input type="text" class="form-control" id="addSaleClient" placeholder="Digite o nome do cliente">
                                    </div>
                                    <div class="form-group">
                                        <label for="addSaleTotal">Total:</label>
                                        <input type="text" class="form-control" id="addSaleTotal" placeholder="Digite o total">
                                    </div>
                                    <div class="form-group">
                                        <label for="addPaymentMethod">Forma de Pagamento:</label>
                                        <select class="form-control" id="addPaymentMethod">
                                            <option value="cartao">Cartão de Crédito</option>
                                            <option value="dinheiro">Dinheiro</option>
                                            <option value="pix">PIX</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="addSaleProducts">Produtos:</label>
                                        <textarea class="form-control" id="addSaleProducts" rows="3" placeholder="Descreva os produtos"></textarea>
                                    </div>
                                  
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="addSaleBtn">Registrar Venda</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-5 mb-4">Vendas Realizadas</h2>
                <!-- Tabela de vendas -->
                <div class="table-responsive">
                    <table id="salesTable" class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>ID</th>
                                <th>Data</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Forma de Pagamento</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Linhas de vendas serão adicionadas aqui dinamicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editSaleModal" tabindex="-1" role="dialog" aria-labelledby="editSaleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editSaleModalLabel">Editar Venda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário de edição de venda -->
                        <form id="editSaleForm">
                            <input type="hidden" id="editSaleId">
                            <div class="form-group">
                                <label for="editSaleDate">Data:</label>
                                <input type="date" class="form-control" id="editSaleDate">
                            </div>
                            <div class="form-group">
                                <label for="editSaleClient">Cliente:</label>
                                <input type="text" class="form-control" id="editSaleClient">
                            </div>
                            <div class="form-group">
                                <label for="editSaleTotal">Total:</label>
                                <input type="text" class="form-control" id="editSaleTotal">
                            </div>
                            <div class="form-group">
                                <label for="editPaymentMethod">Forma de Pagamento:</label>
                                <select class="form-control" id="editPaymentMethod">
                                    <option value="cartao">Cartão de Crédito</option>
                                    <option value="dinheiro">Dinheiro</option>
                                    <option value="pix">PIX</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editSaleProducts">Produtos:</label>
                                <textarea class="form-control" id="editSaleProducts" rows="3"></textarea>
                            </div>
                           
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveChangesBtn">Salvar Alterações</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- JavaScript -->
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/vendas.js" charset="utf-8"></script>
</body>

</html>
