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
            <button id="btnNewSubarea" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neues Gewerk</button>
          </div>
          <!-- Table Subareas -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4><i class="fas fa-tools"></i> Gewerke</h4>
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
                    data-url="/subareas"
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

  <!-- New Subarea Modal [start] -->
  <div class="modal fade" id="modalNewSubarea" tabindex="-1" role="dialog" aria-labelledby="newSubareaModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Neues Gewerk anlegen</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Bezeichnung</label>
            <input type="text" class="form-control" id="title" placeholder="Bezeichnung des Gewerks">
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSaveNewSubarea" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Gewerk anlegen</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- New Subarea Modal [end] -->

  <!-- Edit Subarea Modal [start] -->
  <div class="modal fade" id="modalEditSubarea" tabindex="-1" role="dialog" aria-labelledby="editSubareaModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-edit"></i> Gewerk bearbeiten</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group" style="display:none">
            <label for="subareaID">ID</label>
            <input type="text" class="form-control" readonly id="subareaID">
          </div>
          <div class="form-group">
            <label for="newTitle">Bezeichnung</label>
            <input type="text" class="form-control" id="newTitle" placeholder="Bezeichnung des Gewerks">
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnSaveEditedSubarea" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Edit Subarea Modal [end] -->

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/datatables-demo.js"></script>

  <script>
    $("#navItemGewerke").addClass("active");
  </script>

  <script>
    $(document).ready(function () {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      //init bootstrap table projects
      initTable();

      //Button Click 'Neues Gewerk'
      $("#btnSaveNewSubarea").click(function () {

        $.ajax({
          type: "POST",
          url: "/subarea",
          data: {
            "title": $("#title").val(),
          },
          success: function (data) {
            location.reload();
          }
        });

      });

      //Button Click 'Gewerk speichern'
      $("#btnSaveEditedSubarea").click(function () {

        $.ajax({
          type: "PATCH",
          url: "/subareas/" + $("#subareaID").val() + "/update",
          data: {
            "title": $("#newTitle").val(),
          },
          success: function (data) {
            location.reload();
          }
        });

      });

    });

    //auch bei 'Enter' reagieren
    $("#newTitle").keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13'){
        $("#btnSaveEditedSubarea").click();
      }
    });

  </script>

  <script>
    $("#btnNewSubarea").click(function (e) {
      e.preventDefault();
      $("#modalNewSubarea").modal('toggle');
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
        $("#newTitle").val(row.title);
        $("#subareaID").val(row.id);
        $("#modalEditSubarea").modal('toggle');
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
            field: 'title',
            title: 'Bezeichnung des Gewerks',
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
