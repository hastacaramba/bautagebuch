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

          <div class="mt-2 mb-2">
            <button id="btnNewContact" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neuer Kontakt</button>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Liste aller Kontakte</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- Table: Projects -->
                <table
                    id="table"
                    data-id-field="contact_id"
                    data-side-pagination="client"
                    data-toggle="table"
                    data-sortable="true"
                    data-url="/contacts"
                    data-toolbar="#toolbar"
                    data-search="true"
                    data-show-columns="true"
                    data-pagination="true"
                    data-page-list="[10, 25, 50, 100, ALL]"
                    data-detail-formatter="detailFormatter"
                    data-detail-view="true"
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

  <!-- New Contact Modal [start] -->
  <div class="modal fade" id="modalNewContact" tabindex="-1" role="dialog" aria-labelledby="newContactModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Neuen Kontakt anlegen</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="company">Firma</label>
            <input type="text" class="form-control" id="company" placeholder="Name der Firma">
          </div>
          <div class="form-group">
            <label for="surname">Nachname</label>
            <input type="text" class="form-control" id="surname" placeholder="Nachname">
          </div>
          <div class="form-group">
            <label for="firstname">Vorname</label>
            <input type="text" class="form-control" id="firstname" placeholder="Vorname">
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
            <label for="email">E-Mail</label>
            <input type="text" class="form-control" id="email" placeholder="E-Mail-Adresse">
          </div>
          <div class="form-group">
            <label for="phone">Telefon</label>
            <input type="text" class="form-control" id="phone" placeholder="Telefonnummer">
          </div>
          <div class="form-group">
            <label for="mobile">Mobiltelefon</label>
            <input type="text" class="form-control" id="mobile" placeholder="Handynummer">
          </div>
          <div class="form-group">
            <label for="fax">Fax</label>
            <input type="text" class="form-control" id="fax" placeholder="Faxnummer">
          </div>
          <div class="form-group">
            <label for="info">Info</label>
            <input type="text" class="form-control" id="info" placeholder="Informationen zum Kontakt">
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSaveNewContact" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Kontakt anlegen</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- New Contact Modal [end] -->

  <!-- Edit Contact Modal [start] -->
  <div class="modal fade" id="modalEditContact" tabindex="-1" role="dialog" aria-labelledby="editContactModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Kontakt bearbeiten</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" style="display:none">
            <label for="contactID">ID</label>
            <input type="text" class="form-control" readonly id="contactID">
          </div>
          <div class="form-group">
            <label for="newSurname">Nachname</label>
            <input type="text" class="form-control" id="newSurname" placeholder="Nachname">
          </div>
          <div class="form-group">
            <label for="newFirstname">Vorname</label>
            <input type="text" class="form-control" id="newFirstname" placeholder="Vorname">
          </div>
          <div class="form-group">
            <label for="newCompany">Firma</label>
            <input type="text" class="form-control" id="newCompany" placeholder="Name der Firma">
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
          <div class="form-group">
            <label for="newEmail">E-Mail</label>
            <input type="text" class="form-control" id="newEmail" placeholder="E-Mail-Adresse">
          </div>
          <div class="form-group">
            <label for="newPhone">Telefon</label>
            <input type="text" class="form-control" id="newPhone" placeholder="Telefonnummer">
          </div>
          <div class="form-group">
            <label for="newMobile">Mobiltelefon</label>
            <input type="text" class="form-control" id="newMobile" placeholder="Handynummer">
          </div>
          <div class="form-group">
            <label for="newFax">Fax</label>
            <input type="text" class="form-control" id="newFax" placeholder="Faxnummer">
          </div>
          <div class="form-group">
            <label for="newInfo">Info</label>
            <input type="text" class="form-control" id="newInfo" placeholder="Informationen zum Kontakt">
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSaveEditedContact" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
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
    $("#navItemKontakte").addClass("active");
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

      //Button Click 'Neuer Kontakt'
      $("#btnSaveNewContact").click(function () {

        $.ajax({
          type: "POST",
          url: "/contact",
          data: {
            "surname": $("#surname").val(),
            "firstname": $("#firstname").val(),
            "company": $("#company").val(),
            "street": $("#street").val(),
            "housenumber": $("#housenumber").val(),
            "postcode": $("#postcode").val(),
            "city": $("#city").val(),
            "email": $("#email").val(),
            "phone": $("#phone").val(),
            "mobile": $("#mobile").val(),
            "fax": $("#fax").val(),
            "info": $("#info").val()
          },
          success: function (data) {
            location.reload();
          }
        });

      });

      //Button Click 'Kontakt speichern'
      $("#btnSaveEditedContact").click(function () {

        $.ajax({
          type: "PATCH",
          url: "/contacts/" + $("#contactID").val() + "/update",
          data: {
            "surname": $("#newSurname").val(),
            "firstname": $("#newFirstname").val(),
            "company": $("#newCompany").val(),
            "street": $("#newStreet").val(),
            "housenumber": $("#newHousenumber").val(),
            "postcode": $("#newPostcode").val(),
            "city": $("#newCity").val(),
            "email": $("#newEmail").val(),
            "phone": $("#newPhone").val(),
            "mobile": $("#newMobile").val(),
            "fax": $("#newFax").val(),
            "info": $("#newInfo").val()
          },
          success: function (data) {
            location.reload();
          }
        });

      });

    });

  </script>

  <script>
    $("#btnNewContact").click(function (e) {
      e.preventDefault();
      $("#modalNewContact").modal('toggle');
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

    function emailFormatter(value, row, index) {
      var email = '<a href="mailto:' + value + '">' + value + '</a>';
      return [
        email
      ]
    }

    window.operateEvents = {
      'click .edit': function (e, value, row, index) {
        $("#newCompany").val(row.company);
        $("#contactID").val(row.contact_id);
        $("#newSurname").val(row.surname);
        $("#newFirstname").val(row.firstname);
        $("#newStreet").val(row.street);
        $("#newHousenumber").val(row.housenumber);
        $("#newPostcode").val(row.postcode);
        $("#newCity").val(row.city);
        $("#newInfo").val(row.info);
        $("#newEmail").val(row.email);
        $("#newPhone").val(row.phone);
        $("#newMobile").val(row.mobile);
        $("#newFax").val(row.fax);
        $("#modalEditContact").modal('toggle');
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
            field: 'surname',
            title: 'Nachname',
            sortable: false,
            align: 'left'
          }, {
            field: 'firstname',
            title: 'Vorname',
            align: 'left',
            sortable: true
          }, {
            field: 'company',
            title: 'Firma',
            sortable: true,
            align: 'left'
          }, {
            field: 'city',
            title: 'Ort',
            sortable: true,
            align: 'left'
          }, {
            field: 'email',
            title: 'E-Mail',
            sortable: true,
            align: 'left',
            formatter: emailFormatter
          }, {
            field: 'phone',
            title: 'Telefon',
            sortable: true,
            align: 'left'
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
