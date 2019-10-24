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
        <div class="container-fluid">

          <div id="toolbar">
            <button id="btnNewContact" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neuer Kontakt</button>
          </div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4><i class="fas fa-users"></i> Kontakte</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <!-- Table: Projects -->
                <table
                    id="table"
                    data-id-field="id"
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
  <!-- Edit Contact Modal [end] -->

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.js"></script>

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
          '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>',
        '</a>  '

      ].join('')
    }


    function imageFormatter(value, row, index) {
      return [
        '<a href="/projects/' + row.id + '"><img class="img-fluid table-img" src="images/' + value + '" /></a>'
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
        $("#contactID").val(row.id);
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

  @component('partials.js')
    <strong>Whoops!</strong> Something went wrong!
  @endcomponent


</body>

</html>
