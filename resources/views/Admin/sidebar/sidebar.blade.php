  <!-- Open Sidebar Button -->

  <button class="open-sidebar-btn" id="openSidebar">

      <i class="fas fa-bars"></i>

  </button>

  <!-- Sidebar -->

  <div class="sidebar" id="sidebar">

      <div class="container d-flex justify-content-center align-items-center">
          {{-- <div class="card shadow-lg"
              style="width: 200px; height: 40px; display: flex; align-items: center; justify-content: center;">
              <div class="card-body p-0 bg-white">
                  <h4 class="card-title text-black mt-2" style="font-size: 16px;">Hi, Akki</h4>
              </div>
          </div> --}}
      </div>

      <ul class="nav flex-column m-3 mt-5">
          <li class="nav-item mt-2">
              <a class="nav-link active" href="{{ route('admin') }}">
                  <i class="fas fa-tachometer-alt me-2"></i> Dashboard
              </a>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="fas fa-project-diagram me-2"></i> Project
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{route('add.project')}}"><i class="fas fa-plus me-2"></i> Add Project</a></li>
                  <li><a class="dropdown-item" href="{{route('project.list')}}"><i class="fas fa-list me-2"></i> Project List</a></li>
              </ul>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="fas fa-certificate me-2"></i> Certificate
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="fas fa-plus me-2"></i> Add Certificate</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-list me-2"></i> Certificate List</a></li>
              </ul>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="fas fa-image me-2"></i> Gallery
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="fas fa-upload me-2"></i> Add Photo</a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-images me-2"></i> Photo List</a></li>
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="fas fa-cog me-2"></i> Setting
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{route('site.setting')}}"><i class="fas fa-calendar-alt me-2"></i>Site Setting</a>
                  </li>
              </ul>
          </li>
      </ul>

  </div>

  <script>
      // Sidebar toggle functionality
      document.getElementById("openSidebar").addEventListener("click", function() {

          document.getElementById("sidebar").classList.toggle("active");

      });
  </script>
