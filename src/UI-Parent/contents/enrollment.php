<style>
    .stats-card {
        background: white;
        padding: 20px;
        text-align: center;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
    }
    
    .stats-card i {
        font-size: 24px;
        margin-bottom: 10px;
        color: #666;
    }
    
    .stats-card h5 {
        margin: 5px 0;
        color: #333;
    }
    
    .stats-card small {
        color: #777;
    }
    
    .status-badge {
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .status-approved {
        background-color: #e8f5e8;
        color: #2d5a2d;
        border: 1px solid #c3e6c3;
    }
    
    .status-pending {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffda6a;
    }
    
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
    
    .btn-action {
        padding: 4px 8px;
        margin: 0 2px;
        border-radius: 4px;
        border: 1px solid #ddd;
        background: white;
        color: #666;
        transition: 0.2s;
    }
    
    .btn-action:hover {
        background-color: #f8f9fa;
        border-color: #adb5bd;
    }
    
    .btn-action.view {
        border-color: #b3d7ff;
        color: #0056b3;
    }
    
    .btn-action.edit {
        border-color: #ffda6a;
        color: #664d03;
    }
    
    .btn-action.delete {
        border-color: #f5c6cb;
        color: #721c24;
    }
</style>

<section class="p-2">
    <div>
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h4 class="mb-0"><i class="fa fa-user-plus text-primary me-2"></i>Child Enrollment</h4>
                <small class="text-muted">Register and link your child to your parent account</small>
            </div>
            <button class="btn btn-success btn-sm" id="addChildBtn">
                <i class="fa fa-plus"></i> Link New Child
            </button>
        </div>

        <!-- Enrollment Status Cards -->
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-users"></i>
                    <h5 id="totalChildren">2</h5>
                    <small>Linked Children</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-clock"></i>
                    <h5 id="pendingEnrollments">1</h5>
                    <small>Pending Requests</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-check-circle"></i>
                    <h5 id="approvedEnrollments">2</h5>
                    <small>Approved</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fa fa-times-circle"></i>
                    <h5 id="rejectedEnrollments">0</h5>
                    <small>Rejected</small>
                </div>
            </div>
        </div>

        <!-- Children List Table -->
        <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                <h6 class="mb-0" style="color: #555;">My Children</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover mb-0" id="children-tbl">
                    <thead class="table-light text-dark">
                        <tr>
                            <th class="text-center" style="width:5%">#</th>
                            <th>Child Name</th>
                            <th>Student LRN</th>
                            <th>Grade Level</th>
                            <th>Section</th>
                            <th>Date Enrolled</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="children-data-body"></tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add/Edit Child Modal -->
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm">
                    <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title" style="color: #555;">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="childId">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Student LRN *</label>
                                <input type="text" class="form-control" id="studentLRN" placeholder="Enter 12-digit LRN" required>
                                <small class="text-muted">The official Learner Reference Number assigned to your child</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Child's Full Name *</label>
                                <input type="text" class="form-control" id="childName" placeholder="Last Name, First Name MI" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Date of Birth *</label>
                                <input type="date" class="form-control" id="childBirthdate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Relationship to Child *</label>
                                <select class="form-control" id="relationship" required>
                                    <option value="">Select Relationship</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Grandmother">Grandmother</option>
                                    <option value="Grandfather">Grandfather</option>
                                    <option value="Aunt">Aunt</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="verificationCode" placeholder="Code from school">
                                <small class="text-muted">Optional: Verification code provided by the school</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Emergency Contact Number *</label>
                                <input type="tel" class="form-control" id="emergencyContact" placeholder="09XXXXXXXXX" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Additional Notes</label>
                            <textarea class="form-control" id="notes" rows="3" placeholder="Any special instructions or information..."></textarea>
                        </div>

                        <div class="alert alert-light" style="border: 1px solid #d1ecf1; background-color: #e8f4fd; color: #0c5460;">
                            <i class="fa fa-info-circle me-2"></i>
                            <strong>Note:</strong> Your enrollment request will be verified by the school administration. You will receive a notification once the verification is complete.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Submit Request
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Details Modal -->
    <div class="modal fade" id="viewChildModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                    <h5 class="modal-title" style="color: #555;">Child Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="childDetailsContent">
                    <!-- Content will be populated by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Sample data for demonstration
    const childrenData = [
        {
            id: 1,
            name: "Maria Santos",
            lrn: "123456789012",
            grade: "Grade 5",
            section: "Section A",
            dateEnrolled: "2024-08-15",
            status: "Approved",
            relationship: "Mother",
            emergencyContact: "09123456789"
        },
        {
            id: 2,
            name: "Juan Santos",
            lrn: "123456789013",
            grade: "Grade 3",
            section: "Section B",
            dateEnrolled: "2024-08-15",
            status: "Approved",
            relationship: "Mother",
            emergencyContact: "09123456789"
        },
        {
            id: 3,
            name: "Ana Santos",
            lrn: "123456789014",
            grade: "Grade 1",
            section: "Section C",
            dateEnrolled: "2024-11-20",
            status: "Pending",
            relationship: "Mother",
            emergencyContact: "09123456789"
        }
    ];

    let dataTable;

    function renderChildrenTable() {
        const tbody = $('#children-data-body');
        tbody.html('');
        let i = 1;

        childrenData.forEach(child => {
            const statusBadge = getStatusBadge(child.status);
            const actions = getActionButtons(child);
            
            const tr = $('<tr></tr>');
            tr.html(`
                <td class="text-center">${i++}</td>
                <td><strong>${child.name}</strong></td>
                <td><code style="background-color: #f8f9fa; padding: 2px 4px; border-radius: 3px;">${child.lrn}</code></td>
                <td>${child.grade}</td>
                <td>${child.section}</td>
                <td>${formatDate(child.dateEnrolled)}</td>
                <td class="text-center">${statusBadge}</td>
                <td class="text-center">${actions}</td>
            `);
            tbody.append(tr);
        });

        updateStatsCards();
    }

    function getStatusBadge(status) {
        const badges = {
            'Approved': '<span class="status-badge status-approved">Approved</span>',
            'Pending': '<span class="status-badge status-pending">Pending</span>',
            'Rejected': '<span class="status-badge status-rejected">Rejected</span>'
        };
        return badges[status] || '<span class="status-badge">Unknown</span>';
    }

    function getActionButtons(child) {
        return `
            <button class="btn-action view" onclick="viewChild(${child.id})" title="View Details">
                <i class="fa fa-eye"></i>
            </button>
            <button class="btn-action edit" onclick="editChild(${child.id})" title="Edit">
                <i class="fa fa-edit"></i>
            </button>
            ${child.status === 'Pending' ? 
                `<button class="btn-action delete" onclick="cancelRequest(${child.id})" title="Cancel Request">
                    <i class="fa fa-times"></i>
                </button>` : ''
            }
        `;
    }

    function updateStatsCards() {
        const total = childrenData.length;
        const pending = childrenData.filter(c => c.status === 'Pending').length;
        const approved = childrenData.filter(c => c.status === 'Approved').length;
        const rejected = childrenData.filter(c => c.status === 'Rejected').length;

        $('#totalChildren').text(total);
        $('#pendingEnrollments').text(pending);
        $('#approvedEnrollments').text(approved);
        $('#rejectedEnrollments').text(rejected);
    }

    function formatDate(dateStr) {
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', { 
            year: 'numeric', 
            month: 'short', 
            day: 'numeric' 
        });
    }

    function viewChild(id) {
        const child = childrenData.find(c => c.id === id);
        if (child) {
            const content = `
                <div class="row">
                    <div class="col-6"><strong>Name:</strong></div>
                    <div class="col-6">${child.name}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>LRN:</strong></div>
                    <div class="col-6"><code style="background-color: #f8f9fa; padding: 2px 4px; border-radius: 3px;">${child.lrn}</code></div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Grade & Section:</strong></div>
                    <div class="col-6">${child.grade} - ${child.section}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Relationship:</strong></div>
                    <div class="col-6">${child.relationship}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Emergency Contact:</strong></div>
                    <div class="col-6">${child.emergencyContact}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Date Enrolled:</strong></div>
                    <div class="col-6">${formatDate(child.dateEnrolled)}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-6"><strong>Status:</strong></div>
                    <div class="col-6">${getStatusBadge(child.status)}</div>
                </div>
            `;
            $('#childDetailsContent').html(content);
            $('#viewChildModal').modal('show');
        }
    }

    function editChild(id) {
        const child = childrenData.find(c => c.id === id);
        if (child) {
            $('#childId').val(child.id);
            $('#studentLRN').val(child.lrn);
            $('#childName').val(child.name);
            $('#relationship').val(child.relationship);
            $('#emergencyContact').val(child.emergencyContact);
            $('#childModal').modal('show');
        }
    }

    function cancelRequest(id) {
        if (confirm('Are you sure you want to cancel this enrollment request?')) {
            const index = childrenData.findIndex(c => c.id === id);
            if (index > -1) {
                childrenData.splice(index, 1);
                renderChildrenTable();
                showNotification('Enrollment request cancelled successfully', 'info');
            }
        }
    }

    function showNotification(message, type = 'success') {
        // You can implement a toast notification system here
        alert(message);
    }

    // Event Handlers
    $(document).ready(function() {
        renderChildrenTable();

        $('#addChildBtn').click(function() {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });

        $('#childForm').submit(function(e) {
            e.preventDefault();
            
            const formData = {
                id: $('#childId').val() || Date.now(),
                name: $('#childName').val(),
                lrn: $('#studentLRN').val(),
                grade: 'TBD', // Will be assigned by school
                section: 'TBD', // Will be assigned by school
                dateEnrolled: new Date().toISOString().split('T')[0],
                status: 'Pending',
                relationship: $('#relationship').val(),
                emergencyContact: $('#emergencyContact').val()
            };

            if ($('#childId').val()) {
                // Update existing
                const index = childrenData.findIndex(c => c.id == formData.id);
                if (index > -1) {
                    childrenData[index] = {...childrenData[index], ...formData};
                    showNotification('Child information updated successfully');
                }
            } else {
                // Add new
                childrenData.push(formData);
                showNotification('Enrollment request submitted successfully');
            }

            renderChildrenTable();
            $('#childModal').modal('hide');
        });

        // LRN validation
        $('#studentLRN').on('input', function() {
            let value = $(this).val().replace(/\D/g, ''); // Remove non-digits
            if (value.length > 12) {
                value = value.substring(0, 12);
            }
            $(this).val(value);
        });

        // Phone number validation
        $('#emergencyContact').on('input', function() {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 11) {
                value = value.substring(0, 11);
            }
            $(this).val(value);
        });
    });
</script>