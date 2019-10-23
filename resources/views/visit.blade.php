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
          <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="/projects">Bauprojekte</a> / <a href="/projects/{{ $project->project_id }}">Projekt: {{ $project->number }} {{ $project->name }}</a>
                </div>
                <h2 class="m-0 font-weight-bold text-primary">Begehung: {{ $visit->title }} {{ $visit->date }}</h2>
            </div>
          </div>
        </div>
        <div class="card-body">


          <!--<div class="container-fluid">
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h3>Dokumente</h3>
                  </div>
              </div>
          </div> -->
      </div>
      <!-- End of Main Content -->

      @component('partials.footer')
        <strong>Whoops!</strong> Something went wrong!
      @endcomponent


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal [start] -->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login2.blade.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Logout Modal [end] -->

  <!-- Visit Modal [start] -->
  <div class="modal fade" id="modalVisit" tabindex="-1" role="dialog" aria-labelledby="visitModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <div class="modal-title" id="visitModalLabel"><i class="fa fa-walking"></i> Begehung</div>
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
  <!-- Visit Modal [end] -->

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
      //init bootstrap tables
      initTableMembers();
      initTableVisits();

    });



  </script>

  <script>


    // - BOOTSTRAP-TABLE MEMBERS - //

    var $tableMembers = $('#tableMembers')

    /**
     * Gibt eine map der Projekt-IDs der aktuell selektierten Zeilen zurück.
     *
     */
    function getIdSelections() {
      return $.map($tableMembers.bootstrapTable('getSelections'), function (row) {
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
        '</a> ',
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
        alert("test");
      },
      'click .openVisit': function (e, value, row, index) {
        $("#modalVisit").modal('toggle');
        $("#visitModalLabel").html('<h5><i class="fa fa-walking"></i> Begehung: ' + row.title + ' ' + row.date + '</h5>');
      }
    }

    /**
     * Initiiert die Bootstrap-Table.
     */
    function initTableMembers() {
      $tableMembers.bootstrapTable('destroy').bootstrapTable({
        locale: 'de-DE',
        columns: [
          {
            field: 'company',
            title: 'Firma',
            sortable: true,
            align: 'left',
          }, {
            title: 'Nachname',
            field: 'surname',
            align: 'left',
            sortable: true,
          }, {
            field: 'firstname',
            title: 'Vorname',
            sortable: true,
            align: 'left'
          }, {
            field: 'email',
            title: 'E-Mail',
            sortable: true,
            align: 'left',
            formatter: emailFormatter
          }, {
            field: 'subarea',
            title: 'Gewerk',
            sortable: true,
            align: 'left',
          }, {
            field: 'operate',
            title: 'Bearbeiten',
            align: 'center',
            events: window.operateEvents,
            formatter: operateFormatter
          }
        ]
      })
      $tableMembers.on('check.bs.table uncheck.bs.table ' +
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
      $tableMembers.on('all.bs.table', function (e, name, args) {
        //console.log(name, args)
      })

    }


    // - BOOTSTRAP-TABLE VISITS - //

    var $tableVisits = $('#tableVisits')

    /**
     * Gibt eine map der Projekt-IDs der aktuell selektierten Zeilen zurück.
     *
     */
    function getIdSelectionsVisits() {
      return $.map($tableVisits.bootstrapTable('getSelections'), function (row) {
        return row.id;
      })
    }

    /**
     *
     * @param value
     * @param row
     * @param index
     * @returns {string}
     */
    function operateFormatterVisits(value, row, index) {
      return [
        '<a class="openVisit" href="javascript:void(0)" title="Anzeigen">',
        '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-eye"></i></button>',
        '</a> '
      ].join('')
    }

    /**
     *
     * @param value
     * @param row
     * @param index
     * @returns {string}
     */
    function timeFormatter(value, row, index) {
      var time = value.substring(0,value.length - 3);
      return [
        time
      ]
    }

    /**
     * Initiiert die Bootstrap-Table.
     */
    function initTableVisits() {
      $tableVisits.bootstrapTable('destroy').bootstrapTable({
        /*
        $visit->title = $request->title;
        $visit->date = $request->date;
        $visit->time = $request->time;
        $visit->notes = $request->notes;
        $visit->project_id = $projectID;
        */
        locale: 'de-DE',
        columns: [
          {
            field: 'date',
            title: 'Datum',
            sortable: true,
            align: 'left',
          }, {
            field: 'title',
            title: 'Titel',
            align: 'left',
            sortable: true,
          }, {
            field: 'time',
            title: 'Uhrzeit',
            align: 'left',
            sortable: true,
            formatter: timeFormatter
          }, {
            field: 'operate',
            title: 'Anzeigen',
            align: 'center',
            events: window.operateEvents,
            formatter: operateFormatterVisits
          }
        ]
      })
      $tableVisits.on('check.bs.table uncheck.bs.table ' +
              'check-all.bs.table uncheck-all.bs.table',
              function () {
                //$remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$activate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$deactivate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$newPW.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelectionsVisits()
                // push or splice the selections if you want to save all data selections
              })
      $tableVisits.on('all.bs.table', function (e, name, args) {
        //console.log(name, args)
      })

    }


  </script>

  <script>
      $(document).ready(function(){

          $('ul.tabs li').click(function(){
              var tab_id = $(this).attr('data-tab');

              $('ul.tabs li').removeClass('current');
              $('ul.tabs li').removeClass('text-primary');
              $('.tab-content').removeClass('current');

              $(this).addClass('current');
              $(this).addClass('text-primary');
              $("#"+tab_id).addClass('current');
          })

      })
  </script>

  <!-- bootstrap tables js -->
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table-locale-all.min.js"></script>

</body>

</html>
