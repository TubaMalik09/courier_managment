<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<style>
 /* Table Styling */
.table {
  width: 100%;
  border-collapse: collapse;
  font-size: 15px;
}

.table thead {
  background: #f1f3f6;
}

.table th {
  text-align: left;
  padding: 12px 15px;
  font-weight: 600;
  color: #444;
  border-bottom: 2px solid #e0e6ed;
}

.table td {
  padding: 12px 15px;
  border-bottom: 1px solid #e9edf3;
  transition: background 0.2s ease;
}

.table tbody tr:hover {
  background: #f9fbfd;
}

/* Make tables responsive */
.table-responsive {
  width: 100%;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
}

/* Responsive layout tweaks */
@media (max-width: 992px) {
  .col-xl-3 {
    flex: 0 0 50%;
    max-width: 50%;
  }
  .col-xl-8 {
    margin-left: 0 !important;
  }
}

@media (max-width: 768px) {
  .col-md-6, .col-lg-6, .col-xl-3, .col-xl-8 {
    flex: 0 0 100%;
    max-width: 100%;
  }

  .card {
    margin-bottom: 20px;
  }

  /* Reduce padding for smaller screens */
  .table th, .table td {
    padding: 8px 10px;
    font-size: 14px;
  }
}

/* Fix margin-left custom inline styles on small devices */
@media (max-width: 768px) {
  [style*="margin-left"] {
    margin-left: 0 !important;
  }
}

/* Fix card that goes outside because of margin-left */
@media (max-width: 1200px) {
  [style*="margin-left: 170px"],
  [style*="margin-left: 210px"] {
    margin-left: 0 !important;
  }
}

/* Make sure color system cards stack properly */
@media (max-width: 992px) {
  .col-lg-6 {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

.top-services-container {
  max-width: 900px;   /* limit width */
  margin: 0 auto;     /* center horizontally */
}

@media (max-width: 992px) {
  .top-services-container {
    max-width: 100%;
    padding: 0 15px;
  }
}


/* Stat Cards */
.stat-card {
  border: none;
  border-radius: 16px;
  background: #ffffff;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  position: relative;
  overflow: hidden;
}

.stat-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

.stat-card .card-body {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 24px;
}

.stat-card .label {
  font-size: 14px;
  font-weight: 600;
  color: #6c757d;
  margin-bottom: 4px;
}

.stat-card h4 {
  margin: 0;
  font-size: 22px;
  font-weight: 700;
  color: #343a40;
}

.stat-card .icon-glass {
  background: #f1f3f9;
  border-radius: 12px;
  padding: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.stat-card .icon-glass i {
  color: #4e73df; /* Primary blue */
}

/* Fix uneven card heights */
.stat-card {
  height: 100%;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .stat-card .card-body {
    padding: 16px;
  }
  .stat-card h4 {
    font-size: 18px;
  }
}

</style>
<body id="page-top">

   <?php
   include_once("navbar.php")
   ?>
   <?php
// Count services
$serviceQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM service");
$serviceCount = 0;
if ($serviceQuery && mysqli_num_rows($serviceQuery) > 0) {
    $row = mysqli_fetch_assoc($serviceQuery);
    $serviceCount = $row['total'];
}
?>

<?php
// Count services
$branchQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM branch");
$branchCount = 0;
if ($branchQuery && mysqli_num_rows($branchQuery) > 0) {
    $row = mysqli_fetch_assoc($branchQuery);
    $branchCount = $row['total'];
}
?>

<?php
// Count services
$agentQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM agent");
$agentCount = 0;
if ($agentQuery && mysqli_num_rows($agentQuery) > 0) {
    $row = mysqli_fetch_assoc($agentQuery);
    $agentCount = $row['total'];
}
?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <div class="row">

<!-- Branches -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card stat-card">
        <div class="card-body">
            <div>
                <div class="label">Branches</div>
                <h4><?php echo $branchCount; ?></h4>
            </div>
            <div class="icon-glass">
                <i class="fas fa-code-branch fa-2x"></i>
            </div>
        </div>
    </div>
</div>

<!-- Agents -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card stat-card">
        <div class="card-body">
            <div>
                <div class="label">Agents</div>
                <h4><?php echo $agentCount; ?></h4>
            </div>
            <div class="icon-glass">
                <i class="fas fa-user-tie fa-2x"></i>
            </div>
        </div>
    </div>
</div>

<!-- Services -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card stat-card">
        <div class="card-body">
            <div>
                <div class="label">Services</div>
                <h4><?php echo $serviceCount; ?></h4>
            </div>
            <div class="icon-glass">
                <i class="fas fa-clipboard-list fa-2x"></i>
            </div>
        </div>
    </div>
</div>

<!-- Pending Requests -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card stat-card">
        <div class="card-body">
            <div>
                <div class="label">Pending Requests</div>
                <h4>18</h4>
            </div>
            <div class="icon-glass">
                <i class="fas fa-comments fa-2x"></i>
            </div>
        </div>
    </div>
</div>

</div>



                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7" style="margin-left: 170px;">
                            <div class="card shadow mb-4" >
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 3 Open Branches</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div class="table-responsive">
                                <table  class="table table-hover align-middle"  >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    
                                    <?php
                               $run = mysqli_query($conn, "SELECT * FROM branch order by record_time desc limit 3" );
                               if ($run && mysqli_num_rows($run) > 0) {
                                   while ($row = mysqli_fetch_array($run)) {
                                       ?>
                                 <tr>
                                <td><?php echo $row[0]; ?></td>
                                <td><?php echo $row[1]; ?></td> 
                                <td><?php echo $row[5]; ?></td> 
                                <td><?php echo $row[7]; ?></td> 
 
                                </tr>
                                </tbody>
                                           <?php
                                    
                                   }}
?>
                                </table>
                                </div>
                                </div>
                            </div>
                        </div>



    


                           <!-- Wrapper card with shared header -->
                           <div class="card shadow mb-4 top-services-container">
    <!-- Shared Header -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Top 3 Services</h6>
    </div>

    <!-- Body that holds your service cards -->
    <div class="card-body">
        <div class="row">
            <?php
            $run = mysqli_query($conn, "SELECT * FROM service ORDER BY record_time DESC LIMIT 3");
            if ($run && mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_array($run)) { ?>
                    
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="card bg-primary text-white shadow h-100">
                            <div class="card-body">
                                <?php echo $row[1]; ?>
                                <div class="text-white-50 small">$<?php echo $row[3]; ?></div>
                            </div>
                        </div>
                    </div>

            <?php }} ?>
        </div>
    </div>
</div>



</div>
</div>

                            






  <?php
  include_once("footer.php")
  ?>
</body>

</html>