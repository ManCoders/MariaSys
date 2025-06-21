<?php include "nav.php"; ?>


<main class="dashboard-container">
  <section class="dashboard-header">
    <h1>⚙️ Admin Panel</h1>
    <p>Manage school operations, users, and records efficiently.</p>
  </section>

  <section class="dashboard-cards">
    <div class="card">
      <h2>🧑‍🏫 Teachers</h2>
      <p>Add, update, or deactivate teacher accounts.</p>
      
      <button id="teacher_id" >Manage</button>
    </div>

    <div class="card">
      <h2>🧑‍🎓 Students</h2>
      <p>Enroll students, assign to sections, manage profiles.</p>
      <button>Manage</button>
    </div>

    <div class="card">
      <h2>🏫 Classes</h2>
      <p>Create and organize subjects, sections, and grade levels.</p>
      <button>View Sections</button>
    </div>

    <div class="card">
      <h2>📢Accounts</h2>
      <p>Manage teachers, students, and parents accounts.</p>
      <button>
        Manage
      </button>
    </div>

    <div class="card">
      <h2>📊 Reports</h2>
      <p>Generate system logs, grade summaries, and attendance stats.</p>
      <button> Generate</button>
    </div>

    <div class="card">
      <h2>⚙️ System Settings</h2>
      <p>Update school year, roles, or database configs.</p>
      <button> Configure</button>
    </div>
  </section>
  <footer class="dashboard-footer">
    <p>&copy; 2025 Sta.Maria Elementary School | Admin Dashboard</p>
  </footer>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
  $('#teacher_id').click(function() {
    /* console.log("teacher_btn"); */
			uni_modal('Teacher Management', './UI-admin/forms/teacher_view.php', 'large');
		});
</script>