$(document).ready(function () {
    var dataTable = $('#salesTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        },
        "columnDefs": [
            {
                "targets": -1, // Última coluna (ações)
                "render": function (data, type, row, meta) {
                    return `
                        <button type="button" class="btn btn-info edit-sale-btn">Editar</button>
                        <button type="button" class="btn btn-danger delete-sale-btn">Excluir</button>
                    `;
                }
            },
            { "targets": '_all', "render": $.fn.dataTable.render.text() }
        ]
    });

    // Função para adicionar venda
    $('#addSaleBtn').click(function () {
        var saleId = $('#addSaleId').val().trim();
        var saleDate = $('#addSaleDate').val().trim();
        var saleClient = $('#addSaleClient').val().trim();
        var saleTotal = $('#addSaleTotal').val().trim();
        var paymentMethod = $('#addPaymentMethod').val();

        if (saleId !== '' && saleDate !== '' && saleClient !== '' && saleTotal !== '') {
            var newSale = [
                saleId,
                saleDate,
                saleClient,
                saleTotal,
                paymentMethod,
                '<button type="button" class="btn btn-info edit-sale-btn">Editar</button>' +
                '<button type="button" class="btn btn-danger delete-sale-btn">Excluir</button>'
            ];

            dataTable.row.add(newSale).draw();

            $('#addSaleModal').modal('hide');
            $('#addSaleForm')[0].reset();
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });

    // Função para editar venda
    $('#salesTable tbody').on('click', '.edit-sale-btn', function () {
        var currentRow = $(this).closest('tr');
        var data = dataTable.row(currentRow).data();

        $('#editSaleId').val(data[0]);
        $('#editSaleDate').val(data[1]);
        $('#editSaleClient').val(data[2]);
        $('#editSaleTotal').val(data[3]);
        $('#editPaymentMethod').val(data[4]);

        $('#editSaleModal').modal('show');

        // Remover evento de clique anterior para evitar múltiplas associações
        $('#saveSaleChangesBtn').off('click').on('click', function () {
            var newData = [
                $('#editSaleId').val().trim(),
                $('#editSaleDate').val().trim(),
                $('#editSaleClient').val().trim(),
                $('#editSaleTotal').val().trim(),
                $('#editPaymentMethod').val(),
                '<button type="button" class="btn btn-info edit-sale-btn">Editar</button>' +
                '<button type="button" class="btn btn-danger delete-sale-btn">Excluir</button>'
            ];

            dataTable.row(currentRow).data(newData).draw();

            $('#editSaleModal').modal('hide'); // Fechar o modal após salvar
        });
    });

    // Função para excluir venda
    $('#salesTable tbody').on('click', '.delete-sale-btn', function () {
        var currentRow = $(this).closest('tr');
        dataTable.row(currentRow).remove().draw();
    });

    // Evento para esconder o modal de adição ao fechar
    $('#addSaleModal').on('hidden.bs.modal', function () {
        $('#addSaleForm')[0].reset();
    });
});