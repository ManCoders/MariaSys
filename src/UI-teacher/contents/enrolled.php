<section class="p-2 w-100 rounded-2 BG-white">
    <div class="rounded-2 h-100">
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

        <!-- Search Bar -->
        <div class="search-bar">
            <div class="row">
                <div class="col-md-8">
                    <input type="text" class="search-input" placeholder="Search by student name, ID, or parent name..."
                        id="searchInput">
                </div>
                <div class="col-md-4">
                    <select class="search-input" id="gradeLevelFilter">
                        <option value="">All Grade Levels</option>
                        <option value="Kindergarten">Kindergarten</option>
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
    <!-- Approval Confirmation Modal -->
    <!-- Enhanced Approval Confirmation Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="approvalModalLabel">
                        <i class="fas fa-user-check me-2"></i>Confirm Enrollment Approval
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="approvalModalContent">
                        <p>You are about to approve the enrollment for:</p>
                        <div class="alert alert-light border">
                            <strong id="studentNamePreview">Loading student...</strong><br>
                            <small class="text-muted" id="studentLrnPreview">LRN: Loading...</small>
                        </div>
                        <div class="alert alert-warning mt-3">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            This action will immediately activate the student's account.
                        </div>
                    </div>
                    <div id="approvalError" class="alert alert-danger d-none">
                        <i class="fas fa-times-circle me-2"></i>
                        <span id="errorMessage">Error message</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-success" id="confirmApproveBtn">
                        <i class="fas fa-check me-1"></i> Confirm Approval
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>