<!-- side bar containt  -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <img src="upload/w3care1.png" alt="W3CARE" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">IT Professional</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <?php include "config.php";
        $id=1;
        $sql = "select * from users where id=" . $id;
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        ?>
        <a href="#" class="d-block"><?php echo $row['name']; ?>

          <!-- <a href="#" class="d-block">Amir Saifi</a> -->
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="index.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Deshboard
            </p>
          </a>
        </li>
      
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-project-diagram"></i>
            <p>
              Project Management
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="client-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Client</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="category-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="project-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Project</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              SETTINGS
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="header-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>HEADER SETTINGS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="sitesetting-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> SOCIAL MEDIA SETTINGS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="banner-index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p> BANNERS</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              static page
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="resume.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>RESUME </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="aboutdata.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ABOUT </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="privacydata.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>PRIVACY </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="termdata.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>TERM </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="faqdata.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQ </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="profile.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              profile Update
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="passwordchange.php" class="nav-link">
            <i class="nav-icon ffas fa-lock"></i>
            <p>
              Password Change
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.siebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<!-- sidebar close -->