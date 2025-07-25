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
            <div class="card-header bg-success text-white">
               <h5 class="mb-0 text-white">Juan Dela Cruz</h5>
            </div>
            <div class="card-body">
               <p><strong>Grade:</strong> 5 - Section A</p>
               <p><strong>Age:</strong> 11</p>
               <p><strong>Gender:</strong> Male</p>
            </div>
            <div class="card-footer mx-auto">
               <span class="badge bg-success">Status: Active</span>
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
               <p><strong>Grade:</strong> 3 - Section B</p>
               <p><strong>Age:</strong> 9</p>
               <p><strong>Gender:</strong> Female</p>
            </div>
            <div class="card-footer mx-auto">
               <span class="badge bg-warning text-white">Status: On Leave</span>
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