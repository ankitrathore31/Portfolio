<!-- Sidebar -->
<div class="sidebar bg-white border-end shadow-sm" id="sidebar">
    <div class="p-3 text-center border-bottom">
        <img src="https://via.placeholder.com/80" class="rounded-circle mb-2" alt="Profile" />
        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
        <small class="text-muted">Invertis University</small>
    </div>

    <ul class="nav flex-column p-3">
        <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="{{ route('admin') }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <!-- Project -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-kanban me-2"></i> Project
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('add.project') }}"><i class="bi bi-plus-circle me-2"></i>Add Project</a></li>
                <li><a class="dropdown-item" href="{{ route('project.list') }}"><i class="bi bi-list-check me-2"></i>Project List</a></li>
            </ul>
        </li>

        <!-- Certificate -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-award me-2"></i> Certificate
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('add.certificate') }}"><i class="bi bi-plus-circle me-2"></i>Add Certificate</a></li>
                <li><a class="dropdown-item" href="{{ route('list.certificate') }}"><i class="bi bi-collection me-2"></i>Certificate List</a></li>
            </ul>
        </li>

        <!-- Gallery -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-images me-2"></i> Gallery
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#"><i class="bi bi-upload me-2"></i>Add Photo</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-card-image me-2"></i>Photo List</a></li>
            </ul>
        </li>

        <!-- Settings -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-gear me-2"></i> Setting
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('site.setting') }}"><i class="bi bi-sliders me-2"></i>Site Setting</a></li>
            </ul>
        </li>
    </ul>
</div>
