<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - CMS Dashboard</title>
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
            <!-- Main Content -->
            <div class="main-content">
                <div class="text-right mb-3">
                    <button id="openAddProductModalBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">Adicionar Produto</button>
                </div>
                <!-- Tabela de Produtos -->
                <div class="table-responsive">
                    <table class="table table-hover" id="productsTable">
                        <thead class="text-primary">
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Preço</th>
                                <th>Quantidade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-id="1">
                                <td>Barbeador Elétrico</td>
                                <td>Barbeador elétrico recarregável com 3 lâminas</td>
                                <td>R$ 150,00</td>
                                <td>20</td>
                                <td>
                                    <button class="btn btn-sm btn-info edit-btn" data-id="1" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="1">Excluir</button>
                                </td>
                            </tr>
                            <tr data-id="2">
                                <td>Kit de Cuidados para Barba</td>
                                <td>Kit contendo óleo para barba, balm e pente</td>
                                <td>R$ 80,00</td>
                                <td>15</td>
                                <td>
                                    <button class="btn btn-sm btn-info edit-btn" data-id="2" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="2">Excluir</button>
                                </td>
                            </tr>
                            <tr data-id="3">
                                <td>Shampoo para Barba</td>
                                <td>Shampoo especial para limpeza e hidratação da barba</td>
                                <td>R$ 35,00</td>
                                <td>30</td>
                                <td>
                                    <button class="btn btn-sm btn-info edit-btn" data-id="3" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="3">Excluir</button>
                                </td>
                            </tr>
                            <tr data-id="4">
                                <td>Tesoura de Barba</td>
                                <td>Tesoura de precisão para ajuste e corte da barba</td>
                                <td>R$ 45,00</td>
                                <td>20</td>
                                <td>
                                    <button class="btn btn-sm btn-info edit-btn" data-id="4" data-bs-toggle="modal" data-bs-target="#editProductModal">Editar</button>
                                    <button class="btn btn-sm btn-danger delete-btn" data-id="4">Excluir</button>
                                </td>
                            </tr>
                            <!-- Adicione mais produtos aqui -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Adicionar Produto Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Adicionar Produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addProductForm">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Nome do Produto</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="productDescription" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Preço</label>
                                    <input type="number" class="form-control" id="productPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productQuantity" class="form-label">Quantidade</label>
                                    <input type="number" class="form-control" id="productQuantity" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Editar Produto Modal -->
            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProductModalLabel">Editar Produto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editProductForm">
                                <div class="mb-3">
                                    <label for="editProductName" class="form-label">Nome do Produto</label>
                                    <input type="text" class="form-control" id="editProductName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductDescription" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="editProductDescription" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductPrice" class="form-label">Preço</label>
                                    <input type="number" class="form-control" id="editProductPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="editProductQuantity" class="form-label">Quantidade</label>
                                    <input type="number" class="form-control" id="editProductQuantity" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.5/js/jquery.dataTables.min.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="C:\Users\User\Downloads\admin panel dashboard-2.0\weblab\js\produtos.js"></script></body>

</html>
