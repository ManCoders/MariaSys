<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Process - Teacher Panel</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<style>
    :root {
        --primary-color: #2c3e50;
        --primary-dark: #1a252f;
        --white: #ffffff;
        --light-gray: #f8f9fa;
        --gray-border: #e9ecef;
        --success-color: #28a745;
        --danger-color: #dc3545;
        --warning-color: #ffc107;
        --info-color: #17a2b8;
    }

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

    .enrollment-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        margin-bottom: 15px;
        overflow: hidden;
    }

    .enrollment-header {
        background: var(--primary-color);
        color: var(--white);
        padding: 12px 20px;
        font-weight: 600;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .enrollment-content {
        padding: 20px;
    }

    .student-item {
        display: flex;
        align-items: center;
        padding: 15px;
        border-bottom: 1px solid var(--gray-border);
        transition: background-color 0.2s ease;
    }

    .student-item:last-child {
        border-bottom: none;
    }

    .student-item:hover {
        background-color: var(--light-gray);
    }

    .student-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--light-gray);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: var(--primary-color);
        border: 2px solid var(--gray-border);
    }

    .student-info {
        flex: 1;
        margin-left: 15px;
    }

    .student-name {
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 2px;
    }

    .student-details {
        color: #666;
        font-size: 14px;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        text-align: center;
        min-width: 80px;
    }

    .status-pending {
        background: #fff3cd;
        color: #664d03;
        border: 1px solid #ffda6a;
    }

    .status-approved {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .status-rejected {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .status-incomplete {
        background: #e2e3e5;
        color: #383d41;
        border: 1px solid #ced4da;
    }

    .enrollment-actions {
        display: flex;
        gap: 8px;
        margin-left: 15px;
    }

    .btn-enrollment {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-view {
        background: #e3f2fd;
        color: #1976d2;
    }

    .btn-view:hover {
        background: #bbdefb;
        transform: translateY(-1px);
    }

    .btn-approve {
        background: #d4edda;
        color: #155724;
    }

    .btn-approve:hover {
        background: #c3e6cb;
        transform: translateY(-1px);
    }

    .btn-reject {
        background: #f8d7da;
        color: #721c24;
    }

    .btn-reject:hover {
        background: #f5c6cb;
        transform: translateY(-1px);
    }

    .filter-tabs {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
        background: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .filter-tab {
        flex: 1;
        text-align: center;
        padding: 8px 12px;
        background: var(--light-gray);
        border: 1px solid var(--gray-border);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
        color: var(--primary-dark);
    }

    .filter-tab.active {
        background: var(--primary-color);
        color: var(--white);
        border-color: var(--primary-color);
    }

    .filter-tab:hover:not(.active) {
        background: #e8f5e9;
    }

    .quick-actions {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        padding: 20px;
        margin-bottom: 20px;
    }

    .action-btn {
        background: var(--light-gray);
        border: 1px solid var(--gray-border);
        color: var(--primary-dark);
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .action-btn:hover {
        background: #e8f5e9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        color: var(--primary-dark);
        text-decoration: none;
    }

    .search-bar {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        padding: 15px;
        margin-bottom: 20px;
    }

    .search-input {
        border: 1px solid var(--gray-border);
        border-radius: 6px;
        padding: 8px 12px;
        width: 100%;
        transition: border-color 0.2s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(44, 62, 80, 0.1);
    }

    .enrollment-progress {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        padding: 20px;
        margin-bottom: 20px;
    }

    .progress-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid var(--gray-border);
    }

    .progress-item:last-child {
        border-bottom: none;
    }

    .progress-bar-custom {
        width: 100px;
        height: 8px;
        background: var(--gray-border);
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        border-radius: 4px;
        transition: width 0.3s ease;
    }

    .progress-pending { background: var(--warning-color); }
    .progress-approved { background: var(--success-color); }
    .progress-rejected { background: var(--danger-color); }

    .empty-state {
        text-align: center;
        padding: 40px;
        color: #666;
    }

    .empty-state i {
        font-size: 48px;
        color: #ddd;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .filter-tabs {
            flex-wrap: wrap;
        }
        
        .filter-tab {
            flex: 1 1 calc(50% - 5px);
            margin-bottom: 5px;
        }
        
        .enrollment-actions {
            flex-direction: column;
            gap: 5px;
        }
        
        .student-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .student-info {
            margin-left: 0;
        }
        
        .enrollment-actions {
            margin-left: 0;
            width: 100%;
            justify-content: flex-start;
        }
    }
</style>

<section class="p-2">
    <div>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fas fa-user-plus text-primary me-2"></i>Enrollment Process</h4>
                <small class="text-muted">Manage student enrollment applications and approvals</small>
            </div>
            <div>
                <button class="btn btn-success btn-sm" type="button">
                    <i class="fas fa-download"></i> Export Data
                </button>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h6 class="mb-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</h6>
            <div class="d-flex gap-3 flex-wrap">
                <a href="#" class="action-btn">
                    <i class="fas fa-check-double"></i>
                    Bulk Approve
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-file-export"></i>
                    Export List
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-bell"></i>
                    Send Notifications
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-calendar-check"></i>
                    Set Deadlines
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-users text-primary" style="font-size: 24px;"></i>
                    <h4>142</h4>
                    <small>Total Applications</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-clock text-warning" style="font-size: 24px;"></i>
                    <h4>38</h4>
                    <small>Pending Review</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-check-circle text-success" style="font-size: 24px;"></i>
                    <h4>89</h4>
                    <small>Approved</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-times-circle text-danger" style="font-size: 24px;"></i>
                    <h4>15</h4>
                    <small>Rejected</small>
                </div>
            </div>
        </div>

        <!-- Enrollment Progress Overview -->
        <div class="enrollment-progress">
            <h6 class="mb-3"><i class="fas fa-chart-line text-info me-2"></i>Enrollment Progress</h6>
            <div class="progress-item">
                <span>Applications Submitted</span>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-muted">142/150</span>
                    <div class="progress-bar-custom">
                        <div class="progress-fill progress-pending" style="width: 95%;"></div>
                    </div>
                </div>
            </div>
            <div class="progress-item">
                <span>Documents Verified</span>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-muted">104/142</span>
                    <div class="progress-bar-custom">
                        <div class="progress-fill progress-approved" style="width: 73%;"></div>
                    </div>
                </div>
            </div>
            <div class="progress-item">
                <span>Final Approval</span>
                <div class="d-flex align-items-center gap-2">
                    <span class="text-muted">89/142</span>
                    <div class="progress-bar-custom">
                        <div class="progress-fill progress-approved" style="width: 63%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="search-input" placeholder="Search by student name, ID, or parent name..." id="searchInput">
                </div>
                <div class="col-md-4">
                    <select class="search-input">
                        <option value="">All Grade Levels</option>
                        <option value="kindergarten">Kindergarten</option>
                        <option value="grade1">Grade 1</option>
                        <option value="grade2">Grade 2</option>
                        <option value="grade3">Grade 3</option>
                        <option value="grade4">Grade 4</option>
                        <option value="grade5">Grade 5</option>
                        <option value="grade6">Grade 6</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <div class="filter-tab active" data-status="all">
                <i class="fas fa-list me-1"></i>All Applications
            </div>
            <div class="filter-tab" data-status="pending">
                <i class="fas fa-clock me-1"></i>Pending
            </div>
            <div class="filter-tab" data-status="approved">
                <i class="fas fa-check-circle me-1"></i>Approved
            </div>
            <div class="filter-tab" data-status="rejected">
                <i class="fas fa-times-circle me-1"></i>Rejected
            </div>
            <div class="filter-tab" data-status="incomplete">
                <i class="fas fa-exclamation-triangle me-1"></i>Incomplete
            </div>
        </div>

        <!-- Enrollment Applications -->
        <div class="enrollment-card">
            <div class="enrollment-header">
                <span><i class="fas fa-file-alt me-2"></i>Enrollment Applications</span>
                <span class="badge bg-light text-dark">142 Total</span>
            </div>
            <div class="enrollment-content">
                <!-- Student 1 -->
                <div class="student-item" data-status="pending">
                    <div class="student-avatar">MJ</div>
                    <div class="student-info">
                        <div class="student-name">Maria Jose Santos</div>
                        <div class="student-details">Grade 5 • Applied: Dec 15, 2024 • Parent: Carmen Santos</div>
                    </div>
                    <div class="status-badge status-pending">Pending</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-enrollment btn-approve">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn-enrollment btn-reject">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Student 2 -->
                <div class="student-item" data-status="approved">
                    <div class="student-avatar">JD</div>
                    <div class="student-info">
                        <div class="student-name">Juan Miguel dela Cruz</div>
                        <div class="student-details">Grade 3 • Applied: Dec 12, 2024 • Parent: Rosa dela Cruz</div>
                    </div>
                    <div class="status-badge status-approved">Approved</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Student 3 -->
                <div class="student-item" data-status="incomplete">
                    <div class="student-avatar">AG</div>
                    <div class="student-info">
                        <div class="student-name">Ana Grace Reyes</div>
                        <div class="student-details">Grade 1 • Applied: Dec 10, 2024 • Parent: Linda Reyes</div>
                    </div>
                    <div class="status-badge status-incomplete">Incomplete</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-enrollment btn-approve">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn-enrollment btn-reject">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Student 4 -->
                <div class="student-item" data-status="rejected">
                    <div class="student-avatar">CM</div>
                    <div class="student-info">
                        <div class="student-name">Carlos Miguel Torres</div>
                        <div class="student-details">Grade 6 • Applied: Dec 8, 2024 • Parent: Roberto Torres</div>
                    </div>
                    <div class="status-badge status-rejected">Rejected</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Student 5 -->
                <div class="student-item" data-status="pending">
                    <div class="student-avatar">SL</div>
                    <div class="student-info">
                        <div class="student-name">Sofia Luna Mendoza</div>
                        <div class="student-details">Grade 2 • Applied: Dec 14, 2024 • Parent: Patricia Mendoza</div>
                    </div>
                    <div class="status-badge status-pending">Pending</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn-enrollment btn-approve">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn-enrollment btn-reject">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Student 6 -->
                <div class="student-item" data-status="approved">
                    <div class="student-avatar">DR</div>
                    <div class="student-info">
                        <div class="student-name">Daniel Rafael Garcia</div>
                        <div class="student-details">Grade 4 • Applied: Dec 11, 2024 • Parent: Elena Garcia</div>
                    </div>
                    <div class="status-badge status-approved">Approved</div>
                    <div class="enrollment-actions">
                        <button class="btn-enrollment btn-view">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty state for filtered results -->
        <div class="enrollment-card" id="empty-results" style="display: none;">
            <div class="enrollment-header">
                <span><i class="fas fa-search me-2"></i>No Results Found</span>
            </div>
            <div class="enrollment-content">
                <div class="empty-state">
                    <i class="fas fa-search"></i>
                    <h6>No applications found</h6>
                    <p class="text-muted">Try adjusting your search criteria or filters</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        const studentItems = document.querySelectorAll('.student-item');
        const searchInput = document.getElementById('searchInput');
        const enrollmentCard = document.querySelector('.enrollment-card');
        const emptyResults = document.getElementById('empty-results');
        
        // Filter functionality
        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                filterTabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                const selectedStatus = this.dataset.status;
                let visibleCount = 0;
                
                studentItems.forEach(item => {
                    const itemStatus = item.dataset.status;
                    
                    if (selectedStatus === 'all' || itemStatus === selectedStatus) {
                        item.style.display = 'flex';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
                
                // Show/hide empty state
                if (visibleCount === 0) {
                    enrollmentCard.style.display = 'none';
                    emptyResults.style.display = 'block';
                } else {
                    enrollmentCard.style.display = 'block';
                    emptyResults.style.display = 'none';
                    
                    // Update header count
                    const headerBadge = enrollmentCard.querySelector('.badge');
                    headerBadge.textContent = `${visibleCount} Total`;
                }
            });
        });
        
        // Search functionality
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;
            
            studentItems.forEach(item => {
                const studentName = item.querySelector('.student-name').textContent.toLowerCase();
                const studentDetails = item.querySelector('.student-details').textContent.toLowerCase();
                
                if (studentName.includes(searchTerm) || studentDetails.includes(searchTerm)) {
                    if (item.style.display !== 'none') {
                        visibleCount++;
                    }
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Show/hide empty state based on search
            if (visibleCount === 0 && searchTerm !== '') {
                enrollmentCard.style.display = 'none';
                emptyResults.style.display = 'block';
            } else if (searchTerm === '') {
                // Reset to current filter when search is cleared
                const activeTab = document.querySelector('.filter-tab.active');
                activeTab.click();
            }
        });
        
        // Action button handlers
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', function() {
                const studentName = this.closest('.student-item').querySelector('.student-name').textContent;
                alert(`View details for: ${studentName}`);
            });
        });
        
        document.querySelectorAll('.btn-approve').forEach(btn => {
            btn.addEventListener('click', function() {
                const studentItem = this.closest('.student-item');
                const studentName = studentItem.querySelector('.student-name').textContent;
                
                if (confirm(`Approve enrollment for: ${studentName}?`)) {
                    const statusBadge = studentItem.querySelector('.status-badge');
                    statusBadge.className = 'status-badge status-approved';
                    statusBadge.textContent = 'Approved';
                    studentItem.dataset.status = 'approved';
                    
                    // Hide approve/reject buttons
                    this.style.display = 'none';
                    studentItem.querySelector('.btn-reject').style.display = 'none';
                }
            });
        });
        
        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', function() {
                const studentItem = this.closest('.student-item');
                const studentName = studentItem.querySelector('.student-name').textContent;
                
                if (confirm(`Reject enrollment for: ${studentName}?`)) {
                    const statusBadge = studentItem.querySelector('.status-badge');
                    statusBadge.className = 'status-badge status-rejected';
                    statusBadge.textContent = 'Rejected';
                    studentItem.dataset.status = 'rejected';
                    
                    // Hide approve/reject buttons
                    this.style.display = 'none';
                    studentItem.querySelector('.btn-approve').style.display = 'none';
                }
            });
        });
        
        // Quick action handlers
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                alert(`${this.textContent.trim()} functionality would be implemented here`);
            });
        });
    });
</script>
</body>
</html>