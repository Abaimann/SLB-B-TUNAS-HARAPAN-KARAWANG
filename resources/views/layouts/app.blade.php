<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Icon.png') }}">
    <title>SLB-B Tunas Harapan Karawang</title>
    
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">




    <!-- Custom Admin Styles -->
    @vite(['resources/css/admin.css'])
  </head>
  <body>
    <div class="d-flex">
      @include('layouts.sidebar')

      <div class="flex-grow-1">
        @include('layouts.topbar')

        <main class="p-4">
          @yield('content')
        </main>
      </div>
    </div>

    <!-- jQuery (WAJIB) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <!-- Custom Summernote Init -->
    <script src="{{ asset('assets/js/summertone.js') }}"></script>
  </body>
</html>
