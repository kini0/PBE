<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #2b0602;">
    <!-- Brand Logo -->
    <a href="{{ asset('/') }}" class="brand-link">
      <img src="{{ asset('dist/img/logofbi.png') }}" alt="FBI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">F B I</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Auth::user()->avatar != null)
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('/storage/'.Auth::user()->avatar)}}" alt="User profile picture">
            @else
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('/users/images/no-image.png')}}" alt="User profile picture">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('jury') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jurys/chats" class="nav-link">
              <i class="fas fa-users mr-2"></i>
              <p>
                  Tchatter
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Fiche de notation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jurys/diagram" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistiques
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/jurys/calendrier" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <!--<span class="badge badge-info right">2</span>-->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jurys/gallery" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/jurys/documentPBE" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation PBE</p>
            </a>
          </li>
          <li class="nav-item">
                <a href="/jurys/blog" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Blog</p>
                </a>
            </li>
          <li class="nav-item">
            <a href="/jurys/profile" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
              <p>Setting</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
