<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .icon-circle {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      font-size: 18px;
    }
  </style>
</head>
<body> -->

<div class="container py-4">
  <h4 class="mb-4">Admin Dashboard</h4>

  <!-- Stats Cards -->
  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card p-3 text-center">
        <div class="icon-circle bg-success text-white mx-auto mb-2">
          👩‍🎓
        </div>
        <div>Students</div>
        <h5>150000</h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 text-center">
        <div class="icon-circle bg-primary text-white mx-auto mb-2">
          👨‍🏫
        </div>
        <div>Teachers</div>
        <h5>2250</h5>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card p-3 text-center">
        <div class="icon-circle bg-warning text-white mx-auto mb-2">
          👨‍👩‍👧‍👦
        </div>
        <div>Parents</div>
        <h5>5690</h5>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row g-3">
    <div class="col-md-3">
      <div class="card p-3">
        <h6>Students</h6>
        <canvas id="studentsChart" height="200"></canvas>
        <div class="d-flex justify-content-between mt-3">
          <span>Female: <strong>45,000</strong></span>
          <span>Male: <strong>1,05,000</strong></span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script>

  // Expenses Chart
  const expensesCtx = document.getElementById('expensesChart').getContext('2d');
  new Chart(expensesCtx, {
    type: 'bar',
    data: {
      labels: ['Jan 2019', 'Feb 2019', 'Mar 2019'],
      datasets: [{
        label: 'Expenses',
        data: [15000, 10000, 8000],
        backgroundColor: ['#20c997', '#007bff', '#fd7e14']
      }]
    }
  });

  // Students Chart
  const studentsCtx = document.getElementById('studentsChart').getContext('2d');
  new Chart(studentsCtx, {
    type: 'doughnut',
    data: {
      labels: ['Female Students', 'Male Students'],
      datasets: [{
        data: [45000, 105000],
        backgroundColor: ['#375de7', '#ffa500'],
        hoverOffset: 4
      }]
    }
  });
</script>
<!-- 
</body>
</html> -->
