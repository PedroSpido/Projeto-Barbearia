$(document).ready(function () {
    // Inicialização do DataTable
    var table = $('.table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        },
        "columnDefs": [
            {
                "targets": -1,
                "data": null,
                "defaultContent": '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                    '<button type="button" class="btn btn-danger delete-btn">Excluir</button>'
            }
        ]
    });

    // Função para validar email
    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Função para validar salário
    function validateSalary(salary) {
        var re = /^\d+(\.\d{1,2})?$/; // Aceita números inteiros ou decimais com até duas casas decimais
        return re.test(salary);
    }

    // Função para validar telefone
    function validatePhone(phone) {
        var re = /^\(?\d{2}\)?[\s-]?\d{4,5}[\s-]?\d{4}$/; // Aceita formatos como (12) 12345-6789, (12) 1234-5678, 12345-6789, 1234-5678
        return re.test(phone);
    }

    // Função para adicionar funcionário
    $('#openAddEmployeeModalBtn').click(function () {
        $('#addEmployeeModal').modal('show');
    });

    $('#addEmployeeBtn').click(function () {
        var employeeName = $('#employeeName').val().trim();
        var employeePosition = $('#employeePosition').val().trim();
        var employeeEmail = $('#employeeEmail').val().trim();
        var employeePhone = $('#employeePhone').val().trim();
        var employeeSalary = $('#employeeSalary').val().trim();

        // Validações
        if (employeeName === '' || employeePosition === '' || employeeEmail === '' || employeePhone === '' || employeeSalary === '') {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        if (!validateEmail(employeeEmail)) {
            alert('Por favor, insira um email v\u00E1lido.');
            return;
        }

        if (!validatePhone(employeePhone)) {
            alert('Por favor, insira um telefone v\u00E1lido (formato: (12) 12345-6789).');
            return;
        }

        if (!validateSalary(employeeSalary)) {
            alert('Por favor, insira um sal\u00E1rio v\u00E1lido (formato: 1000.00).');
            return;
        }

        var newEmployee = [
            employeeName,
            employeePosition,
            employeeEmail,
            employeePhone,
            employeeSalary,
            null // Este valor será substituído pelos botões de ação pela DataTable
        ];

        // Adicionar ao DataTable
        table.row.add(newEmployee).draw();

        // Limpar campos e fechar modal
        $('#addEmployeeModal').modal('hide');
        $('#addEmployeeForm')[0].reset();
    });

    // Função para editar funcionário
    $('.table tbody').on('click', '.edit-btn', function () {
        var data = table.row($(this).parents('tr')).data();
        $('#editEmployeeIndex').val(table.row($(this).parents('tr')).index());
        $('#editEmployeeName').val(data[0]);
        $('#editEmployeePosition').val(data[1]);
        $('#editEmployeeEmail').val(data[2]);
        $('#editEmployeePhone').val(data[3]);
        $('#editEmployeeSalary').val(data[4]);
        $('#editEmployeeModal').modal('show');
    });

    // Função para salvar alterações no funcionário editado
    $('#saveEmployeeChangesBtn').click(function () {
        var index = $('#editEmployeeIndex').val();
        var newName = $('#editEmployeeName').val().trim();
        var newPosition = $('#editEmployeePosition').val().trim();
        var newEmail = $('#editEmployeeEmail').val().trim();
        var newPhone = $('#editEmployeePhone').val().trim();
        var newSalary = $('#editEmployeeSalary').val().trim();

        // Validações
        if (index === undefined || newName === '' || newPosition === '' || newEmail === '' || newPhone === '' || newSalary === '') {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        if (!validateEmail(newEmail)) {
            alert('Por favor, insira um email v\u00E1lido.');
            return;
        }

        if (!validatePhone(newPhone)) {
            alert('Por favor, insira um telefone v\u00E1lido.');
            return;
        }

        if (!validateSalary(newSalary)) {
            alert('Por favor, insira um sal\u00E1rio v\u00E1lido (formato: 1000.00).');
            return;
        }

        var newData = [
            newName,
            newPosition,
            newEmail,
            newPhone,
            newSalary,
            null // Este valor será substituído pelos botões de ação pela DataTable
        ];

        // Atualizar no DataTable
        table.row(index).data(newData).draw();

        // Fechar modal de edição
        $('#editEmployeeModal').modal('hide');
    });

    // Função para excluir funcionário
    $('.table tbody').on('click', '.delete-btn', function () {
        var index = table.row($(this).parents('tr')).index();
        var employeeName = table.row(index).data()[0];
        var confirmation = confirm('Deseja realmente excluir o funcion\u00E1rio ' + employeeName + '?');
        if (confirmation) {
            table.row($(this).parents('tr')).remove().draw();
            alert('Funcion\u00E1rio exclu\u00EDdo com sucesso.');
        }
    });
});
