<?php
include('components/header_2.php');
include('models/student/getFromStudent.php');
include('models/club/getFromClub.php');
if (!isset($_SESSION["id"])) {
	header("location:/login");
}
$whoAmI = getStudent($db,$_SESSION["id"]);
if ($whoAmI['email'] != 'admin@admin.com'){
  header("location:/login");
}
$students = getAllStudent($db);

$clubsName = getAllClubsByName($db);
$names_arr = [];
$nbr_array = [];
$i = 0;
foreach ($clubsName as $clubname) {
  $names_arr[$i]['name'] = $clubname['name'];
  $names_arr[$i]['members'] = $clubname['members'];
  $i++;
}
file_put_contents('views/data.json', json_encode($names_arr));
?>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script>
        $(document).ready(function() {
          var datarr = [];
          var dps = [];
          var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
              text: "Daily Club Joining"
            },
            axisX: {
              title: "Club"
            },
            axisY: {
              title: "Members"
            },
            legend: {
              cursor: "pointer",
              fontSize: 16
            },
            toolTip: {
              shared: true
            },
            data: [{
              name: " Club Members",
              type: "column",
              showInLegend: true,
              dataPoints: datarr
            }]
          });
          function adddata(data) {
            for (const i of data){
              datarr.push({
                label: i['name'],
                y: parseInt(i['members'])
              });
            }
            chart.render();
          };
          console.log(datarr);
          
          $.getJSON("views/data.json", adddata);
        });
      </script>
      <div id="chartContainer" style="height: 300px; width: 100%;"></div>

      <h2>Current Users</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Data Of Joining</th>
              <th>Level</th>
              <th>Major</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $student) { ?>
              <tr>
                <td><?php echo htmlspecialchars($student['firstname'] . ' ' . $student['lastname']); ?></td>
                <td><?php echo htmlspecialchars($student['email']); ?></td>
                <td><?php echo htmlspecialchars($student['tele']); ?></td>
                <td><?php echo htmlspecialchars($student['gender']); ?></td>
                <td><?php echo htmlspecialchars($student['address']); ?></td>
                <td><?php echo htmlspecialchars($student['joining_date']); ?></td>
                <td><?php echo htmlspecialchars($student['level']); ?></td>
                <td><?php echo htmlspecialchars($student['major']); ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
<?php include('components/footer_3.php'); ?>

</html>