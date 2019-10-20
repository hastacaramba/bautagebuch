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
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- m+m Logo -->
          <div>
            <img class="img-fluid img-logo" src="/img/logo.png">
          </div>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div id="toolbar">
            <button id="btnNewProject" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neues Bauprojekt</button>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4><i class="fas fa-home"></i> Bauprojekte</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- Table: Projects -->
                <table
                    id="table"
                    data-id-field="Name"
                    data-side-pagination="client"
                    data-toggle="table"
                    data-sortable="true"
                    data-url="/projects"
                    data-toolbar="#toolbar"
                    data-search="true"
                    data-show-columns="false"
                    data-pagination="true"
                    data-page-list="[10, 25, 50, 100, ALL]"
                    data-detail-formatter="detailFormatter"
                    data-detail-view="false"
                    data-response-handler="responseHandler"
                    data-show-export="false"
                    data-show-pagination-switch="true"
                    data-row-style="rowStyle">
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
          <div class="form-group">
            <label for="number">Laufende Nummer</label>
            <input type="text" class="form-control" id="number" placeholder="Laufende Nummer">
          </div>
          <div class="form-group">
            <label for="name">Projektname</label>
            <input type="text" class="form-control" id="name" placeholder="Projektname">
          </div>
          <div class="form-group">
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="image">Foto</label>
              <div class="row">
                <div class="col-md-9">
                  <input type="file" id ="image" name="image" class="form-control">
                </div>
                <div class="col-md-3">
                  <button id="btnUploadImage" type="submit" class="btn btn-success">Upload</button>
                  <div id="newProjectImage"class="mt-1"></div>
                </div>
              </div>
            </form>
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
        </div>
        <div class="modal-footer">
          <button id="btnSaveNewProject" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Bauprojekt anlegen</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- New Project Modal [end] -->

  <!-- Edit Project Modal [start] -->
  <div class="modal fade" id="modalEditProject" tabindex="-1" role="dialog" aria-labelledby="editProjectModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Bauprojekt bearbeiten</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" style="display:none">
            <label for="projectID">ID</label>
            <input type="text" class="form-control" readonly id="projectID" placeholder="Projekt-ID">
          </div>
          <div class="form-group">
            <label for="newNumber">Laufende Nummer</label>
            <input type="text" class="form-control" id="newNumber" placeholder="Laufende Nummer">
          </div>
          <div class="form-group">
            <label for="newName">Projektname</label>
            <input type="text" class="form-control" id="newName" placeholder="Projektname">
          </div>
          <div class="form-group">
            <label for="oldPhoto">Foto</label>
            <div class="mb-3" id="oldPhoto"></div>
            <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <label for="image">Foto ersetzen</label>
              <div class="row">
                <div class="col-md-9">
                  <input type="file" id ="image" name="image" class="form-control">
                </div>
                <div class="col-md-3">
                  <button id="btnUploadImage" type="submit" class="btn btn-success">Upload</button>
                  <div id="newProjectImage"class="mt-1"></div>
                </div>
              </div>
            </form>
          </div>
          <div class="form-group">
            <label for="newStreet">Straße</label>
            <input type="text" class="form-control" id="newStreet" placeholder="Straße">
          </div>
          <div class="form-group">
            <label for="newHousenumber">Hausnummer</label>
            <input type="text" class="form-control" id="newHousenumber" placeholder="Hausnummer">
          </div>
          <div class="form-group">
            <label for="newPostcode">PLZ</label>
            <input type="text" class="form-control" id="newPostcode" placeholder="PLZ">
          </div>
          <div class="form-group">
            <label for="newCity">Ort</label>
            <input type="text" class="form-control" id="newCity" placeholder="Ort">
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSaveEditedProject" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit Project Modal [end] -->

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

      $imageFileName = '';

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      //init bootstrap table projects
      initTable();

      // this is the id of the form
      $("form").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var formData = new FormData();
        // Attach file
        formData.append('image', $('input[type=file]')[0].files[0]);

        $.ajax({
          url: '/image-upload-post',
          data: formData,
          type: 'POST',
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data) {
            $imageFileName = data;
            $("#newProjectImage").html('<img class="img-fluid img-rounded" src="images/' + data + '">');
            $("#btnUploadImage").hide();
            //$("#btnUploadImage").attr("disabled","disabled");
          }
        });

      });

      $("#btnSaveNewProject").click(function () {
        //Create new project
        if (($("#number").val().length) && ($("#name").val().length) ) {
          if ($imageFileName == '') {
            $imageFileName = 'default.jpg';
          }
          $.ajax({
            type: "POST",
            url: "/project",
            data: {
              "number": $("#number").val(),
              "name": $("#name").val(),
              "street": $("#street").val(),
              "housenumber": $("#housenumber").val(),
              "postcode": $("#postcode").val(),
              "city": $("#city").val(),
              "photo": $imageFileName
            },
            success: function (data) {
              location.reload();
            }
          });
        } else {
          alert("Bitte füllen Sie die Pflichtfelder Nummer und Name für das neue Projekt aus!");
        }

      });

      $("#btnSaveEditedProject").click(function () {
        //Create new project
        if (($("#newNumber").val().length) && ($("#newName").val().length) ) {
          if ($imageFileName == '') {
            $imageFileName = 'default.jpg';
          }
          $.ajax({
            type: "PATCH",
            url: "/projects/" + $("#projectID").val() + "/update",
            data: {
              "number": $("#newNumber").val(),
              "name": $("#newName").val(),
              "street": $("#newStreet").val(),
              "housenumber": $("#newHousenumber").val(),
              "postcode": $("#newPostcode").val(),
              "city": $("#newCity").val(),
              "photo": $imageFileName
            },
            success: function (data) {
              location.reload();
            }
          });
        } else {
          alert("Bitte füllen Sie die Pflichtfelder Nummer und Name für das Projekt aus!");
        }

      });

    });

  </script>

  <script>
    $("#btnNewProject").click(function (e) {
      e.preventDefault();
      $("#modalNewProject").modal('toggle');
    });


    // - BOOTSTRAP-TABLE - //

    var $table = $('#table')
    var $remove = $('#remove')
    var $activate = $('#activate')
    var $deactivate = $('#deactivate')
    var $newPW = $('#newPW')
    var selections = []

    /**
     * Gibt eine map der Projekt-IDs der aktuell selektierten Zeilen zurück.
     *
     */
    function getIdSelections() {
      return $.map($table.bootstrapTable('getSelections'), function (row) {
        return row.id;
      })
    }


    /**
     * Bootstrap-table response handler
     *
     * @param res
     * @returns {*}
     */
    function responseHandler(res) {
      $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.id, selections) !== -1
      })
      return res
    }

    /**
     * Bootstrap-table detailFormatter
     *
     * @param index
     * @param row
     * @returns {string}
     */
    function detailFormatter(index, row) {
      var html = []
      $.each(row, function (key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>')
      })
      return html.join('')
    }


    /**
     *
     * @param value
     * @param row
     * @param index
     * @returns {string}
     */
    function operateFormatter(value, row, index) {
      return [
        '<a class="edit" href="javascript:void(0)" title="Bearbeiten">',
          '<button type="button" class="btn btn-default" style="color:#00a8D5; border: none" ><i class="fas fa-edit"></i></button>',
        '</a>  '

      ].join('')
    }


    function imageFormatter(value, row, index) {
      return [
        '<a href="/projects/' + row.project_id + '"><img class="img-fluid table-img" src="images/' + value + '" /></a>'
      ]
    }

    function createdAtFormatter(value, row, index) {
        var date = value.substring(0,value.length - 9);
      return [
        date
      ]
    }

    function updatedAtFormatter(value, row, index) {
      var date = value.substring(0,value.length - 3);
      return [
        date
      ]
    }

    window.operateEvents = {
      'click .edit': function (e, value, row, index) {
        $("#projectID").val(row.project_id);
        $("#newNumber").val(row.number);
        $("#newName").val(row.name);
        $("#newStreet").val(row.street);
        $("#newHousenumber").val(row.housenumber);
        $("#newPostcode").val(row.postcode);
        $("#newCity").val(row.city);
        $fileName = row.photo;
        $("#oldPhoto").html("<img class=\"img-rounded table-img\" src=\"images/" + $fileName + "\">");
        $("#modalEditProject").modal('toggle');
      }
    }

    /**
     * Initiiert die Bootstrap-Table.
     */
    function initTable() {
      $table.bootstrapTable('destroy').bootstrapTable({
        locale: 'de-DE',
        columns: [
          {
            field: 'photo',
            title: 'Foto',
            sortable: false,
            align: 'left',
            formatter: imageFormatter
          }, {
            title: 'Nummer',
            field: 'number',
            align: 'left',
            valign: 'middle',
            sortable: true,
          }, {
            field: 'name',
            title: 'Name',
            sortable: true,
            align: 'left'
          }, {
            field: 'created_at',
            title: 'erstellt',
            sortable: true,
            align: 'left',
            formatter: createdAtFormatter
          }, {
            field: 'updated_at',
            title: 'zuletzt bearbeitet',
            sortable: true,
            align: 'left',
            formatter: updatedAtFormatter
          }, {
            field: 'operate',
            title: 'Bearbeiten',
            align: 'center',
            events: window.operateEvents,
            formatter: operateFormatter
          }
        ]
      })
      $table.on('check.bs.table uncheck.bs.table ' +
              'check-all.bs.table uncheck-all.bs.table',
              function () {
                //$remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$activate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$deactivate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$newPW.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelections()
                // push or splice the selections if you want to save all data selections
              })
      $table.on('all.bs.table', function (e, name, args) {
        //console.log(name, args)
      })

    }

  </script>

  <!-- bootstrap tables -->
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>


</body>

</html>
