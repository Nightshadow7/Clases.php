  <aside class="main-sidebar sidebar-dark-orange elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link navbar-orange">
      <img src="Views/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Psicology</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="Views/assets/img/angie.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Angie Suarez</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/" class="nav-link <?php if($routes[4] == ""): ?> active <?php endif ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/users" class="nav-link <?php if($routes[4] == "users"): ?> active <?php endif ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/clinicHistory" class="nav-link <?php if($routes[4] == "clinicHistory"): ?> active <?php endif ?>">
              <i class="nav-icon far fa-user"></i>
              <p>
                Clinic History
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/interviews" class="nav-link <?php if($routes[4] == "interviews"): ?> active <?php endif ?>">
<!--               <i class="nav-icon far fa-cart-shopping"></i>
 -->              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Interviews
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/psychologist" class="nav-link <?php if($routes[4] == "psychologist"): ?> active <?php endif ?>">
              <i class="nav-icon fal fa-head-side-medical"></i>
              <p>
                Psychologist
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/ArTeM02-064/PSYCOLOGY/Psycology/tratment" class="nav-link <?php if($routes[4] == "tratment"): ?> active <?php endif ?>">
              <i class="nav-icon fas fa-heartbeat"></i>
              <p>
                Tratment
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>