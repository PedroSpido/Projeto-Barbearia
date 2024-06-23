$(document).ready(function () {
    var table = $('#productsTable').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese.json"
        },
        "columnDefs": [
            {
                "targets": -1, // Última coluna (ações)
                "render": function (data, type, row, meta) {
                    return `
                        <button type="button" class="btn btn-info edit-btn">Editar</button>
                        <button type="button" class="btn btn-danger delete-btn">Excluir</button>
                    `;
                }
            },
            { "targets": '_all', "render": $.fn.dataTable.render.text() }
        ]
    });

    function isValidPrice(price) {
        // Expressão regular para verificar se o preço é um número válido
        var regex = /^\d+(\.\d{1,2})?$/;
        return regex.test(price);
    }

    function isValidQuantity(quantity) {
        // Verifica se a quantidade é um número inteiro não negativo
        return /^\d+$/.test(quantity) && parseInt(quantity) >= 0;
    }

    // Função para adicionar produto
    $('#addProductBtn').click(function () {
        var productName = $('#productName').val().trim();
        var productDescription = $('#productDescription').val().trim();
        var productPrice = $('#productPrice').val().trim();
        var productQuantity = $('#productQuantity').val().trim();

        if (productName !== '' && productDescription !== '' && productPrice !== '' && productQuantity !== '') {
            if (isValidPrice(productPrice) && isValidQuantity(productQuantity)) {
                var newProduct = [
                    productName,
                    productDescription,
                    productPrice,
                    productQuantity,
                    '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                    ' <button type="button" class="btn btn-danger delete-btn">Excluir</button>'
                ];

                // Adicionar ao DataTable
                table.row.add(newProduct).draw();

                // Limpar campos e fechar modal
                $('#addProductModal').modal('hide');
                $('#addProductForm')[0].reset();

                // Remover o backdrop manualmente
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            } else {
                if (!isValidPrice(productPrice)) {
                    alert('Por favor, insira um valor válido com no máximo duas casas decimais para o preço.');
                } else {
                    alert('Por favor, insira uma quantidade valida (nnmero inteiro positivo) para o estoque.');
                }
            }
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });

    // Função para editar produto
    $('#productsTable tbody').on('click', '.edit-btn', function () {
        var data = table.row($(this).parents('tr')).data();
        $('#editProductIndex').val(table.row($(this).parents('tr')).index());
        $('#editProductName').val(data[0]);
        $('#editProductDescription').val(data[1]);
        $('#editProductPrice').val(data[2]);
        $('#editProductQuantity').val(data[3]);
        $('#editProductModal').modal('show');
    });

    // Função para salvar alterações no produto editado
    $('#saveProductChangesBtn').click(function () {
        var index = $('#editProductIndex').val();
        var newName = $('#editProductName').val().trim();
        var newDescription = $('#editProductDescription').val().trim();
        var newPrice = $('#editProductPrice').val().trim();
        var newQuantity = $('#editProductQuantity').val().trim();

        if (index !== undefined && newName !== '' && newDescription !== '' && newPrice !== '' && newQuantity !== '') {
            if (isValidPrice(newPrice) && isValidQuantity(newQuantity)) {
                var newData = [
                    newName,
                    newDescription,
                    newPrice,
                    newQuantity,
                    '<button type="button" class="btn btn-info edit-btn">Editar</button>' +
                    ' <button type="button" class="btn btn-danger delete-btn">Excluir</button>'
                ];

                // Atualizar no DataTable
                table.row(index).data(newData).draw();

                // Fechar modal de edição
                $('#editProductModal').modal('hide');

                // Remover o backdrop manualmente
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
            } else {
                if (!isValidPrice(newPrice)) {
                    alert('Por favor, insira um valor válido com no máximo duas casas decimais para o preço.');
                } else {
                    alert('Por favor, insira uma quantidade valida (nnmero inteiro positivo) para o estoque.');
                }
            }
        } else {
            alert('Por favor, preencha todos os campos.');
        }
    });

    // Função para excluir produto
    $('#productsTable tbody').on('click', '.delete-btn', function () {
        if (confirm('Deseja realmente excluir este produto?')) {
            table.row($(this).parents('tr')).remove().draw();
            alert('Produto removido com sucesso.');
        }
    });

    // Evento para esconder o modal de adição ao fechar
    $('#addProductModal').on('hidden.bs.modal', function () {
        $('#addProductForm')[0].reset();

        // Remover o backdrop manualmente
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    });
});
