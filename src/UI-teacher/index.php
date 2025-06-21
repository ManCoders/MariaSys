<?php
/* include "../authentication/functions.php"; 
render_styles();  */
include "nav.php";
?>
<!-- 
<style>
  :root {
    --primary-color: #4CAF50;
    --accent-color: #388e3c;
    --bg-color: #f9f9f9;
    --card-bg: #ffffff;
    --text-color: #222;
    --subtext-color: #555;
    --border: #e0e0e0;
    --radius: 16px;
  }

  body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    margin: 0;
    background-color: var(--bg-color);
    color: var(--text-color);


  }

  .dashboard-container {
    padding: 20px;
    max-width: 100%;
  }

  .dashboard-header {
    text-align: center;
    padding: 20px;
    background-color: var(--card-bg);
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.04);
    border-radius: var(--radius);
    margin-bottom: 20px;
  }

  .dashboard-header h1 {
    margin-bottom: 5px;
    font-size: 1.8rem;
    color: var(--accent-color);
  }

  .dashboard-header p {
    color: var(--subtext-color);
    font-size: 1rem;
  }

  .dashboard-cards {
    display: grid;
    gap: 20px;
    grid-template-columns: 1fr;
  }

  .card {
    background: var(--card-bg);
    padding: 20px;
    border-radius: var(--radius);
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.03);
    text-align: left;
  }

  .card h2 {
    margin-top: 0;
    font-size: 1.2rem;
    color: var(--accent-color);
  }

  .card p {
    font-size: 0.95rem;
    color: var(--subtext-color);
    margin: 10px 0 20px;
  }

  .card button {
    background: var(--primary-color);
    color: #fff;
    border: none;
    padding: 10px 16px;
    border-radius: 12px;
    font-size: 0.95rem;
    cursor: pointer;
    transition: 0.2s;
  }

  .card button:hover {
    background: #388e3c;
  }

  .dashboard-footer {
    text-align: center;
    margin-top: 40px;
    padding: 10px;
    font-size: 0.85rem;
    color: var(--subtext-color);
  }

  .announce {
    margin-bottom: 1rem;
  }

  /* Responsive */
  @media (min-width: 768px) {
    .dashboard-cards {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (min-width: 1024px) {
    .dashboard-cards {
      grid-template-columns: repeat(3, 1fr);
    }
  }
</style> -->
<link rel="stylesheet" href="../css/style.css">
<main class="dashboard-container">
  <header class="dashboard-header">
    <h1>👩‍🏫 Welcome, Teacher</h1>
    <p>Manage your classes, students, and daily activities.</p>
  </header>
  

  <section class="dashboard-cards">
    <div class="card">
      <h2>📚 My Classes</h2>
      <p>View and update class schedules and subjects.</p>
      <button>Go to Classes</button>
    </div>
    <div class="card">
      <h2>🧑‍🎓 Students</h2>
      <p>Manage student records, attendance, and grades.</p>
      <button>Manage Students</button>
    </div>
    <div class="card">
      <h2>🗓️ Schedule</h2>
      <p>Check your weekly teaching schedule.</p>
      <button>View Schedule</button>
    </div>

  </section>

  <footer class="dashboard-footer">
    <p>&copy; 2025 Sta.Maria Elementary School | Teacher Dashboard</p>
  </footer>
</main>