document.addEventListener('DOMContentLoaded', function() {
    // DOM Elements
    const filterTabs = document.querySelectorAll('.filter-tab');
    const enrollmentContent = document.querySelector('.enrollment-content');
    const searchInput = document.getElementById('searchInput');
    const gradeLevelSelect = document.getElementById('gradeLevelFilter');
    const enrollmentCard = document.querySelector('.enrollment-card');
    const emptyResults = document.getElementById('empty-results');
    const headerBadge = enrollmentCard.querySelector('.badge');

    // State variables
    let currentStatusFilter = 'all';
    let currentGradeFilter = '';
    let allLearners = [];
    let filteredLearners = [];

    // Initial load
    fetchEnrollmentData('all');

    // Filter tab functionality
    filterTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active tab
            filterTabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            // Update status filter and refresh data
            currentStatusFilter = this.dataset.status;
            applyFilters();
        });
    });

    // Search functionality
    searchInput.addEventListener('input', function() {
        applyFilters();
    });

    // Grade level filter functionality
    gradeLevelSelect.addEventListener('change', function() {
        currentGradeFilter = this.value;
        applyFilters();
    });

    // Function to fetch enrollment data
    // Modify the fetchEnrollmentData function
    function fetchEnrollmentData(status) {
        showLoadingState();

        // Build URL with parameters
        const url = new URL(`${base_url}/authentication/action.php`);
        url.searchParams.append('action', 'fetch_enrollment_applications');
        url.searchParams.append('status', status);

        // Only add grade_level parameter if a specific grade is selected
        if (currentGradeFilter && currentGradeFilter !== '') {
            url.searchParams.append('grade_level', currentGradeFilter);
        }

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log('API Response:', data); // Debugging
                if (data.status === 1) {
                    allLearners = data.data;
                    applyFilters();
                    headerBadge.textContent = `${filteredLearners.length} Total`;
                } else {
                    console.error('API Error:', data.message);
                    showErrorState(data.message || 'Failed to load enrollment data. Please try again.');
                }
            })
            .catch(error => {
                console.error('Fetch Error:', error);
                showErrorState('Network error occurred. Please check your connection.');
            });
    }

    // Update the grade level change handler
    gradeLevelSelect.addEventListener('change', function() {
        currentGradeFilter = this.value === '' ? '' : this.value;
        fetchEnrollmentData(currentStatusFilter); // Fetch fresh data when grade changes
    });

    // Function to apply all filters (search, status, grade level)
    function applyFilters() {
        filteredLearners = allLearners.filter(learner => {
            // Status filter
            const statusMatch = currentStatusFilter === 'all' ||
                learner.reg_status.toLowerCase() === currentStatusFilter;

            // Search term filter
            const searchTerm = searchInput.value.toLowerCase();
            const searchMatch = !searchTerm ||
                `${learner.given_name} ${learner.family_name}`.toLowerCase().includes(searchTerm) ||
                learner.lrn.toString().includes(searchTerm) ||
                learner.mother_name.toLowerCase().includes(searchTerm);

            // Grade level filter
            const gradeMatch = !currentGradeFilter ||
                (learner.grade_level && learner.grade_level.toLowerCase() === currentGradeFilter
                    .toLowerCase());

            return statusMatch && searchMatch && gradeMatch;
        });

        renderEnrollmentData(filteredLearners);
        updateHeaderBadge();
    }

    // Function to update the header badge count
    function updateHeaderBadge() {
        headerBadge.textContent = `${filteredLearners.length} Total`;
    }

    // Function to render enrollment data
    function renderEnrollmentData(learners) {
    if (learners.length === 0) {
        toggleEmptyState(true);
        return;
    }

    enrollmentContent.innerHTML = '';

    learners.forEach(learner => {
        const fullName =
            `${learner.given_name} ${learner.middle_name ? learner.middle_name.charAt(0) + '.' : ''} ${learner.family_name}`;
        const initials = `${learner.given_name.charAt(0)}${learner.family_name.charAt(0)}`;
        const appliedDate = new Date(learner.created_at).toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric',
            year: 'numeric'
        });

        // Add grade level if available in your data
        const gradeInfo = learner.grade_level ? ` • ${learner.grade_level}` : '';

        const studentItem = document.createElement('div');
        studentItem.className = 'student-item';
        studentItem.dataset.status = learner.reg_status.toLowerCase();

        studentItem.innerHTML = `
            <div class="student-avatar">${initials}</div>
            <div class="student-info">
                <div class="student-name">${fullName}</div>
                <div class="student-details">LRN: ${learner.lrn} • Applied: ${appliedDate}${gradeInfo} • Parent: ${learner.mother_name}</div>
            </div>
            <div class="status-badge status-${learner.reg_status.toLowerCase()}">${learner.reg_status}</div>
            <div class="enrollment-actions">
                <button class="btn-enrollment btn-view" data-id="${learner.learner_id}" onclick="viewProfile(${learner.learner_id})">
                    <i class="fas fa-eye"></i> Profile
                </button>
                ${learner.reg_status === 'Pending' || learner.reg_status === 'Invalidation' ? `
                    <button class="btn-enrollment btn-approve" data-id="${learner.learner_id}">
                        <i class="fas fa-check"></i> Approve
                    </button>
                    <button class="btn-enrollment btn-reject" data-id="${learner.learner_id}">
                        <i class="fas fa-times"></i> Reject
                    </button>
                ` : ''}
            </div>
        `;

        enrollmentContent.appendChild(studentItem);
    });

    // Re-attach event listeners to new elements
    attachActionHandlers();
    toggleEmptyState(false);
    }
    
    // PROFILE VIEWIUNG HANDLER =================================================================
    document.addEventListener('click', function(e) {
        if (e.target.closest('.btn-view')) {
            const learnerId = e.target.closest('.btn-view').dataset.id;
            
            // Create a form and submit it with the learner ID
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = 'index.php?page=contents/student/student_view';
            
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'learner_id';
            input.value = learnerId;
            
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    });
    // Function to toggle empty state
    function toggleEmptyState(showEmpty) {
        if (showEmpty) {
            enrollmentCard.style.display = 'none';
            emptyResults.style.display = 'block';
        } else {
            enrollmentCard.style.display = 'block';
            emptyResults.style.display = 'none';
        }
    }

    // Function to show loading state
    function showLoadingState() {
        enrollmentContent.innerHTML = `
            <div class="text-center py-5">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Loading enrollment data...</p>
            </div>
        `;
    }

    // Function to show error state
    function showErrorState(message) {
        enrollmentContent.innerHTML = `
            <div class="alert alert-danger">
                ${message}
                <button class="btn btn-sm btn-outline-danger ms-2" onclick="location.reload()">
                    <i class="fas fa-sync-alt"></i> Retry
                </button>
            </div>
        `;
    }

    // Function to attach action handlers
    function attachActionHandlers() {
        // View button handler
        document.querySelectorAll('.btn-view').forEach(btn => {
            btn.addEventListener('click', function() {
                const learnerId = this.dataset.id;
                viewLearnerDetails(learnerId);
            });
        });

        // Approve button handler
        document.querySelectorAll('.btn-approve').forEach(btn => {
            btn.addEventListener('click', function() {
                const learnerId = this.dataset.id;
                updateEnrollmentStatus(learnerId, 'Approved');
            });
        });

        // Reject button handler
        document.querySelectorAll('.btn-reject').forEach(btn => {
            btn.addEventListener('click', function() {
                const learnerId = this.dataset.id;
                updateEnrollmentStatus(learnerId, 'Rejected');
            });
        });
    }

    function viewLearnerDetails(learnerId) {
        console.log('View learner details:', learnerId);
    }

    function updateEnrollmentStatus(learnerId, status) {
        fetch(`${base_url}/authentication/action.php?action=update_enrollment_status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    learner_id: learnerId,
                    status: status
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 1) {
                    fetchEnrollmentData(currentStatusFilter);

                    Swal.fire({
                        title: 'Success!',
                        text: `Enrollment ${status.toLowerCase()} successfully`,
                        icon: 'success',
                        timer: 3000
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: data.message || 'Failed to update status',
                        icon: 'error'
                    });
                }
            })
            .catch(error => {
                console.error('Update error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Network error occurred',
                    icon: 'error'
                });
            });
    }
});