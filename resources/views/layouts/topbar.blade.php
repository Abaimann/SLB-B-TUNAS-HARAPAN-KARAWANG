<nav class="topbar navbar navbar-expand-lg navbar-light px-4">
  <div class="container-fluid">
    <span class="navbar-brand fw-semibold">{{ $title ?? 'Dashboard' }}</span>

    <div class="d-flex align-items-center ms-auto">
      <span class="me-2 fw-medium">{{ Auth::user()->name ?? 'Administrator' }}</span>
      <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin') }}" 
           alt="avatar" class="rounded-circle" width="35" height="35">
    </div>
  </div>
</nav>
