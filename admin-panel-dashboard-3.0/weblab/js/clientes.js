$(document).ready(function () {
    var dataTable = $('#clientsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
        },
        "columnDefs": [
            {
                "targets": -1,  // Última coluna (coluna de ações)
                "render": function (data, type, row, meta) {
                    return '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                        '<button type="button" class="btn btn-danger delete-btn">Excluir</button>';
                }
            }
        ]
    });

    // Adicionar Cliente
    $('#openAddClientModalBtn').click(function () {
        $('#addClientModal').modal('show');
    });

    $('#addClientBtn').click(function () {
        var clientName = $('#clientName').val().trim();
        var clientEmail = $('#clientEmail').val().trim();
        var clientPhone = $('#clientPhone').val().trim();
        var clientAddress = $('#clientAddress').val().trim();

        // Validar email usando regex simples
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        // Validar telefone usando regex simples (apenas dígitos, opcionalmente com parênteses e traços)
        var phoneRegex = /^\(?\d{2}\)?[\s-]?\d{4,5}-?\d{4}$/;

        if (clientName !== '' && clientEmail !== '' && clientPhone !== '') {
            if (!emailRegex.test(clientEmail)) {
                alert('Por favor, insira um endere\u00E7o de email v\u00E1lido.');
              
                return;
            }

            if (!phoneRegex.test(clientPhone)) {
                alert('Por favor, insira um n\u00FAmero de telefone v\u00E1lido.');
                return;
            }

            var newClient = [
                clientName,
                clientEmail,
                clientPhone,
                clientAddress,
                '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                '<button type="button" class="btn btn-danger delete-btn">Excluir</button>'
            ];

            dataTable.row.add(newClient).draw();
            $('#addClientModal').modal('hide');
            $('#addClientForm')[0].reset();
        } else {
            alert('Por favor, preencha todos os campos obrigat\u00F3rios.');
        }
    });

    // Editar Cliente
    $('#clientsTable tbody').on('click', '.edit-btn', function () {
        var currentRow = $(this).closest('tr');
        var data = dataTable.row(currentRow).data();
        $('#editClientName').val(data[0]);
        $('#editClientEmail').val(data[1]);
        $('#editClientPhone').val(data[2]);
        $('#editClientAddress').val(data[3]);
        $('#editClientModal').modal('show');

        // Salvar alterações
        $('#saveClientChangesBtn').unbind().click(function () {
            var newData = [
                $('#editClientName').val().trim(),
                $('#editClientEmail').val().trim(),
                $('#editClientPhone').val().trim(),
                $('#editClientAddress').val().trim(),
                '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                '<button type="button" class="btn btn-danger delete-btn">Excluir</button>'
            ];

            dataTable.row(currentRow).data(newData).draw();
            $('#editClientModal').modal('hide');
        });
    });

    // Excluir Cliente
    $('#clientsTable tbody').on('click', '.delete-btn', function () {
        var currentRow = $(this).closest('tr');
        var data = dataTable.row(currentRow).data();

        if (confirm('Deseja realmente excluir este cliente?')) {
            dataTable.row(currentRow).remove().draw();
        }
    });
});
