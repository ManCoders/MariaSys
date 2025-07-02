<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - Teacher Panel</title>
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

    .settings-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
        margin-bottom: 20px;
        overflow: hidden;
    }

    .settings-header {
        background: var(--primary-color);
        color: var(--white);
        padding: 15px 20px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .settings-content {
        padding: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: var(--primary-dark);
        margin-bottom: 8px;
        display: block;
    }

    .form-control-custom {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid var(--gray-border);
        border-radius: 6px;
        font-size: 14px;
        transition: all 0.2s ease;
        background: var(--white);
    }

    .form-control-custom:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(44, 62, 80, 0.1);
    }

    .form-control-custom:disabled {
        background: var(--light-gray);
        color: #666;
    }

    .btn-settings {
        padding: 10px 20px;
        border-radius: 6px;
        border: none;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-primary-custom {
        background: var(--primary-color);
        color: var(--white);
    }

    .btn-primary-custom:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-success-custom {
        background: var(--success-color);
        color: var(--white);
    }

    .btn-success-custom:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-danger-custom {
        background: var(--danger-color);
        color: var(--white);
    }

    .btn-danger-custom:hover {
        background: #c82333;
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    .btn-secondary-custom {
        background: var(--light-gray);
        color: var(--primary-dark);
        border: 1px solid var(--gray-border);
    }

    .btn-secondary-custom:hover {
        background: #e8f5e9;
        transform: translateY(-1px);
    }

    .profile-photo-section {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
        padding: 20px;
        background: var(--light-gray);
        border-radius: 8px;
    }

    .profile-photo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background: var(--primary-color);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--white);
        font-size: 36px;
        font-weight: bold;
        border: 4px solid var(--white);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .photo-actions {
        flex: 1;
    }

    .photo-actions h6 {
        color: var(--primary-dark);
        margin-bottom: 10px;
    }

    .photo-actions p {
        color: #666;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 24px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .toggle-slider {
        background-color: var(--success-color);
    }

    input:checked + .toggle-slider:before {
        transform: translateX(26px);
    }

    .notification-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid var(--gray-border);
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-info h6 {
        margin: 0 0 5px 0;
        color: var(--primary-dark);
        font-weight: 600;
    }

    .notification-info p {
        margin: 0;
        color: #666;
        font-size: 14px;
    }

    .settings-tabs {
        display: flex;
        gap: 5px;
        margin-bottom: 25px;
        background: white;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid var(--gray-border);
    }

    .settings-tab {
        flex: 1;
        text-align: center;
        padding: 10px 15px;
        background: var(--light-gray);
        border: 1px solid var(--gray-border);
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
        color: var(--primary-dark);
    }

    .settings-tab.active {
        background: var(--primary-color);
        color: var(--white);
        border-color: var(--primary-color);
    }

    .settings-tab:hover:not(.active) {
        background: #e8f5e9;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .security-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        border: 1px solid var(--gray-border);
        border-radius: 8px;
        margin-bottom: 15px;
        background: var(--light-gray);
    }

    .security-info h6 {
        margin: 0 0 5px 0;
        color: var(--primary-dark);
    }

    .security-info p {
        margin: 0;
        color: #666;
        font-size: 14px;
    }

    .password-strength {
        height: 4px;
        border-radius: 2px;
        margin-top: 8px;
        overflow: hidden;
        background: var(--gray-border);
    }

    .strength-bar {
        height: 100%;
        transition: width 0.3s ease;
        border-radius: 2px;
    }

    .strength-weak { background: var(--danger-color); width: 25%; }
    .strength-fair { background: var(--warning-color); width: 50%; }
    .strength-good { background: #fd7e14; width: 75%; }
    .strength-strong { background: var(--success-color); width: 100%; }

    .alert-custom {
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        border: 1px solid;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .alert-warning {
        background: #fff3cd;
        color: #664d03;
        border-color: #ffda6a;
    }

    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .settings-tabs {
            flex-wrap: wrap;
        }
        
        .settings-tab {
            flex: 1 1 calc(50% - 5px);
            margin-bottom: 5px;
        }
        
        .profile-photo-section {
            flex-direction: column;
            text-align: center;
        }
        
        .two-column {
            grid-template-columns: 1fr;
        }
        
        .notification-item,
        .security-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }
    }
</style>

<section class="p-2">
    <div>
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fas fa-cog text-primary me-2"></i>Account Settings</h4>
                <small class="text-muted">Manage your account preferences and security settings</small>
            </div>
            <div>
                <button class="btn btn-success btn-sm" type="button">
                    <i class="fas fa-save"></i> Save Changes
                </button>
            </div>
        </div>

        <!-- Settings Tabs -->
        <div class="settings-tabs">
            <div class="settings-tab active" data-tab="profile">
                <i class="fas fa-user me-1"></i>Profile
            </div>
            <div class="settings-tab" data-tab="security">
                <i class="fas fa-shield-alt me-1"></i>Security
            </div>
            <div class="settings-tab" data-tab="notifications">
                <i class="fas fa-bell me-1"></i>Notifications
            </div>
            <div class="settings-tab" data-tab="preferences">
                <i class="fas fa-sliders-h me-1"></i>Preferences
            </div>
        </div>

        <!-- Profile Tab -->
        <div class="tab-content active" id="profile">
            <!-- Profile Photo Section -->
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-camera"></i>
                    <span>Profile Photo</span>
                </div>
                <div class="settings-content">
                    <div class="profile-photo-section">
                        <div class="profile-photo">JS</div>
                        <div class="photo-actions">
                            <h6>Update Profile Picture</h6>
                            <p>Upload a new profile picture. Recommended size: 200x200 pixels. Max file size: 2MB.</p>
                            <div class="d-flex gap-2">
                                <button class="btn-settings btn-primary-custom">
                                    <i class="fas fa-upload"></i>Upload New
                                </button>
                                <button class="btn-settings btn-secondary-custom">
                                    <i class="fas fa-trash"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-user-edit"></i>
                    <span>Personal Information</span>
                </div>
                <div class="settings-content">
                    <div class="two-column">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control-custom" value="Juan" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control-custom" value="Santos" placeholder="Enter last name">
                        </div>
                    </div>
                    
                    <div class="two-column">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control-custom" value="juan.santos@stamariaschool.edu.ph" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control-custom" value="+63 912 345 6789" placeholder="Enter phone number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control-custom" value="123 Main Street, Sta. Maria, Bulacan" placeholder="Enter address">
                    </div>

                    <div class="two-column">
                        <div class="form-group">
                            <label class="form-label">Employee ID</label>
                            <input type="text" class="form-control-custom" value="EMP-2024-001" disabled>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Department</label>
                            <input type="text" class="form-control-custom" value="Elementary Education" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Bio / About</label>
                        <textarea class="form-control-custom" rows="4" placeholder="Tell us about yourself...">Experienced elementary school teacher with 8 years of experience in education. Passionate about creating engaging learning environments for young learners.</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button class="btn-settings btn-success-custom">
                            <i class="fas fa-save"></i>Save Changes
                        </button>
                        <button class="btn-settings btn-secondary-custom">
                            <i class="fas fa-undo"></i>Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Security Tab -->
        <div class="tab-content" id="security">
            <!-- Change Password -->
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span>
                </div>
                <div class="settings-content">
                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control-custom" placeholder="Enter current password">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control-custom" placeholder="Enter new password" id="newPassword">
                        <div class="password-strength">
                            <div class="strength-bar strength-weak" id="strengthBar"></div>
                        </div>
                        <small class="text-muted">Password strength: <span id="strengthText">Weak</span></small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control-custom" placeholder="Confirm new password">
                    </div>

                    <button class="btn-settings btn-primary-custom">
                        <i class="fas fa-lock"></i>Update Password
                    </button>
                </div>
            </div>

            <!-- Security Settings -->
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-shield-alt"></i>
                    <span>Security Settings</span>
                </div>
                <div class="settings-content">
                    <div class="security-item">
                        <div class="security-info">
                            <h6>Two-Factor Authentication</h6>
                            <p>Add an extra layer of security to your account</p>
                        </div>
                        <button class="btn-settings btn-success-custom">
                            <i class="fas fa-plus"></i>Enable
                        </button>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h6>Login Alerts</h6>
                            <p>Get notified when someone logs into your account</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h6>Active Sessions</h6>
                            <p>Manage devices that are currently logged in</p>
                        </div>
                        <button class="btn-settings btn-secondary-custom">
                            <i class="fas fa-list"></i>View Sessions
                        </button>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h6>Account Recovery</h6>
                            <p>Update your recovery email and phone number</p>
                        </div>
                        <button class="btn-settings btn-secondary-custom">
                            <i class="fas fa-edit"></i>Update
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Tab -->
        <div class="tab-content" id="notifications">
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-bell"></i>
                    <span>Notification Preferences</span>
                </div>
                <div class="settings-content">
                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Email Notifications</h6>
                            <p>Receive notifications via email</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Student Enrollment Updates</h6>
                            <p>Get notified when new students enroll in your class</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Grade Submission Reminders</h6>
                            <p>Receive reminders for grade submission deadlines</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Parent Messages</h6>
                            <p>Get notified when parents send you messages</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>System Announcements</h6>
                            <p>Receive important updates from school administration</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Schedule Changes</h6>
                            <p>Get notified about changes to your teaching schedule</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preferences Tab -->
        <div class="tab-content" id="preferences">
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-sliders-h"></i>
                    <span>Display Preferences</span>
                </div>
                <div class="settings-content">
                    <div class="two-column">
                        <div class="form-group">
                            <label class="form-label">Language</label>
                            <select class="form-control-custom">
                                <option value="en">English</option>
                                <option value="fil">Filipino</option>
                                <option value="es">Spanish</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Timezone</label>
                            <select class="form-control-custom">
                                <option value="Asia/Manila">Asia/Manila (GMT+8)</option>
                                <option value="UTC">UTC (GMT+0)</option>
                            </select>
                        </div>
                    </div>

                    <div class="two-column">
                        <div class="form-group">
                            <label class="form-label">Date Format</label>
                            <select class="form-control-custom">
                                <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                                <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                                <option value="YYYY-MM-DD">YYYY-MM-DD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Time Format</label>
                            <select class="form-control-custom">
                                <option value="12">12-hour (AM/PM)</option>
                                <option value="24">24-hour</option>
                            </select>
                        </div>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Dark Mode</h6>
                            <p>Switch to dark theme for better viewing in low light</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="notification-item">
                        <div class="notification-info">
                            <h6>Compact View</h6>
                            <p>Show more information in less space</p>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button class="btn-settings btn-success-custom">
                            <i class="fas fa-save"></i>Save Preferences
                        </button>
                        <button class="btn-settings btn-secondary-custom">
                            <i class="fas fa-undo"></i>Reset to Default
                        </button>
                    </div>
                </div>
            </div>

            <!-- Account Management -->
            <div class="settings-card">
                <div class="settings-header">
                    <i class="fas fa-user-cog"></i>
                    <span>Account Management</span>
                </div>
                <div class="settings-content">
                    <div class="alert-custom alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Important:</strong> These actions cannot be undone. Please contact your administrator if you need help.
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h6>Export Data</h6>
                            <p>Download a copy of your account data and activity</p>
                        </div>
                        <button class="btn-settings btn-secondary-custom">
                            <i class="fas fa-download"></i>Export
                        </button>
                    </div>

                    <div class="security-item">
                        <div class="security-info">
                            <h6>Deactivate Account</h6>
                            <p>Temporarily disable your account (can be reactivated)</p>
                        </div>
                        <button class="btn-settings btn-danger-custom">
                            <i class="fas fa-pause"></i>Deactivate
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching functionality
        const settingsTabs = document.querySelectorAll('.settings-tab');
        const tabContents = document.querySelectorAll('.tab-content');
        
        settingsTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.dataset.tab;
                
                // Remove active class from all tabs and contents
                settingsTabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));
                
                // Add active class to clicked tab and corresponding content
                this.classList.add('active');
                document.getElementById(targetTab).classList.add('active');
            });
        });
        
        // Password strength checker
        const newPasswordInput = document.getElementById('newPassword');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        
        if (newPasswordInput) {
            newPasswordInput.addEventListener('input', function() {
                const password = this.value;
                let strength = 0;
                let strengthClass = '';
                let strengthLabel = '';
                
                // Check password criteria
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]/)) strength++;
                if (password.match(/[A-Z]/)) strength++;
                if (password.match(/[0-9]/)) strength++;
                if (password.match(/[^a-zA-Z0-9]/)) strength++;
                
                // Determine strength level
                if (strength <= 1) {
                    strengthClass = 'strength-weak';
                    strengthLabel = 'Weak';
                } else if (strength <= 2) {
                    strengthClass = 'strength-fair';
                    strengthLabel = 'Fair';
                } else if (strength <= 3) {
                    strengthClass = 'strength-good';
                    strengthLabel = 'Good';
                } else {
                    strengthClass = 'strength-strong';
                    strengthLabel = 'Strong';
                }
                
                // Update UI
                strengthBar.className = `strength-bar ${strengthClass}`;
                strengthText.textContent = strengthLabel;
            });
        }
        
        // Toggle switches
        document.querySelectorAll('.toggle-switch input').forEach(toggle => {
            toggle.addEventListener('change', function() {
                console.log(`${this.closest('.notification-item, .security-item').querySelector('h6').textContent} toggled: ${this.checked}`);
            });
        });
        
        // Form submission handlers
        document.querySelectorAll('.btn-settings').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                const buttonText = this.textContent.trim();
                
                if (buttonText.includes('Save') || buttonText.includes('Update')) {
                    // Show success message
                    this.innerHTML = '<i class="fas fa-check"></i>Saved!';
                    this.style.background = 'var(--success-color)';
                    
                    setTimeout(() => {
                        this.innerHTML = buttonText.includes('Save') ? 
                            '<i class="fas fa-save"></i>Save Changes' : 
                            '<i class="fas fa-lock"></i>Update Password';
                        this.style.background = '';
                    }, 2000);
                } else if (buttonText.includes('Enable')) {
                    alert('Two-Factor Authentication setup would be implemented here');
                } else if (buttonText.includes('Deactivate')) {
                    if (confirm('Are you sure you want to deactivate your account? This action can be reversed by contacting administration.')) {
                        alert('Account deactivation process would be implemented here');
                    }
                } else {
                    alert(`${buttonText} functionality would be implemented here`);
                }
            });
        });
        
        // Photo upload simulation
        document.querySelector('.btn-primary-custom').addEventListener('click', function() {
            const input = document.createElement('input');
            input.type = 'file';
            input.accept = 'image/*';
            input.click();
            
            input.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    alert('Photo upload functionality would be implemented here');
                }
            });
        });
    });
</script>
</body>
</html>