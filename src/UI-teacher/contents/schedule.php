
<style>
    :root {
        --primary-color: #2c3e50;
        --primary-dark: #1a252f;
        --white: #ffffff;
        --light-gray: #f8f9fa;
        --gray-border: #e9ecef;
        --success-color: #28a745;
        --danger-color: #dc3545;
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

    .schedule-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        margin-bottom: 15px;
        overflow: hidden;
    }

    .schedule-header {
        background: var(--primary-color);
        color: var(--white);
        padding: 12px 20px;
        font-weight: 600;
    }

    .schedule-content {
        padding: 20px;
    }

    .time-slot {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--gray-border);
        transition: background-color 0.2s ease;
    }

    .time-slot:last-child {
        border-bottom: none;
    }

    .time-slot:hover {
        background-color: var(--light-gray);
    }

    .time-badge {
        background: var(--success-color);
        color: var(--white);
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        min-width: 80px;
        text-align: center;
    }

    .subject-info {
        flex: 1;
        margin-left: 15px;
    }

    .subject-name {
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 2px;
    }

    .class-info {
        color: #666;
        font-size: 14px;
    }

    .schedule-actions {
        display: flex;
        gap: 8px;
    }

    .btn-schedule {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .btn-edit {
        background: #e3f2fd;
        color: #1976d2;
    }

    .btn-edit:hover {
        background: #bbdefb;
        transform: translateY(-1px);
    }

    .btn-delete {
        background: #ffebee;
        color: #c62828;
    }

    .btn-delete:hover {
        background: #ffcdd2;
        transform: translateY(-1px);
    }

    .current-time {
        background: #fff3cd !important;
        border-left: 4px solid #ffc107;
    }

    .current-time .time-badge {
        background: #ffc107;
        color: #664d03;
    }

    .empty-schedule {
        text-align: center;
        padding: 40px;
        color: #666;
    }

    .empty-schedule i {
        font-size: 48px;
        color: #ddd;
        margin-bottom: 15px;
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

    .day-tabs {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
        background: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .day-tab {
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

    .day-tab.active {
        background: var(--primary-color);
        color: var(--white);
        border-color: var(--primary-color);
    }

    .day-tab:hover:not(.active) {
        background: #e8f5e9;
    }

    @media (max-width: 768px) {
        .day-tabs {
            flex-wrap: wrap;
        }
        
        .day-tab {
            flex: 1 1 calc(50% - 5px);
            margin-bottom: 5px;
        }
        
        .schedule-actions {
            flex-direction: column;
            gap: 5px;
        }
        
        .time-slot {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
        
        .subject-info {
            margin-left: 0;
        }
    }
</style>

<section class="p-2">
    <div>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fas fa-calendar-alt text-primary me-2"></i>My Schedule</h4>
                <small class="text-muted">View and manage your teaching schedule</small>
            </div>
            <div>
                <button class="btn btn-success btn-sm" type="button">
                    <i class="fas fa-plus"></i> Add New Schedule
                </button>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h6 class="mb-3"><i class="fas fa-bolt text-warning me-2"></i>Quick Actions</h6>
            <div class="d-flex gap-3 flex-wrap">
                <a href="#" class="action-btn">
                    <i class="fas fa-calendar-plus"></i>
                    Add Class
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-clock"></i>
                    Set Break Time
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-print"></i>
                    Print Schedule
                </a>
                <a href="#" class="action-btn">
                    <i class="fas fa-download"></i>
                    Export Schedule
                </a>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-chalkboard-teacher text-primary" style="font-size: 24px;"></i>
                    <h4>24</h4>
                    <small>Classes This Week</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-clock text-info" style="font-size: 24px;"></i>
                    <h4>32</h4>
                    <small>Teaching Hours</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-book text-warning" style="font-size: 24px;"></i>
                    <h4>8</h4>
                    <small>Different Subjects</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-coffee text-success" style="font-size: 24px;"></i>
                    <h4>5</h4>
                    <small>Break Times</small>
                </div>
            </div>
        </div>

        <!-- Day Tabs -->
        <div class="day-tabs">
            <div class="day-tab active" data-day="monday">
                <i class="fas fa-calendar-day me-1"></i>Monday
            </div>
            <div class="day-tab" data-day="tuesday">
                <i class="fas fa-calendar-day me-1"></i>Tuesday
            </div>
            <div class="day-tab" data-day="wednesday">
                <i class="fas fa-calendar-day me-1"></i>Wednesday
            </div>
            <div class="day-tab" data-day="thursday">
                <i class="fas fa-calendar-day me-1"></i>Thursday
            </div>
            <div class="day-tab" data-day="friday">
                <i class="fas fa-calendar-day me-1"></i>Friday
            </div>
            <div class="day-tab" data-day="saturday">
                <i class="fas fa-calendar-day me-1"></i>Saturday
            </div>
            <div class="day-tab" data-day="sunday">
                <i class="fas fa-calendar-day me-1"></i>Sunday
            </div>
        </div>

        <!-- Schedule Content -->
        <div class="schedule-card">
            <div class="schedule-header">
                <i class="fas fa-calendar-check me-2"></i>Monday Schedule
            </div>
            <div class="schedule-content">
                <!-- Time Slot 1 -->
                <div class="time-slot">
                    <div class="time-badge">7:30 AM</div>
                    <div class="subject-info">
                        <div class="subject-name">Mathematics</div>
                        <div class="class-info">Grade 5-A • Room 205 • 45 minutes</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 2 (Current) -->
                <div class="time-slot current-time">
                    <div class="time-badge">8:30 AM</div>
                    <div class="subject-info">
                        <div class="subject-name">English Language</div>
                        <div class="class-info">Grade 5-A • Room 205 • 45 minutes • <strong>Current Class</strong></div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 3 -->
                <div class="time-slot">
                    <div class="time-badge">9:30 AM</div>
                    <div class="subject-info">
                        <div class="subject-name">Break Time</div>
                        <div class="class-info">15 minutes break</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 4 -->
                <div class="time-slot">
                    <div class="time-badge">10:00 AM</div>
                    <div class="subject-info">
                        <div class="subject-name">Science</div>
                        <div class="class-info">Grade 5-B • Room 206 • 45 minutes</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 5 -->
                <div class="time-slot">
                    <div class="time-badge">11:00 AM</div>
                    <div class="subject-info">
                        <div class="subject-name">Filipino</div>
                        <div class="class-info">Grade 4-A • Room 204 • 45 minutes</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 6 -->
                <div class="time-slot">
                    <div class="time-badge">12:00 PM</div>
                    <div class="subject-info">
                        <div class="subject-name">Lunch Break</div>
                        <div class="class-info">60 minutes lunch break</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 7 -->
                <div class="time-slot">
                    <div class="time-badge">1:00 PM</div>
                    <div class="subject-info">
                        <div class="subject-name">Social Studies</div>
                        <div class="class-info">Grade 5-A • Room 205 • 45 minutes</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>

                <!-- Time Slot 8 -->
                <div class="time-slot">
                    <div class="time-badge">2:00 PM</div>
                    <div class="subject-info">
                        <div class="subject-name">Physical Education</div>
                        <div class="class-info">Grade 5-A • Gymnasium • 45 minutes</div>
                    </div>
                    <div class="schedule-actions">
                        <button class="btn-schedule btn-edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn-schedule btn-delete">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Empty state for other days (hidden by default) -->
        <div class="schedule-card" id="empty-schedule" style="display: none;">
            <div class="schedule-header">
                <i class="fas fa-calendar-times me-2"></i>No Schedule
            </div>
            <div class="schedule-content">
                <div class="empty-schedule">
                    <i class="fas fa-calendar-plus"></i>
                    <h6>No classes scheduled for this day</h6>
                    <p class="text-muted">Click "Add New Schedule" to create your first class schedule</p>
                    <button class="btn btn-primary btn-sm">
                        <i class="fas fa-plus me-1"></i>Add Schedule
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Day tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const dayTabs = document.querySelectorAll('.day-tab');
        const scheduleCard = document.querySelector('.schedule-card');
        const emptySchedule = document.getElementById('empty-schedule');
        
        dayTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                // Remove active class from all tabs
                dayTabs.forEach(t => t.classList.remove('active'));
                
                // Add active class to clicked tab
                this.classList.add('active');
                
                // Show/hide schedule based on selected day
                const selectedDay = this.dataset.day;
                const scheduleHeader = scheduleCard.querySelector('.schedule-header');
                
                if (selectedDay === 'monday') {
                    scheduleCard.style.display = 'block';
                    emptySchedule.style.display = 'none';
                    scheduleHeader.innerHTML = '<i class="fas fa-calendar-check me-2"></i>Monday Schedule';
                } else {
                    scheduleCard.style.display = 'none';
                    emptySchedule.style.display = 'block';
                    emptySchedule.querySelector('.schedule-header').innerHTML = `<i class="fas fa-calendar-times me-2"></i>${selectedDay.charAt(0).toUpperCase() + selectedDay.slice(1)} Schedule`;
                }
            });
        });
        
        // Schedule action handlers
        document.querySelectorAll('.btn-edit').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Edit schedule functionality would be implemented here');
            });
        });
        
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                if (confirm('Are you sure you want to delete this schedule?')) {
                    this.closest('.time-slot').remove();
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
