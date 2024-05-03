<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="profile-image">
          <img src="../assets/img/UserProfile_Pic.jpg" alt="image" />
        </div>
        <div class="profile-name">
          <p class="name">
            Welcome
            <?php


            echo ucwords(user_name($user_id));

            // echo ucwords($_SESSION['admin']); 
            ?>
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
      <a class="nav-link" href="profile.php">
        <i class="fa fa-user menu-icon"></i>
        <span class="menu-title">My Profile</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="funds.php">
        <i class="fa-solid fa-sack-dollar menu-icon"></i>
        <span class="menu-title">Add Funds</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="activate.php">
        <i class="fa-solid fa-unlock menu-icon"></i>
        <span class="menu-title">Activate ID</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="direct.php">
        <i class="fa-solid fa-users menu-icon"></i>
        <span class="menu-title">My Direct</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="team.php">
        <i class="fa-solid fa-people-group menu-icon"></i>
        <span class="menu-title">My Team</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="bank_details.php">
        <i class="fa-solid fa-building-columns menu-icon"></i>
        <span class="menu-title">Bank Details</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="daily_income.php">
        <i class="fa-solid fa-sun menu-icon"></i>
        <span class="menu-title">Daily Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="level_income.php">
        <i class="fa-solid fa-users menu-icon"></i>
        <span class="menu-title">Level Income</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="royalty_income.php">
        <i class="fa-solid fa-crown menu-icon"></i>
        <span class="menu-title">Royalty Income</span>
      </a>
    </li> -->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#page-layouts9" aria-expanded="false" aria-controls="page-layouts">
        <i class="fa-solid fa-indian-rupee-sign menu-icon"></i>
        <span class="menu-title ml-2">Income zone
</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="page-layouts9">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="wallet_total_income.php">Total Income</a></li>

          <li class="nav-item"> <a class="nav-link" href="wallet_d_i.php">Daily Mining bonus </a></li>
          <li class="nav-item"> <a class="nav-link" href="wallet_d_r.php">Direct Referal bonus </a></li>
          <li class="nav-item"> <a class="nav-link" href="wallet_l_i.php">level income</a></li>
          <li class="nav-item"> <a class="nav-link" href="wallet_r_i.php">Royalty income</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="withdraw.php">
        <i class="fa-solid fa-wallet menu-icon"></i>
        <span class="menu-title">Withdraw</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="payout.php">
        <i class="fa-solid fa-money-bill menu-icon"></i>
        <span class="menu-title">Payout</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="chat.php">
        <i class="fa-solid fa-comment menu-icon"></i>
        <span class="menu-title">Chat Support</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" href="password.php">
        <i class="fa-solid fa-lock menu-icon"></i>
        <span class="menu-title">Change Password</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="logout.php">
        <i class="fa-solid fa-power-off menu-icon"></i>
        <span class="menu-title">Logout</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="./donors.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Donors</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="./acceptor.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Acceptors</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="./request.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Requests</span>
      </a>
    </li> -->
    <!-- <li class="nav-item">
      <a class="nav-link" href="slider.php">
        <i class="fab fa-trello menu-icon"></i>
        <span class="menu-title">Manage Slider</span>
      </a>
    </li> -->




  </ul>
</nav>