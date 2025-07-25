<div class="container vh-100">
   <!-- Dashboard Header -->
   <div class="text-center mb-2">
      <h3 class="fw-bold text-danger mb-0 ">Welcome to Parent Dashboard</h3>
      <p class="text-muted mb-2">Here are your children's profiles and their current statuses.</p>
      <button type="button" class="btn btn-danger" id="register_child" data-bs-toggle="modal"
         data-bs-target="#enrollmentModal"> <i class="fa fa-user-plus me-3"></i>Enrolled
         Your Child </button>
   </div>

   <!-- Child Profiles Grid -->
   <div class="row g-4 justify-content-center">
      <!-- Child Profile Card 1 -->
      <div class="col-md-6 col-lg-4">
         <div class="card h-100 shadow-sm">
            <div class="card-header bg-primary ">
               <h5 class="mb-0 text-white">Maria Santos</h5>
            </div>
            <div class="card-body">
               <div class="col-md-12 text-center">
                  <img src="../../assets/image/users.png" class="avatar  w-50 h-auto" alt="">
               </div>
               <div class="row text-center">
                  <div class="col-md-4">
                  <span>Grade 9</span>
                  <p><strong>Grade</strong></p>
               </div>
               <div class="col-md-4">
                 <span>9 Year Old</span>
                  <p><strong>Age</strong></p>
               </div>
               <div class="col-md-4">
                  <span>Male</span>
                  <p><strong>Gender</strong></p>
               </div>
               </div>
            </div>
            <span class="badge bg-warning col-md-5 mx-auto text-white">Status: On Leave</span>
            <div class="card-footer mx-auto mb-0">
               <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#viewEnrolleeModal"><i
                     class="fa fa-eye me-2"></i>View</button>
            </div>
         </div>
      </div>

      <!-- Child Profile Card 2 -->
      <div class="col-md-6 col-lg-4">
         <div class="card h-100 shadow-sm">
            <div class="card-header bg-primary ">
               <h5 class="mb-0 text-white">Maria Santos</h5>
            </div>
            <div class="card-body">
               <div class="col-md-12 text-center">
                  <img src="../../assets/image/users.png" class="avatar  w-50 h-auto" alt="">
               </div>
               <div class="row text-center">
                  <div class="col-md-4">
                  <span>Grade 9</span>
                  <p><strong>Grade</strong></p>
               </div>
               <div class="col-md-4">
                 <span>Grade 9</span>
                  <p><strong>Age</strong></p>
               </div>
               <div class="col-md-4">
                  <<span>Grade 9</span>
                  <p><strong>Gender</strong></p>
               </div>
               </div>
            </div>
            <span class="badge bg-warning col-md-5 mx-auto text-white">Status: On Leave</span>
            <div class="card-footer mx-auto mb-0">
               <button class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#viewEnrolleeModal"><i
                     class="fa fa-eye me-2"></i>View</button>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Enrollment Modal -->
