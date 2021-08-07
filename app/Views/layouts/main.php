<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewpioint" content="width=device-width, initial-scale=1.0" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title></title>
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">System Login</a>
    
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if(session()->get('isLoggedIn')){ ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link " aria-current="page" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="client/profile">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/income">Add Income</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/client_income">View Income</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/client_inc_report">View Income Report</a>
        </li>

         <li class="nav-item">
          <a class="nav-link" href="/expense">Add Expense</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/client_expense">View Expense</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/client_exp_report">View Expense Report</a>
        </li>


        
       
      </ul>
      <ul class="navbar-nav my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/logout">Logout</a>
        </li>
        
      </ul>

    <?php } else{?>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
       
      </ul>
      <?php } ?>
    </div>
  </div>
</nav>



 <!--  <aside class="left-side sidebar-offcanvas">

    <section class="sidebar">

      <div class="user-panel">
          <ul class="sidebar-menu">
            <li>Hello</li>
            <li>Stranger</li>
            <li>Sheeep</li>

          </ul>      
  
      </div>

    </section>

  </aside> -->



<?= $this->renderSection('content') ?>
	
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

