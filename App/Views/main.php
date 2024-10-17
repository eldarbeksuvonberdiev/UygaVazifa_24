<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $action ?></title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="Assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="Assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="Assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="Assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="Assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="Assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="Assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="Assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="Assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="Assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="Assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="Assets/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="/logout" style="text-decoration: none;color:red;font-weight:bold;"><i class="bi bi-box-arrow-in-right me-4"> LogOut</i></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- <a href="/" class="brand-link">
        <img src="Assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a> -->

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-4 d-flex">
          <div class="image">
            <img src="Assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="/" class="d-block" style="text-decoration: none;"><?= $_SESSION['auth']->name ?></a>
          </div>
        </div>

        <nav class="mt-4">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <?php
            if ($_SESSION['auth']->role == 'admin') { ?>
              <li class="nav-item mt-3">
                <a href="/" class="nav-link active">
                  <i class="bi bi-list-task"></i>
                  <p>
                    Tasks
                  </p>
                </a>
              </li>
              <li class="nav-item mt-3">
                <a href="/users" class="nav-link active">
                  <i class="bi bi-people"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
            <?php } else { ?>
              <li class="nav-item mt-3">
                <a href="/" class="nav-link active">
                  <i class="bi bi-list-task"></i>
                  <p>
                    User Tasks
                  </p>
                </a>
              </li>

            <?php }
            ?>
          </ul>
        </nav>
      </div>
    </aside>

    <?= $content ?>

    <footer class="main-footer">
      <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
      </div> -->
    </footer>

    <script src="Assets/plugins/jquery/jquery.min.js"></script>
    <script src="Assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/plugins/chart.js/Chart.min.js"></script>
    <script src="Assets/plugins/sparklines/sparkline.js"></script>
    <script src="Assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="Assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="Assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="Assets/plugins/moment/moment.min.js"></script>
    <script src="Assets/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="Assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="Assets/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="Assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="Assets/dist/js/adminlte.js"></script>
    <script src="Assets/dist/js/demo.js"></script>
    <script src="Assets/dist/js/pages/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!--Table scripts -->
    <script src="Assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="Assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="Assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="Assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="Assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="Assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="Assets/plugins/jszip/jszip.min.js"></script>
    <script src="Assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="Assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="Assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="Assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="Assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="Assets/dist/js/adminlte.min.js"></script>
    <script src="Assets/dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function() {
        $("#example1").DataTable({
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
</body>

</html>