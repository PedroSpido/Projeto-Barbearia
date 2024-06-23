
    $(document).ready(function () {
        // Inicializar a tabela de agendamentos
        $('#appointmentsTable').DataTable({
            "pageLength": 10,
            "lengthChange": true,
            "searching": true,
            "language": {
                "search": "Pesquisar:",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior"
                },
                "info": "Mostrando _START_ a _END_ de _TOTAL_ agendamentos",
                "infoEmpty": "Mostrando 0 a 0 de 0 agendamentos",
                "emptyTable": "Nenhum agendamento disponível",
                "infoFiltered": "(filtrado de _MAX_ agendamentos no total)"
            }
        });

    // Inicializar a tabela de vendas
    $('#salesTable').DataTable({
        "pageLength": 10,
    "lengthChange": true,
    "searching": true,
    "language": {
        "search": "Pesquisar:",
    "paginate": {
        "next": "Próximo",
    "previous": "Anterior"
                    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ vendas",
    "infoEmpty": "Mostrando 0 a 0 de 0 vendas",
    "emptyTable": "Nenhuma venda disponível",
    "infoFiltered": "(filtrado de _MAX_ vendas no total)"
                }
            });

    // Gerar relatório de agendamentos ao clicar no botão
    $('#generateAppointmentsReportBtn').click(function () {
        generateAppointmentsReport();
            });

    // Gerar relatório de vendas ao clicar no botão
    $('#generateSalesReportBtn').click(function () {
        generateSalesReport();
            });

    // Função para gerar relatório de agendamentos
    function generateAppointmentsReport() {
                var totalAgendamentos = $('#appointmentsTable').DataTable().rows().count();
    var agendamentosConcluidos = $('#appointmentsTable tbody tr td:contains("Concluído")').length;
    var agendamentosPendentes = totalAgendamentos - agendamentosConcluidos;

    // Calcular quantidade de procedimentos por profissional
    var profissionais = { };
    var procedimentos = { };
    $('#appointmentsTable tbody tr').each(function () {
                    var profissional = $(this).find('td:nth-child(8)').text();
    var procedimento = $(this).find('td:nth-child(5)').text();

    if (profissionais[profissional]) {
        profissionais[profissional]++;
                    } else {
        profissionais[profissional] = 1;
                    }

    if (procedimentos[procedimento]) {
        procedimentos[procedimento]++;
                    } else {
        procedimentos[procedimento] = 1;
                    }
                });

    // Gerar relatório de agendamentos com base nos dados coletados
    var relatorio = 'Relatorio de Agendamentos:\n\n';
    relatorio += 'Total de Agendamentos: ' + totalAgendamentos + '\n';
    relatorio += 'Agendamentos Concluidos: ' + agendamentosConcluidos + '\n';
    relatorio += 'Agendamentos Pendentes: ' + agendamentosPendentes + '\n\n';

    relatorio += 'Quantidade de Procedimentos por Profissional:\n';
    Object.keys(profissionais).forEach(function (key) {
        relatorio += '- ' + key + ': ' + profissionais[key] + ' procedimentos\n';
                });

    relatorio += '\nQuantidade de Cada Tipo de Procedimento:\n';
    Object.keys(procedimentos).forEach(function (key) {
        relatorio += '- ' + key + ': ' + procedimentos[key] + ' vezes\n';
                });

    // Exibir relatório de agendamentos em um alerta
    alert(relatorio);

    // Gerar gráfico de barras com os dados de procedimentos por profissional
    generateAppointmentsBarChart(profissionais);
            }

    // Função para gerar relatório de vendas
    function generateSalesReport() {
                var totalVendas = $('#salesTable').DataTable().rows().count();
    var valorTotalVendas = calcularValorTotalVendas();
    var produtosVendidos = calcularProdutosVendidos();

    // Gerar relatório de vendas com base nos dados coletados
    var relatorio = 'Relatorio de Vendas:\n\n';
    relatorio += 'Total de Vendas: ' + totalVendas + '\n';
    relatorio += 'Valor Total das Vendas: R$ ' + valorTotalVendas.toFixed(2) + '\n\n';

    relatorio += 'Produtos mais Vendidos:\n';
    produtosVendidos.forEach(function (produto) {
        relatorio += '- ' + produto.nome + ': ' + produto.quantidade + ' unidades\n';
                });

    // Exibir relatório de vendas em um alerta
    alert(relatorio);

    // Gerar gráfico de barras com os produtos mais vendidos
    generateSalesBarChart(produtosVendidos);
            }

    // Função para calcular o valor total das vendas
    function calcularValorTotalVendas() {
                var total = 0;
    $('#salesTable tbody tr').each(function () {
                    var valorStr = $(this).find('td:nth-child(6)').text().replace('R$', '').replace(',', '.');
    var valor = parseFloat(valorStr);
    total += valor;
                });
    return total;
            }

    // Função para calcular os produtos mais vendidos
    function calcularProdutosVendidos() {
                var produtos = { };
    $('#salesTable tbody tr').each(function () {
                    var nomeProduto = $(this).find('td:nth-child(4)').text();
    var quantidade = parseInt($(this).find('td:nth-child(5)').text());
    if (produtos[nomeProduto]) {
        produtos[nomeProduto] += quantidade;
                    } else {
        produtos[nomeProduto] = quantidade;
                    }
                });

    var produtosArray = [];
    Object.keys(produtos).forEach(function (key) {
        produtosArray.push({ nome: key, quantidade: produtos[key] });
                });

    // Ordenar produtos por quantidade (mais vendidos primeiro)
    produtosArray.sort(function (a, b) {
                    return b.quantidade - a.quantidade;
                });

    return produtosArray;
            }

    // Função para gerar gráfico de barras dos agendamentos com Chart.js
    function generateAppointmentsBarChart(profissionaisData) {
                var ctx = document.getElementById('appointmentsChart').getContext('2d');
    var profissionaisLabels = Object.keys(profissionaisData);
    var profissionaisQuantities = Object.values(profissionaisData);

    var myChart = new Chart(ctx, {
        type: 'bar',
    data: {
        labels: profissionaisLabels,
    datasets: [{
        label: 'Quantidade de Procedimentos por Profissional',
    data: profissionaisQuantities,
    backgroundColor: [
    'rgba(255, 99, 132, 0.5)',
    'rgba(54, 162, 235, 0.5)',
    'rgba(255, 206, 86, 0.5)',
    'rgba(75, 192, 192, 0.5)',
    'rgba(153, 102, 255, 0.5)',
    'rgba(255, 159, 64, 0.5)'
    ],
    borderColor: [
    'rgba(255, 99, 132, 1)',
    'rgba(54, 162, 235, 1)',
    'rgba(255, 206, 86, 1)',
    'rgba(75, 192, 192, 1)',
    'rgba(153, 102, 255, 1)',
    'rgba(255, 159, 64, 1)'
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
            }

    // Função para gerar gráfico de barras das vendas com Chart.js
    function generateSalesBarChart(produtosVendidos) {
                var ctx = document.getElementById('salesChart').getContext('2d');
    var produtosLabels = produtosVendidos.map(function (produto) {
                    return produto.nome;
                });
    var produtosQuantidades = produtosVendidos.map(function (produto) {
                    return produto.quantidade;
                });

    var myChart = new Chart(ctx, {
        type: 'bar',
    data: {
        labels: produtosLabels,
    datasets: [{
        label: 'Quantidade de Vendas por Produto',
    data: produtosQuantidades,
    backgroundColor: 'rgba(54, 162, 235, 0.5)',
    borderColor: 'rgba(54, 162, 235, 1)',
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
            }

    // Sidebar Toggle Functionality
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar, #content').toggleClass('active');
            });
        });