<div class="modal fade" id="enrollmentModal" tabindex="-1" aria-labelledby="enrollmentModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <form>
            <div class="modal-header">
               <h5 class="modal-title" id="enrollmentModalLabel">Elementary Learner Enrollment Form</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
               <!-- Learner Info -->
               <div class="container">
                  <div class="row">
                     <!-- Learner's Last Name -->
                     <div class="col-md-3 mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                     </div>

                     <!-- Learner's First Name -->
                     <div class="col-md-3 mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                     </div>

                     <!-- Learner's Middle Name -->
                     <div class="col-md-3 mb-3">
                        <label for="middleName" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middleName" name="middleName">
                     </div>
                     <!-- Place of Birth -->
                     <div class="col-md-3 mb-3">
                        <label for="suffix" class="form-label">Suffix</label>
                        <select class="form-select" id="suffix" name="suffix" required>
                           <option value="" selected disabled>Select Suffix</option>
                           <option>Jr.</option>
                           <option>Sr.</option>
                           <option>II</option>
                           <option>III</option>
                        </select>
                     </div>

                     <!-- Birthdate -->
                     <div class="col-md-6 mb-3">
                        <label for="birthdate" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                     </div>

                     <!-- Place of Birth -->
                     <div class="col-md-6 mb-3">
                        <label for="birthPlace" class="form-label">Place of Birth</label>
                        <input type="text" class="form-control" id="birthPlace" name="birthPlace" required>
                     </div>


                     <!-- Sex -->
                     <div class="col-md-6 mb-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-select" id="sex" name="sex" required>
                           <option value="" selected disabled>Select Sex</option>
                           <option>Male</option>
                           <option>Female</option>
                        </select>
                     </div>

                     <!-- Grade Level -->
                     <div class="col-md-6 mb-3">
                        <label for="gradeLevel" class="form-label">Grade Level Applying For</label>
                        <select class="form-select" id="gradeLevel" name="gradeLevel" required>
                           <option value="" selected disabled>Select Grade Level</option>
                           <option>Kindergarten</option>
                           <option>Grade 1</option>
                           <option>Grade 2</option>
                           <option>Grade 3</option>
                           <option>Grade 4</option>
                           <option>Grade 5</option>
                           <option>Grade 6</option>
                        </select>
                     </div>

                     <!-- Guardian's Name -->
                     <div class="col-md-6 mb-3">
                        <label for="guardianName" class="form-label">Parent/Guardian Full Name</label>
                        <input type="text" class="form-control" id="guardianName" name="guardianName" required>
                     </div>

                     <!-- Relationship -->
                     <div class="col-md-6 mb-3">
                        <label for="relationship" class="form-label">Relationship to Learner</label>
                        <input type="text" class="form-control" id="relationship" name="relationship" required
                           placeholder="e.g., Mother, Father">
                     </div>

                     <!-- Guardian Occupation -->
                     <div class="col-md-6 mb-3">
                        <label for="guardianOccupation" class="form-label">Occupation</label>
                        <input type="text" class="form-control" id="guardianOccupation" name="guardianOccupation">
                     </div>

                     <!-- Contact Number -->
                     <div class="col-md-6 mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" name="contactNumber"
                           placeholder="e.g., 0917xxxxxxx" required>
                     </div>

                     <!-- Home Address (full-width) -->
                     <div class="col-12 mb-3">
                        <label for="address" class="form-label">Complete Home Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2"
                           placeholder="Street, Barangay, City/Municipality, Province" required></textarea>
                     </div>
                  </div>
               </div>

            </div>

            <div class="modal-footer">
               <button type="submit" class="btn btn-success">Submit Enrollment</button>
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

         </form>
      </div>
   </div>
</div>


