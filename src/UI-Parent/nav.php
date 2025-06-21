<style>
  .navbar {
    background: var(--white);
    border-bottom: 1px solid var(--gray-border);
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* position: sticky; */
    top: 0;
    z-index: 1000;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
  }

  .nav-brand {
    font-size: 1.1rem;
    color: var(--primary-color);
  }

  .nav-menu {
    list-style: none;
    display: flex;
    gap: 12px;
    margin: 0;
    padding: 0;
  }

  .nav-menu li a {
    text-decoration: none;
    color: var(--primary-dark);
    background: var(--light-gray);
    padding: 8px 14px;
    border-radius: 10px;
    font-size: 0.95rem;
    transition: 0.2s ease-in-out;
  }

  .nav-menu li a:hover {
    background: #e8f5e9;
  }

  .nav-menu li a.logout {
    background: #ffebee;
    color: #c62828;
  }

  .nav-menu li a.logout:hover {
    background: #ffcdd2;
  }

  /* Responsive menu tweak (optional collapse) */
  @media (max-width: 600px) {
    .nav-menu {
      flex-direction: column;
      gap: 8px;
      align-items: flex-start;
    }
  }
</style>

<nav class="navbar">
  <div class="nav-brand">
    <strong>Sta.Maria Elementary School</strong>
  </div>
  <ul class="nav-menu">
    <!--     <li><a href="parent-dashboard.php">🏠 Dashboard</a></li>
    <li><a href="#">📊 Grades</a></li>
    <li><a href="#">📆 Attendance</a></li>
    <li><a href="#">📢 Announcements</a></li> -->
    <li><a href="#">😒Profiles</a></li>
    <li><a href="logout.php" class="logout">🚪 Logout</a></li>
  </ul>
</nav>