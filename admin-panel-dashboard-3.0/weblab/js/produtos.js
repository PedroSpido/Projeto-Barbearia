// Array de produtos (apenas para demonstração)
let products = [
    { id: 1, name: "Produto 1", category: "Categoria 1", price: 100, stock: 10 },
    { id: 2, name: "Produto 2", category: "Categoria 2", price: 200, stock: 20 }
];

// Função para renderizar a tabela de produtos
function renderProductsTable() {
    let tbody = document.querySelector("#productList");
    tbody.innerHTML = "";

    products.forEach(product => {
        let tr = document.createElement("tr");
        tr.innerHTML = `
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.category}</td>
            <td>${product.price}</td>
            <td>${product.stock}</td>
            <td>
                <button class="btn btn-sm btn-info" onclick="editProduct(${product.id})">Editar</button>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(${product.id})">Excluir</button>
            </td>
        `;
        tbody.appendChild(tr);
    });
}

// Função para adicionar um novo produto
function addProduct() {
    let name = document.getElementById("productName").value;
    let category = document.getElementById("productCategory").value;
    let price = document.getElementById("productPrice").value;
    let stock = document.getElementById("productStock").value;

    let id = products.length > 0 ? products[products.length - 1].id + 1 : 1;

    products.push({ id: id, name: name, category: category, price: price, stock: stock });

    renderProductsTable();
    $('#addProductModal').modal('hide'); // Fechar modal
}

// Função para editar um produto
function editProduct(id) {
    let product = products.find(p => p.id === id);
    if (product) {
        // Preencher formulário de edição
        document.getElementById("editProductId").value = product.id;
        document.getElementById("editProductName").value = product.name;
        document.getElementById("editProductCategory").value = product.category;
        document.getElementById("editProductPrice").value = product.price;
        document.getElementById("editProductStock").value = product.stock;
        // Abrir modal de edição
        $('#editProductModal').modal('show');
    }
}

// Função para salvar as alterações de um produto
function saveProductChanges() {
    let id = document.getElementById("editProductId").value;
    let name = document.getElementById("editProductName").value;
    let category = document.getElementById("editProductCategory").value;
    let price = document.getElementById("editProductPrice").value;
    let stock = document.getElementById("editProductStock").value;

    let index = products.findIndex(p => p.id == id);
    if (index !== -1) {
        products[index].name = name;
        products[index].category = category;
        products[index].price = price;
        products[index].stock = stock;
    }

    renderProductsTable();
    $('#editProductModal').modal('hide'); // Fechar modal
}

// Função para excluir um produto
function deleteProduct(id) {
    products = products.filter(product => product.id !== id);
    renderProductsTable();
}

// Inicializar tabela de produtos
renderProductsTable();