<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Estoque - CMS Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
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
                        <a class="navbar-brand" href="#">Estoque</a>
                    </div>
                </nav>
            </div>

            <!-- Conteúdo Principal -->
            <div class="main-content">
                <!-- Botões de Ação -->
                <div class="text-right mb-3">
                    <button class="btn btn-primary" id="openAddProductModalBtn" data-toggle="modal" data-target="#addProductModal">Adicionar Produto</button>
                </div>

                <!-- Tabela de Produtos -->
                <div class="table-responsive">
                    <table id="productsTable" class="table table-hover">
                        <thead class="text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody id="productsTableBody">
                            <!-- Dados dos Produtos serão adicionados dinamicamente aqui -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Adicionar Produto -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Adicionar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Adicionar Produto -->
                    <form id="addProductForm">
                        <div class="form-group">
                            <label for="productName">Nome:</label>
                            <input type="text" class="form-control" id="productName" placeholder="Digite o nome do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Descrição:</label>
                            <input type="text" class="form-control" id="productDescription" placeholder="Digite a descrição do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Preço:</label>
                            <input type="text" class="form-control" id="productPrice" placeholder="Digite o preço do produto" required>
                        </div>
                        <div class="form-group">
                            <label for="productQuantity">Quantidade:</label>
                            <input type="number" class="form-control" id="productQuantity" placeholder="Digite a quantidade disponível" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="addProductBtn">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Editar Produto -->
    <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Editar Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Editar Produto -->
                    <form id="editProductForm">
                        <input type="hidden" id="editProductIndex">
                        <div class="form-group">
                            <label for="editProductName">Nome:</label>
                            <input type="text" class="form-control" id="editProductName">
                        </div>
                        <div class="form-group">
                            <label for="editProductDescription">Descrição:</label>
                            <input type="text" class="form-control" id="editProductDescription">
                        </div>
                        <div class="form-group">
                            <label for="editProductPrice">Preço:</label>
                            <input type="text" class="form-control" id="editProductPrice">
                        </div>
                        <div class="form-group">
                            <label for="editProductQuantity">Quantidade:</label>
                            <input type="number" class="form-control" id="editProductQuantity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="saveProductChangesBtn">Salvar Alterações</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmar Exclusão de Produto -->
    <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteProductModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja realmente excluir este produto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteProductBtn">Excluir</button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.3.1/dt-1.11.5/datatables.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/estoque.js"></script>
</body>
</html>
