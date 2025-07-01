<style>
.stats-card {
    background: white;
    padding: 15px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    border: 1px solid #ddd;
    margin-bottom: 10px;
}

.stats-card h4 {
    margin: 5px 0;
    color: #333;
    font-size: 20px;
}

.stats-card small {
    color: #777;
    font-size: 12px;
}

.info-table td {
    padding: 5px 8px;
    border: none;
    color: #555;
}

.info-table td:first-child {
    font-weight: 500;
    color: #333;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    display: inline-block;
    white-space: nowrap;
}

.status-pending {
    background-color: #fff3cd;
    color: #664d03;
    border: 1px solid #ffda6a;
}

.status-approved {
    background-color: #e8f5e8;
    color: #2d5a2d;
    border: 1px solid #c3e6c3;
}

.status-declined {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.container-fluid {
    max-width: 100%;
    padding-left: 0.75rem;
    padding-right: 0.75rem;
}

@media (max-width: 1200px) {
    .d-flex.justify-content-between {
        flex-direction: column;
        gap: 1rem;
        align-items: stretch;
    }
    
    .d-flex.justify-content-between > div {
        text-align: center;
        width: 100%;
    }
    
    .d-flex.justify-content-between h4 {
        font-size: 1.2rem;
    }
}

.table-responsive {
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 1rem;
    -webkit-overflow-scrolling: touch;
}

@media (max-width: 768px) {
    .table-responsive {
        font-size: 0.85rem;
        border-radius: 0.25rem;
    }
    
    .table th,
    .table td {
        padding: 0.5rem 0.375rem;
        vertical-align: middle;
    }
    
    .table th {
        font-size: 0.8rem;
        font-weight: 600;
    }
    
    .d-md-none {
        display: block !important;
    }
    
    .d-none.d-md-table-cell {
        display: none !important;
    }
    
    .d-none.d-lg-table-cell {
        display: none !important;
    }
}

@media (max-width: 576px) {
    .table th,
    .table td {
        padding: 0.375rem 0.25rem;
        font-size: 0.8rem;
    }
    
    .table th {
        font-size: 0.75rem;
    }
    
    .status-badge {
        font-size: 0.7rem;
        padding: 0.2rem 0.5rem;
    }
}

.action-buttons {
    min-width: 100px;
    display: flex;
    justify-content: center;
}

@media (min-width: 768px) {
    .btn-group .btn {
        border-radius: 0;
        margin: 0;
    }
    
    .btn-group .btn:first-child {
        border-top-left-radius: 0.375rem;
        border-bottom-left-radius: 0.375rem;
    }
    
    .btn-group .btn:last-child {
        border-top-right-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
    }
}

@media (max-width: 767.98px) {
    .btn-group-vertical .btn {
        padding: 0.25rem 0.5rem;
        margin-bottom: 0.125rem;
        border-radius: 0.25rem !important;
        font-size: 0.75rem;
        min-width: 32px;
    }
    
    .btn-group-vertical .btn:last-child {
        margin-bottom: 0;
    }
    
    .action-buttons {
        min-width: 80px;
    }
}

@media (max-width: 768px) {
    .modal-dialog {
        margin: 0.5rem;
        max-width: calc(100% - 1rem);
    }
    
    .modal-lg {
        max-width: calc(100% - 1rem);
    }
    
    .modal-body {
        padding: 1rem;
    }
    
    .modal-header,
    .modal-footer {
        padding: 0.75rem 1rem;
    }
    
    .modal-title {
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .modal-dialog {
        margin: 0.25rem;
        max-width: calc(100% - 0.5rem);
    }
    
    .modal-body {
        padding: 0.75rem;
    }
    
    .modal-header,
    .modal-footer {
        padding: 0.5rem 0.75rem;
    }
    
    .row {
        margin-left: -0.375rem;
        margin-right: -0.375rem;
    }
    
    .row > * {
        padding-left: 0.375rem;
        padding-right: 0.375rem;
    }
}

.form-control,
.form-select {
    font-size: 0.9rem;
    padding: 0.5rem 0.75rem;
}

@media (max-width: 768px) {
    .form-control,
    .form-select {
        font-size: 0.875rem;
        padding: 0.45rem 0.65rem;
    }
    
    .form-label {
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 0.375rem;
    }
    
    .mb-3 {
        margin-bottom: 0.75rem !important;
    }
}

@media (max-width: 576px) {
    .form-control,
    .form-select {
        font-size: 0.85rem;
        padding: 0.4rem 0.6rem;
    }
    
    .form-label {
        font-size: 0.8rem;
    }
    
    .mb-3 {
        margin-bottom: 0.5rem !important;
    }
    
    h4 {
        font-size: 1.1rem !important;
    }
    
    .d-flex.justify-content-between > div:last-child {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .d-flex.justify-content-between > div:last-child .btn {
        width: 100%;
    }
}

.view-field {
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 0.375rem;
    padding: 0.75rem;
    margin-bottom: 0.75rem;
    transition: background-color 0.2s ease;
}

.view-field:hover {
    background-color: #e9ecef;
}

.view-field-label {
    font-weight: 600;
    color: #333;
    font-size: 0.875rem;
    margin-bottom: 0.25rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.view-field-value {
    color: #555;
    font-size: 0.9rem;
    line-height: 1.4;
}

@media (max-width: 768px) {
    .view-field {
        padding: 0.6rem;
        margin-bottom: 0.6rem;
    }
    
    .view-field-label {
        font-size: 0.8rem;
    }
    
    .view-field-value {
        font-size: 0.85rem;
    }
}

.dataTables_wrapper {
    padding: 1rem 0.5rem;
}

.dataTables_length,
.dataTables_filter {
    margin-bottom: 1rem;
}

.dataTables_length label,
.dataTables_filter label {
    font-weight: 500;
    color: #333;
    font-size: 0.9rem;
}

.dataTables_info {
    color: #666;
    font-size: 0.875rem;
}

.dataTables_paginate .paginate_button {
    padding: 0.375rem 0.75rem !important;
    margin: 0 0.125rem;
    border-radius: 0.375rem !important;
    border: 1px solid #dee2e6 !important;
    background: white !important;
    color: #333 !important;
    font-size: 0.875rem !important;
}

.dataTables_paginate .paginate_button:hover {
    background: #f8f9fa !important;
    border-color: #2dce89 !important;
}

.dataTables_paginate .paginate_button.current {
    background: #2dce89 !important;
    border-color: #2dce89 !important;
    color: white !important;
}

@media (max-width: 768px) {
    .dataTables_wrapper {
        padding: 0.5rem 0.25rem;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter {
        text-align: center;
        margin-bottom: 0.75rem;
    }
    
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        text-align: center;
        margin-top: 0.75rem;
    }
    
    .dataTables_length label,
    .dataTables_filter label {
        font-size: 0.85rem;
    }
    
    .dataTables_filter input {
        width: 200px !important;
        margin-left: 0.5rem;
    }
}

@media (max-width: 576px) {
    .dataTables_wrapper {
        padding: 0.25rem;
    }
    
    .dataTables_filter input {
        width: 150px !important;
        font-size: 0.85rem;
    }
    
    .dataTables_paginate .paginate_button {
        padding: 0.25rem 0.5rem !important;
        font-size: 0.8rem !important;
    }
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    border-radius: 0.375rem;
}

@media (max-width: 768px) {
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }
    
    .btn {
        white-space: nowrap;
    }
}

@media (max-width: 576px) {
    .btn-sm {
        padding: 0.2rem 0.4rem;
        font-size: 0.75rem;
    }
}

.btn:disabled {
    opacity: 0.65;
    cursor: not-allowed;
}

.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.btn:focus,
.form-control:focus,
.form-select:focus {
    outline: none;
    box-shadow: 0 0 0 0.2rem rgba(45, 206, 137, 0.25);
}
</style>

<section class="p-2">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fa fa-folder-open text-primary me-2"></i>Learner Registration</h4>
                <span class="text-muted">Manage and process student registration application</span>
            </div>
            <div>
                <button class="btn btn-success btn-sm me-2" id="addNewBtn">
                    <i class="fa fa-plus"></i> Add New Learner
                </button>
                <button class="btn btn-secondary btn-sm" id="refreshBtn">
                    <i class="fa fa-refresh"></i> Refresh
                </button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-bordered table-hover mb-0" id="student-tbl">
                <thead class="table-light text-dark">
                    <tr>
                        <th class="text-center" style="width:4%">#</th>
                        <th>Learner Name</th>
                        <th class="d-none d-md-table-cell">Student LRN</th>
                        <th class="d-none d-lg-table-cell">Date Submitted</th>
                        <th class="d-none d-md-table-cell">Parent Contact</th>
                        <th class="d-none d-lg-table-cell">Grade Level</th>
                        <th class="text-center">Status</th>
                        <th class="text-center" style="width:100px">Action</th>
                    </tr>
                </thead>
                <tbody id="tb_data_body"></tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="childModal" tabindex="-1" aria-labelledby="childModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="childModalLabel">Add New Learner</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editId" name="learner_id">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Learner Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="editName" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Student LRN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="editLRN" name="lrn" required maxlength="12">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Grade Level <span class="text-danger">*</span></label>
                                    <select class="form-select" id="editGrade" name="grade" required>
                                        <option value="">Select Grade Level</option>
                                        <option value="Grade 1">Grade 1</option>
                                        <option value="Grade 2">Grade 2</option>
                                        <option value="Grade 3">Grade 3</option>
                                        <option value="Grade 4">Grade 4</option>
                                        <option value="Grade 5">Grade 5</option>
                                        <option value="Grade 6">Grade 6</option>
                                        <option value="Grade 7">Grade 7</option>
                                        <option value="Grade 8">Grade 8</option>
                                        <option value="Grade 9">Grade 9</option>
                                        <option value="Grade 10">Grade 10</option>
                                        <option value="Grade 11">Grade 11</option>
                                        <option value="Grade 12">Grade 12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Date Submitted</label>
                                    <input type="date" class="form-control" id="editDate" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Parent Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="editParentName" name="parent_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Parent Contact <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="editContact" name="parent_contact" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Student Type</label>
                                    <select class="form-select" id="editType" name="type">
                                        <option value="New">New</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="Regular">Regular</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" id="editStatus" name="learner_status">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Declined">Declined</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-save me-1"></i>Save Learner
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewModalLabel">Learner Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="viewModalBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="editFromView">
                        <i class="fa fa-edit me-1"></i>Edit Learner
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
const sampleStudentData = [
    {
        learner_id: 1,
        name: "Maria Santos",
        lrn: "123456789012",
        date: "2025-06-01",
        parent_name: "Juan Santos",
        parent_contact: "09123456789",
        grade: "Grade 6",
        type: "New",
        learner_status: "Approved"
    },
    {
        learner_id: 2,
        name: "Jose Dela Cruz",
        lrn: "123456789013",
        date: "2025-06-02",
        parent_name: "Maria Dela Cruz",
        parent_contact: "09234567890",
        grade: "Grade 7",
        type: "Transfer",
        learner_status: "Pending"
    },
    {
        learner_id: 3,
        name: "Ana Reyes",
        lrn: "123456789014",
        date: "2025-06-03",
        parent_name: "Pedro Reyes",
        parent_contact: "09345678901",
        grade: "Grade 8",
        type: "Regular",
        learner_status: "Declined"
    },
    {
        learner_id: 4,
        name: "Carlos Rivera",
        lrn: "123456789015",
        date: "2025-06-04",
        parent_name: "Linda Rivera",
        parent_contact: "09456789012",
        grade: "Grade 5",
        type: "New",
        learner_status: "Approved"
    },
    {
        learner_id: 5,
        name: "Isabel Garcia",
        lrn: "123456789016",
        date: "2025-06-05",
        parent_name: "Roberto Garcia",
        parent_contact: "09567890123",
        grade: "Grade 9",
        type: "Transfer",
        learner_status: "Pending"
    }
];

let dataTable;
let currentEditId = null;

$(document).ready(function() {
    renderChildrenTable();
    bindEvents();
});

function renderChildrenTable() {
    const tbody = $('#tb_data_body');
    tbody.empty();
    
    sampleStudentData.forEach((emp, index) => {
        const row = `
            <tr>
                <td class="text-center">${index + 1}</td>
                <td>
                    <div class="d-flex flex-column">
                        <span class="fw-bold">${emp.name}</span>
                        <small class="text-muted d-md-none">LRN: ${emp.lrn}</small>
                        <small class="text-muted d-lg-none">${emp.grade}</small>
                    </div>
                </td>
                <td class="d-none d-md-table-cell">${emp.lrn}</td>
                <td class="d-none d-lg-table-cell">${formatDate(emp.date)}</td>
                <td class="d-none d-md-table-cell">
                    <div class="d-flex flex-column">
                        <span>${emp.parent_contact}</span>
                        <small class="text-muted d-lg-none">${formatDate(emp.date)}</small>
                    </div>
                </td>
                <td class="d-none d-lg-table-cell">${emp.grade}</td>
                <td class="text-center">
                    <span class="status-badge status-${emp.learner_status.toLowerCase()}">${emp.learner_status}</span>
                </td>
                <td class="text-center">
                    <div class="action-buttons">
                        <div class="btn-group-vertical d-md-none" role="group">
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.learner_id}" title="View Details">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.learner_id}" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.learner_id}" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="btn-group d-none d-md-flex" role="group">
                            <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.learner_id}" title="View Details">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-sm btn-success editBtn" data-id="${emp.learner_id}" title="Edit">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.learner_id}" title="Delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        `;
        tbody.append(row);
    });

    if ($.fn.DataTable.isDataTable('#student-tbl')) {
        $('#student-tbl').DataTable().destroy();
    }

    dataTable = $('#student-tbl').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        columnDefs: [
            { orderable: false, targets: -1 },
            { responsivePriority: 1, targets: 0 },
            { responsivePriority: 2, targets: 1 },
            { responsivePriority: 3, targets: -1 }
        ],
        language: {
            search: "Search learners:",
            lengthMenu: "Show _MENU_ learners per page",
            info: "Showing _START_ to _END_ of _TOTAL_ learners",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        }
    });

    bindTableEvents();
}

function bindEvents() {
    $('#addNewBtn').off('click').on('click', function() {
        currentEditId = null;
        $('#childModalLabel').text('Add New Learner');
        $('#childForm')[0].reset();
        $('#editId').val('');
        $('#editDate').val(new Date().toISOString().split('T')[0]);
        $('#editStatus').val('Pending');
        $('#editType').val('New');
        $('#childModal').modal('show');
    });

    $('#childForm').off('submit').on('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
            saveLearner();
        }
    });

    $('#editFromView').off('click').on('click', function() {
        $('#viewModal').modal('hide');
        const student = sampleStudentData.find(s => s.learner_id === currentEditId);
        if (student) {
            showEditModal(student);
        }
    });

    $('#refreshBtn').off('click').on('click', function() {
        renderChildrenTable();
        Swal.fire({
            title: 'Refreshed!',
            text: 'Student data has been refreshed.',
            icon: 'success',
            timer: 1500,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
    });

    $('#editLRN').off('input').on('input', function() {
        let value = $(this).val().replace(/\D/g, '');
        if (value.length > 12) value = value.substring(0, 12);
        $(this).val(value);
    });
}

function bindTableEvents() {
    $('.viewBtn').off('click').on('click', function() {
        const id = parseInt($(this).data('id'));
        const student = sampleStudentData.find(s => s.learner_id === id);
        if (student) {
            showViewModal(student);
        }
    });

    $('.editBtn').off('click').on('click', function() {
        const id = parseInt($(this).data('id'));
        const student = sampleStudentData.find(s => s.learner_id === id);
        if (student) {
            showEditModal(student);
        }
    });

    $('.trashBtn').off('click').on('click', function() {
        const id = parseInt($(this).data('id'));
        const student = sampleStudentData.find(s => s.learner_id === id);
        if (student) {
            Swal.fire({
                title: 'Are you sure?',
                html: `Delete learner <strong>"${student.name}"</strong>?<br><small class="text-muted">This action cannot be undone!</small>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: '<i class="fa fa-trash me-1"></i>Yes, delete it!',
                cancelButtonText: '<i class="fa fa-times me-1"></i>Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteLearner(id);
                }
            });
        }
    });
}

function showViewModal(student) {
    currentEditId = student.learner_id;
    const content = `
        <div class="row g-3">
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Learner Name</div>
                    <div class="view-field-value">${student.name}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Student LRN</div>
                    <div class="view-field-value">${student.lrn}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Grade Level</div>
                    <div class="view-field-value">${student.grade}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Date Submitted</div>
                    <div class="view-field-value">${formatDate(student.date)}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Parent Name</div>
                    <div class="view-field-value">${student.parent_name}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Parent Contact</div>
                    <div class="view-field-value">${student.parent_contact}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Student Type</div>
                    <div class="view-field-value">${student.type}</div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view-field">
                    <div class="view-field-label">Status</div>
                    <div class="view-field-value">
                        <span class="status-badge status-${student.learner_status.toLowerCase()}">${student.learner_status}</span>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    $('#viewModalBody').html(content);
    $('#viewModalLabel').text(`Learner Details - ${student.name}`);
    $('#viewModal').modal('show');
}

function showEditModal(student) {
    currentEditId = student.learner_id;
    $('#childModalLabel').text('Edit Learner Information');
    $('#editId').val(student.learner_id);
    $('#editName').val(student.name);
    $('#editLRN').val(student.lrn);
    $('#editGrade').val(student.grade);
    $('#editDate').val(student.date);
    $('#editParentName').val(student.parent_name);
    $('#editContact').val(student.parent_contact);
    $('#editType').val(student.type);
    $('#editStatus').val(student.learner_status);
    $('#childModal').modal('show');
}

function validateForm() {
    const requiredFields = ['editName', 'editLRN', 'editGrade', 'editParentName', 'editContact'];
    let isValid = true;
    
    $('.form-control, .form-select').removeClass('is-invalid');
    
    requiredFields.forEach(field => {
        const value = $(`#${field}`).val().trim();
        if (!value) {
            $(`#${field}`).addClass('is-invalid');
            isValid = false;
        }
    });
    
    const lrn = $('#editLRN').val().trim();
    if (lrn && !/^\d{12}$/.test(lrn)) {
        $('#editLRN').addClass('is-invalid');
        isValid = false;
    }
    
    if (!isValid) {
        Swal.fire({
            title: 'Validation Error',
            text: 'Please fill in all required fields correctly.',
            icon: 'error'
        });
    }
    
    return isValid;
}

function saveLearner() {
    const formData = {
        learner_id: $('#editId').val() || (sampleStudentData.length + 1),
        name: $('#editName').val().trim(),
        lrn: $('#editLRN').val().trim(),
        grade: $('#editGrade').val(),
        date: $('#editDate').val() || new Date().toISOString().split('T')[0],
        parent_name: $('#editParentName').val().trim(),
        parent_contact: $('#editContact').val().trim(),
        type: $('#editType').val(),
        learner_status: $('#editStatus').val()
    };
    
    const saveBtn = $('#childForm button[type="submit"]');
    const originalText = saveBtn.html();
    saveBtn.html('<i class="fa fa-spinner fa-spin me-1"></i>Saving...').prop('disabled', true);
    
    setTimeout(() => {
        if (currentEditId) {
            const index = sampleStudentData.findIndex(s => s.learner_id == currentEditId);
            if (index !== -1) {
                sampleStudentData[index] = { ...sampleStudentData[index], ...formData, learner_id: parseInt(formData.learner_id) };
            }
        } else {
            sampleStudentData.push({ ...formData, learner_id: parseInt(formData.learner_id) });
        }
        
        $('#childModal').modal('hide');
        renderChildrenTable();
        
        Swal.fire({
            title: 'Success!',
            text: `Learner ${currentEditId ? 'updated' : 'added'} successfully.`,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
        
        saveBtn.html(originalText).prop('disabled', false);
    }, 1000);
}

function deleteLearner(id) {
    const index = sampleStudentData.findIndex(s => s.learner_id == id);
    if (index !== -1) {
        const studentName = sampleStudentData[index].name;
        sampleStudentData.splice(index, 1);
        renderChildrenTable();
        
        Swal.fire({
            title: 'Deleted!',
            text: `${studentName} has been deleted successfully.`,
            icon: 'success',
            timer: 2000,
            showConfirmButton: false,
            position: 'top-end',
            toast: true
        });
    }
}

function formatDate(dateString) {
    if (!dateString) return 'N/A';
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { 
        year: 'numeric', 
        month: 'short', 
        day: 'numeric' 
    });
}

$(window).on('resize', function() {
    if (dataTable) {
        dataTable.columns.adjust().responsive.recalc();
    }
});
</script>