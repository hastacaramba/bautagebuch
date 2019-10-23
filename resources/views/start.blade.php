<!-- HEAD [start] -->
@component('partials.head')
  <strong>Whoops!</strong> Something went wrong!
@endcomponent
<!-- HEAD [end] -->

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- SIDEBAR [start] -->
    @component('partials.sidebar')
      <strong>Whoops!</strong> Something went wrong!
    @endcomponent
    <!-- SIDEBAR [end] -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        @component('partials.topbar')
          <strong>Whoops!</strong> Something went wrong!
        @endcomponent
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container">
          <div class="row">
            @foreach($bauprojekte as $key => $data)
              <div class="col-md-6">
                <div class="card p-4" style="max-height: 400px; overflow: hidden">
                  <h3>{{$data->number}} {{$data->name}}</h3>
                  <img src="/images/{{$data->photo}}" style="width: 100%; max-height: 300px;">
                </div>
              </div>
            @endforeach
          </div>
        </div>
        <!-- /.container -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>powered by dippl it services</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal [start] -->
  @component('partials.logoutModal')
    <strong>Whoops!</strong> Something went wrong!
  @endcomponent
  <!-- Logout Modal [end] -->

  <!-- New Project Modal [start] -->
  <div class="modal fade" id="modalNewProject" tabindex="-1" role="dialog" aria-labelledby="newProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Neues Bauprojekt anlegen</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="number">Laufende Nummer</label>
              <input type="text" class="form-control" id="number" placeholder="Laufende Nummer">
            </div>
            <div class="form-group">
              <label for="name">Projektname</label>
              <input type="text" class="form-control" id="name" placeholder="Projektname">
            </div>
            <div class="form-group">
              <label for="street">Straße</label>
              <input type="text" class="form-control" id="street" placeholder="Straße">
            </div>
            <div class="form-group">
              <label for="housenumber">Hausnummer</label>
              <input type="text" class="form-control" id="housenumber" placeholder="Hausnummer">
            </div>
            <div class="form-group">
              <label for="postcode">PLZ</label>
              <input type="text" class="form-control" id="postcode" placeholder="PLZ">
            </div>
            <div class="form-group">
              <label for="city">Ort</label>
              <input type="text" class="form-control" id="city" placeholder="Ort">
            </div>
            <div class="form-group">
              <label for="photo">Foto</label>
              <input type="text" class="form-control" id="photo" placeholder="Foto">
            </div>
            <button id="btnSaveNewProject" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Bauprojekt anlegen</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- New Project Modal [end] -->

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

  <script>
    $("#navItemBauprojekte").addClass("active");
  </script>

  <script>
    $(document).ready(function () {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    });
  </script>

  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>


</body>

</html>
