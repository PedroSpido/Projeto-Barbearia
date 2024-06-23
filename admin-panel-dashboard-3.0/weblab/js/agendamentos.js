let appointments = [];
let currentEditIndex = -1;

$(document).ready(function () {
    $('#appointmentTable').DataTable();

    $('#openAddAppointmentModalBtn').click(function () {
        $('#addAppointmentModal').modal('show');
    });

    $('#addAppointmentBtn').click(function () {
        const date = $('#appointmentDate').val();
        const time = $('#appointmentTime').val();
        const client = $('#appointmentClient').val();
        const employee = $('#appointmentEmployee').val();
        const service = $('#appointmentService').val();

        // Verificação de campos vazios
        if (!date || !time || !client || !employee || !service) {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        // Validação da data e hora
        const appointmentDateTime = new Date(date + ' ' + time);
        const now = new Date();

        if (appointmentDateTime <= now) {
            alert('A data e a hora do agendamento devem ser no futuro.');
            return;
        }

        // Verificação de agendamentos duplicados
        const isDuplicate = appointments.some(app =>
            app.date === date &&
            app.time === time &&
            app.employee === employee
        );

        if (isDuplicate) {
            alert('Já existe um agendamento com a mesma data, hora e funcionário.');
            return;
        }

        appointments.push({ date, time, client, employee, service });
        updateAppointmentTable();
        clearAddAppointmentForm();
        $('#addAppointmentModal').modal('hide');
    });

    $('#saveAppointmentChangesBtn').click(function () {
        const date = $('#editAppointmentDate').val();
        const time = $('#editAppointmentTime').val();
        const client = $('#editAppointmentClient').val();
        const employee = $('#editAppointmentEmployee').val();
        const service = $('#editAppointmentService').val();

        // Verificação de campos vazios
        if (!date || !time || !client || !employee || !service) {
            alert('Por favor, preencha todos os campos.');
            return;
        }

        // Validação da data e hora
        const appointmentDateTime = new Date(date + ' ' + time);
        const now = new Date();

        if (appointmentDateTime <= now) {
            alert('A data e a hora do agendamento devem ser no futuro.');
            return;
        }

        // Verificação de agendamentos duplicados
        const isDuplicate = appointments.some((app, index) =>
            index !== currentEditIndex &&
            app.date === date &&
            app.time === time &&
            app.employee === employee
        );

        if (isDuplicate) {
            alert('Já existe um agendamento com a mesma data, hora e funcionário.');
            return;
        }

        appointments[currentEditIndex] = { date, time, client, employee, service };
        updateAppointmentTable();
        $('#editAppointmentModal').modal('hide');
    });

    $('#confirmDeleteAppointmentBtn').click(function () {
        if (currentEditIndex > -1) {
            appointments.splice(currentEditIndex, 1);
            updateAppointmentTable();
            $('#deleteAppointmentModal').modal('hide');
        }
    });

});

function updateAppointmentTable() {
    const tableBody = $('#appointmentTable tbody');
    tableBody.empty();

    appointments.forEach((appointment, index) => {
        tableBody.append(`
            <tr>
                <td>${appointment.date}</td>
                <td>${appointment.time}</td>
                <td>${appointment.client}</td>
                <td>${appointment.employee}</td>
                <td>${appointment.service}</td>
                <td>
                    <button class="btn btn-sm btn-primary" onclick="editAppointment(${index})">Editar</button>
                    <button class="btn btn-sm btn-danger" onclick="confirmDeleteAppointment(${index})">Excluir</button>
                </td>
            </tr>
        `);
    });
}

function editAppointment(index) {
    currentEditIndex = index;
    const appointment = appointments[index];
    $('#editAppointmentDate').val(appointment.date);
    $('#editAppointmentTime').val(appointment.time);
    $('#editAppointmentClient').val(appointment.client);
    $('#editAppointmentEmployee').val(appointment.employee);
    $('#editAppointmentService').val(appointment.service);
    $('#editAppointmentModal').modal('show');
}

function confirmDeleteAppointment(index) {
    currentEditIndex = index;
    $('#deleteAppointmentModal').modal('show');
}

function clearAddAppointmentForm() {
    $('#addAppointmentForm')[0].reset();
}
