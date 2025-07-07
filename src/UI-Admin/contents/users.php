<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class=""><i class="fa fa-folder-open text-primary me-2"></i>Parents Management</h4>
                <small class="text-muted">Manage and process parents' applications and concerns</small>
            </div>
            <button class="btn btn-success btn-sm" id="addNewBtn">
                <i class="fa fa-plus"></i> Add New Parent
            </button>
        </div>
        <table class="table table-bordered table-hover mb-0" id="parent-tbl">
            <thead class="table-light text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Parent Name</th>
                    <th>Student Name</th>
                    <th>Date Submitted</th>
                    <th>Contact Number</th>
                    <th>Type</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="parent-data-body"></tbody>
        </table>
    </div>

    <!-- Scrollable View Cards -->
    <div class="parent-view-grid mt-4">
        <h5 class="text-muted mb-3">OverView Card</h5>
        <div class="row parent-card-scroll" id="parent-card-view"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Update Parent Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Parent Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Student Name</label>
                            <input type="text" class="form-control" id="editStudent" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Date Submitted</label>
                            <input type="text" class="form-control" id="editDate" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="editContact" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Type</label>
                            <select class="form-select" id="editType">
                                <option>New</option>
                                <option>Transfer</option>
                                <option>Regular</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Declined</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
    .parent-view-grid .parent-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background: #f9f9f9;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    .parent-view-grid .parent-card h6 {
        margin: 0 0 5px 0;
        font-weight: bold;
    }

    .parent-view-grid .parent-card small {
        font-size: 0.85rem;
        color: #555;
    }

    /* ✅ Scroll container */
    .parent-card-scroll {
        max-height: 350px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .parent-card-scroll::-webkit-scrollbar {
        width: 8px;
    }

    .parent-card-scroll::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }
</style>

<script>
    const parentData = [
        { id: 1, name: "Juan Dela Cruz", student: "Gabriel Dela Cruz", date: "June 1, 2025", contact: "09123456789", type: "New", status: "Pending" },
        { id: 2, name: "Maria Santos", student: "Isabel Santos", date: "June 2, 2025", contact: "09234567890", type: "Transfer", status: "Approved" },
        { id: 3, name: "Pedro Reyes", student: "Marco Reyes", date: "June 3, 2025", contact: "09345678901", type: "Regular", status: "Declined" },
        { id: 4, name: "Ana Lim", student: "Nina Lim", date: "June 4, 2025", contact: "09456789012", type: "New", status: "Pending" },
        { id: 5, name: "Carlos Rivera", student: "Carlos Jr. Rivera", date: "June 5, 2025", contact: "09567890123", type: "Transfer", status: "Approved" }
    ];

    let dataTable;

    function renderTable() {
        const tbody = $('#parent-data-body');
        tbody.html('');
        let i = 1;

        parentData.forEach(p => {
            const tr = $('<tr></tr>');
            tr.append(`<td class="text-center">${i++}</td>`);
            tr.append(`<td>${p.name}</td>`);
            tr.append(`<td>${p.student}</td>`);
            tr.append(`<td>${p.date}</td>`);
            tr.append(`<td>${p.contact}</td>`);
            tr.append(`<td>${p.type}</td>`);
            tr.append(`<td class="text-center">${p.status}</td>`);
            tr.append(`
                <td class="text-center">
                    <button class="btn btn-sm btn-success editBtn" data-id="${p.id}"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-sm btn-danger deleteBtn" data-id="${p.id}"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-sm btn-primary viewBtn"><i class="fa fa-eye"></i></button>
                </td>`);
            tbody.append(tr);
        });

        if (dataTable) dataTable.destroy();

        dataTable = $('#parent-tbl').DataTable({
            pageLength: 5,
            lengthMenu: [5, 10, 25],
            columnDefs: [{ orderable: false, targets: 7 }]
        });

        // Bind card rendering on table draw
        dataTable.on('draw', function () {
            updateCardsFromVisibleRows();
        });

        updateCardsFromVisibleRows(); // initial render

        $('.editBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const record = parentData.find(e => e.id === id);
            if (record) {
                $('#editId').val(record.id);
                $('#editName').val(record.name);
                $('#editStudent').val(record.student);
                $('#editDate').val(record.date);
                $('#editContact').val(record.contact);
                $('#editType').val(record.type);
                $('#editStatus').val(record.status);
                new bootstrap.Modal(document.getElementById('editModal')).show();
            }
        });

        $('.deleteBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const index = parentData.findIndex(e => e.id === id);
            if (index !== -1 && confirm('Are you sure you want to delete this parent record?')) {
                parentData.splice(index, 1);
                renderTable();
            }
        });
    }

    function updateCardsFromVisibleRows() {
        const cardView = $('#parent-card-view');
        cardView.html('');

        dataTable.rows({ search: 'applied' }).every(function () {
            const row = $(this.node());
            const id = row.find('.editBtn').data('id');
            const record = parentData.find(e => e.id === id);

            if (record) {
                const card = `
                    <div class="col-md-4 parent-card-wrap">
                        <div class="parent-card">
                            <h6>${record.name}</h6>
                            <small>Student: ${record.student}</small><br>
                            <small>Contact: ${record.contact}</small><br>
                            <small>Type: ${record.type}</small><br>
                            <small>Date: ${record.date}</small><br>
                            <small>Status: <strong>${record.status}</strong></small>
                        </div>
                    </div>`;
                cardView.append(card);
            }
        });
    }

    $('#addNewBtn').click(function () {
        $('#editId').val('');
        $('#editName').val('');
        $('#editStudent').val('');
        $('#editDate').val('');
        $('#editContact').val('');
        $('#editType').val('New');
        $('#editStatus').val('Pending');
        new bootstrap.Modal(document.getElementById('editModal')).show();
    });

    $('#editForm').submit(function (e) {
        e.preventDefault();
        const id = $('#editId').val();
        if (id) {
            const index = parentData.findIndex(e => e.id == id);
            if (index !== -1) {
                parentData[index].name = $('#editName').val();
                parentData[index].student = $('#editStudent').val();
                parentData[index].date = $('#editDate').val();
                parentData[index].contact = $('#editContact').val();
                parentData[index].type = $('#editType').val();
                parentData[index].status = $('#editStatus').val();
            }
        } else {
            const newId = parentData.length ? parentData[parentData.length - 1].id + 1 : 1;
            parentData.push({
                id: newId,
                name: $('#editName').val(),
                student: $('#editStudent').val(),
                date: $('#editDate').val(),
                contact: $('#editContact').val(),
                type: $('#editType').val(),
                status: $('#editStatus').val()
            });
        }
        renderTable();
        bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
    });

    $(document).ready(function () {
        renderTable();
    });
</script>