<!-- Enrollee Info View Modal -->
<div class="modal fade" id="viewEnrolleeModal" tabindex="-1" aria-labelledby="viewEnrolleeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewEnrolleeModalLabel">Enrollee Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div >

          <!-- Image and Name -->
          <div class="row align-items-start mb-4">
            <div class="col-md-3 text-center">
              <img src="../../assets/image/users.png" class="img-thumbnail rounded-circle w-75" alt="Profile Picture">
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-4 mb-2">
                  <label class="form-label fw-bold">Last Name:</label>
                  <div class="form-control-plaintext">Dela Cruz</div>
                </div>
                <div class="col-md-4 mb-2">
                  <label class="form-label fw-bold">First Name:</label>
                  <div class="form-control-plaintext">Juan</div>
                </div>
                <div class="col-md-4 mb-2">
                  <label class="form-label fw-bold">Middle Name:</label>
                  <div class="form-control-plaintext">Santos</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Personal Information -->
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Date of Birth:</label>
              <div class="form-control-plaintext">2015-09-15</div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Place of Birth:</label>
              <div class="form-control-plaintext">Quezon City</div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Sex:</label>
              <div class="form-control-plaintext">Male</div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Grade Level:</label>
              <div class="form-control-plaintext">Grade 3</div>
            </div>
          </div>

          <!-- Guardian Information -->
          <hr>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Parent/Guardian Name:</label>
              <div class="form-control-plaintext">Maria Dela Cruz</div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Relationship:</label>
              <div class="form-control-plaintext">Mother</div>
            </div>

            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Occupation:</label>
              <div class="form-control-plaintext">Teacher</div>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label fw-bold">Contact Number:</label>
              <div class="form-control-plaintext">09171234567</div>
            </div>
          </div>

          <!-- Address -->
          <hr>
          <div class="row">
            <div class="col-12 mb-3">
              <label class="form-label fw-bold">Complete Address:</label>
              <div class="form-control-plaintext">
                123 Sampaguita St., Brgy. Malinis, Quezon City, Metro Manila
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="editEnrolleeBtn" data-bs-toggle="modal" data-bs-target="#editEnrolleeModal">Edit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<!-- Edit Enrollee Info Modal -->
<div class="modal fade" id="editEnrolleeModal" tabindex="-1" aria-labelledby="editEnrolleeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <form id="editEnrolleeForm">
        <div class="modal-header">
          <h5 class="modal-title" id="editEnrolleeModalLabel">Edit Enrollee Information</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div >

            <!-- Image and Name -->
            <div class="row align-items-start mb-4">
              <div class="col-md-3 text-center">
                <img src="../../assets/image/users.png" class="img-thumbnail rounded-circle w-75" alt="Profile Picture">
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label for="lastName" class="form-label fw-bold">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" value="Dela Cruz" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="firstName" class="form-label fw-bold">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" value="Juan" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="middleName" class="form-label fw-bold">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" value="Santos">
                  </div>
                </div>
              </div>
            </div>

            <!-- Personal Information -->
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="birthdate" class="form-label fw-bold">Date of Birth</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" value="2015-09-15" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="birthPlace" class="form-label fw-bold">Place of Birth</label>
                <input type="text" class="form-control" id="birthPlace" name="birthPlace" value="Quezon City" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="sex" class="form-label fw-bold">Sex</label>
                <select class="form-select" id="sex" name="sex" required>
                  <option value="Male" selected>Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="gradeLevel" class="form-label fw-bold">Grade Level</label>
                <select class="form-select" id="gradeLevel" name="gradeLevel" required>
                  <option selected>Grade 3</option>
                  <option>Kindergarten</option>
                  <option>Grade 1</option>
                  <option>Grade 2</option>
                  <option>Grade 4</option>
                  <option>Grade 5</option>
                  <option>Grade 6</option>
                </select>
              </div>
            </div>

            <!-- Guardian Information -->
            <hr>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="guardianName" class="form-label fw-bold">Parent/Guardian Name</label>
                <input type="text" class="form-control" id="guardianName" name="guardianName" value="Maria Dela Cruz" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="relationship" class="form-label fw-bold">Relationship</label>
                <input type="text" class="form-control" id="relationship" name="relationship" value="Mother" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="guardianOccupation" class="form-label fw-bold">Occupation</label>
                <input type="text" class="form-control" id="guardianOccupation" name="guardianOccupation" value="Teacher">
              </div>
              <div class="col-md-6 mb-3">
                <label for="contactNumber" class="form-label fw-bold">Contact Number</label>
                <input type="tel" class="form-control" id="contactNumber" name="contactNumber" value="09171234567" required>
              </div>
            </div>

            <!-- Address -->
            <hr>
            <div class="row">
              <div class="col-12 mb-3">
                <label for="address" class="form-label fw-bold">Complete Address</label>
                <textarea class="form-control" id="address" name="address" rows="2" required>123 Sampaguita St., Brgy. Malinis, Quezon City, Metro Manila</textarea>
              </div>
            </div>

          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>



