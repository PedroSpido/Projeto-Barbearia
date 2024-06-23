
    // Array de clientes (apenas para demonstração)
    let clients = [
        { id: 1, name: "João Silva", phone: "(11) 98765-4321", email: "joao@example.com" },
        { id: 2, name: "Maria Souza", phone: "(11) 98765-4322", email: "maria@example.com" }
    ];

    // Função para renderizar a tabela de clientes
    function renderClientsTable() {
        let tbody = document.querySelector("tbody");
        tbody.innerHTML = "";

        clients.forEach(client => {
            let tr = document.createElement("tr");
            tr.innerHTML = `
                <td>${client.name}</td>
                <td>${client.phone}</td>
                <td>${client.email}</td>
                <td>
                    <button class="btn btn-sm btn-info" onclick="editClient(${client.id})">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteClient(${client.id})">Excluir</button>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Função para adicionar um novo cliente
    function addClient() {
        let name = document.getElementById("clientName").value;
        let phone = document.getElementById("clientPhone").value;
        let email = document.getElementById("clientEmail").value;

        let id = clients.length > 0 ? clients[clients.length - 1].id + 1 : 1;

        clients.push({ id: id, name: name, phone: phone, email: email });

        renderClientsTable();
        $('#addClientModal').modal('hide'); // Fechar modal
    }

    // Função para editar um cliente
    function editClient(id) {
        let client = clients.find(c => c.id === id);
        if (client) {
            // Preencher formulário de edição
            document.getElementById("editClientId").value = client.id;
            document.getElementById("editClientName").value = client.name;
            document.getElementById("editClientPhone").value = client.phone;
            document.getElementById("editClientEmail").value = client.email;
            // Abrir modal de edição
            $('#editClientModal').modal('show');
        }
    }

    // Função para salvar as alterações de um cliente
    function saveClientChanges() {
        let id = document.getElementById("editClientId").value;
        let name = document.getElementById("editClientName").value;
        let phone = document.getElementById("editClientPhone").value;
        let email = document.getElementById("editClientEmail").value;

        let index = clients.findIndex(c => c.id == id);
        if (index !== -1) {
            clients[index].name = name;
            clients[index].phone = phone;
            clients[index].email = email;
        }

        renderClientsTable();
        $('#editClientModal').modal('hide'); // Fechar modal
    }

    // Função para excluir um cliente
    function deleteClient(id) {
        clients = clients.filter(client => client.id !== id);
        renderClientsTable();
    }

    // Inicializar tabela de clientes
    renderClientsTable();
