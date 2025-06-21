<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employee Leave Requests</title>


</head>

<body>

    <div class="container bg-white rounded">

        <!-- Table -->
        <table class="table table-bordered table-hover" id="student-tbl">
            <thead class="table-light">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Employee Name</th>
                    <th>Section Adviser</th>
                    <th>Specialization</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="sample-data-body"></tbody>
        </table>
    </div>

    <!-- 🟡 Toast Container -->
    <!-- <div class="toast-container position-fixed top-0 end-0 p-3"></div> -->

    <!-- 🟢 Modal for Edit -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title">Update Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId">
                        <div class="mb-2">
                            <label class="form-label">Teacher Name</label>
                            <input type="text" class="form-control" id="editName" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Section Adviser</label>
                            <input type="text" class="form-control" id="editPurpose" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Specialization</label>
                            <input type="number" class="form-control" id="editDays" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select class="form-select" id="editStatus">
                                <option>Pending</option>
                                <option>Approved</option>
                                <option>Denied</option>
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

    <script>
        const sampleData = [
            { id: 1, name: "Juan Dela Cruz", purpose: "Grade 3", days: "Teacher I", status: "Approved" },
            { id: 2, name: "Maria Santos", purpose: "Grade 6", days: "Teacher II", status: "Pending" },
            { id: 3, name: "Pedro Reyes", purpose: "Grade 4", days: "Teacher I", status: "Denied" },
            { id: 4, name: "Ana Lim", purpose: "Grade 3", days: "Teacher III", status: "Approved" },
            { id: 5, name: "Carlos Rivera", purpose: "Grade 2", days: "Student Teacher ", status: "Pending" }
        ];

        let dataTable;

        function showToast(message, type = 'info') {
            const toast = $(`
            <div class="toast align-items-center text-bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">${message}</div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                </div>
                
            </div>
        `);
            $('.toast-container').append(toast);
            const bsToast = new bootstrap.Toast(toast[0]);
            bsToast.show();
            setTimeout(() => toast.remove(), 5000);
        }

        function renderTable() {
            let tbody = $('#sample-data-body');
            tbody.html('');
            let i = 1;
            sampleData.forEach(emp => {
                let tr = $('<tr></tr>');
                tr.append(`<td class="text-center">${i++}</td>`);
                tr.append(`<td > ${emp.name}</td>`);
                tr.append(`<td >${emp.purpose}</td>`);
                tr.append(`<td >${emp.days}</td>`);
                tr.append(`<td class="text-center">${emp.status}</td>`);
                tr.append(`<td class="text-center">
                <button class="btn btn-sm btn-success editBtn" data-id="${emp.id}"><i class="fa fa-edit"></i></button>
                <button class="btn btn-sm btn-success editBtn" data-id="${emp.id}"><i class="fa fa-trash"></i></button>
                <button class="btn btn-sm btn-success editBtn" data-id="${emp.id}"><i class="fa fa-eye"></i></button>
                </td>`);
                tbody.append(tr);
            });

            if (dataTable) dataTable.destroy();
            dataTable = $('#student-tbl').DataTable({
                dom: 'Bfrtip',
                pageLength: 5,
                lengthMenu: [5, 10, 25],
                ordering: true,
                columnDefs: [
                    { targets: 5, orderable: false }
                ],
                buttons: [
                    { extend: 'excel', class: 'btn btn-sm btn-success' },
                    { extend: 'pdf', class: 'btn btn-sm btn-danger' },
                    { extend: 'print', class: 'btn btn-sm btn-dark' }
                ],

            });

            // search/filter events
            $('#searchInput').off('keyup').on('keyup', function () {
                dataTable.search(this.value).draw();
            });
            $('#statusFilter').off('change').on('change', function () {
                dataTable.column(4).search(this.value).draw();
            });

            // edit events
            $('.editBtn').click(function () {
                const id = $(this).data('id');
                const record = sampleData.find(e => e.id === id);
                if (record) {
                    $('#editId').val(record.id);
                    $('#editName').val(record.name);
                    $('#editPurpose').val(record.purpose);
                    $('#editDays').val(record.days);
                    $('#editStatus').val(record.status);
                    new bootstrap.Modal(document.getElementById('editModal')).show();
                }
            });
        }

        $('#editForm').submit(function (e) {
            e.preventDefault();
            const id = parseInt($('#editId').val());
            const index = sampleData.findIndex(e => e.id === id);
            if (index !== -1) {
                sampleData[index].name = $('#editName').val();
                sampleData[index].purpose = $('#editPurpose').val();
                sampleData[index].days = $('#editDays').val();
                sampleData[index].status = $('#editStatus').val();
                renderTable();
                showToast("Record updated successfully!", "success");
                bootstrap.Modal.getInstance(document.getElementById('editModal')).hide();
            }
        });

        $(document).ready(function () {
            renderTable();
        });
    </script>

</body>

</html>