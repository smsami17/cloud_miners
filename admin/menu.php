<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="images/user.png" alt="image" />
        </div>
        <div class="profile-name">
          <p class="name">
            Welcome
            <?php
            $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$_SESSION[admin]'");
            $data_admin = mysqli_fetch_array($admin);

            echo ucwords($data_admin['username']);

            // echo ucwords($_SESSION['admin']); 
            ?>
          </p>
          <p class="designation">

          </p>
        </div>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" href="dashboard.php">
        <i class="fa fa-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>




    <li class="nav-item">
      <a class="nav-link" href="./users.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Users</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./fund.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Fund Requests</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./payout.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Withdrawl Requests</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./daily_income.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Daily Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./direct_income.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Direct Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./level_income.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Level Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./royalty_income.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Royalty Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./wallet.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Wallet</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./transaction.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Transactions</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./activation_request.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Activation Request</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./chat.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Chat</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./top_earners.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Top Withdrawls</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="slider.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Slider</span>
      </a>
    </li> -->




  </ul>
</nav>