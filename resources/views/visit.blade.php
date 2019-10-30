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
                    <a href="/bauprojekte">Bauprojekte</a> / <a href="/projects/{{ $project->id }}">{{ $project->number }} {{ $project->name }}</a>
                </div>
                <h2 class="m-0 font-weight-bold text-primary">Begehung: {{ $visit->title }} {{ $visit->date }}</h2>
            </div>
          </div>
        </div>
          <div class="card-body">
              <div class="row mb-3">
                  <div class="col-md-12">
                      <label>Bezeichnung</label><br>
                      <input id="title" type="text" style="width:100%; color:#6e707e" value="{{$visit->title}}" placeholder="Bezeichnung...">
                  </div>
              </div>
              <div class="row mb-3">
                  <div class="col-md-3">
                      <label>Datum</label><br>
                      <input id="date" type="text" style="width:100%; color:#6e707e" value="{{$visit->date}}" placeholder="Datum...">
                  </div>
                  <div class="col-md-3">
                      <label>Uhrzeit</label><br>
                      <input id="time" type="text" style="width:100%; color:#6e707e" value="{{$visit->time}}" placeholder="Uhrzeit...">
                  </div>
                  <div class="col-md-6">
                      <label>Wetter</label><br>
                      <input id="weather" type="text" style="width:100%; color:#6e707e" value="{{$visit->weather}}" placeholder="Wetter...">
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <label for="visitDescription">Bemerkungen</label>
                      <textarea rows="10" type="text" class="form-control" id="visitDescription" placeholder="Bemerkungen zur Begehung (Freitext)">{{$visit->description}}</textarea>
                  </div>
              </div>
              <button id="btnSaveVisit" type="button" class="btn btn-primary mb-4"><i class="fa fa-save"></i> Änderungen speichern</button>

              <!-- Anwensende -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="fas fa-clipboard-list"></i> Anwesende</h4>
                  </div>
                  <div class="card-body">
                      <button class="btn btn-primary" id="getSelection">getSelection</button>
                      <!-- Table Present Members -->
                      <div class="table-responsive">
                          <table
                                  id="tableMembers"
                                  data-id-field="id"
                                  data-side-pagination="client"
                                  data-toggle="table"
                                  data-sortable="true"
                                  data-url="/visit/{{ $visit->id }}/presence"
                                  data-search="true"
                                  data-show-columns="false"
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

              <div id="toolbar">
                  <button id="btnNewVisitationnote" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neuer Begehungsvermerk</button>
              </div>
              <!-- Begehungsvermerke -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="fas fa-clipboard-list"></i> Begehungsvermerke</h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <!-- Table: Visitationnotes -->
                          <table
                                  id="table"
                                  data-id-field="id"
                                  data-side-pagination="client"
                                  data-toggle="table"
                                  data-sortable="true"
                                  data-url="/visitationnotes/{{$visit->id}}"
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.js"></script>

  <script>
    $("#navItemBauprojekte").addClass("active");
  </script>

  <script>

    $("#btnSaveVisit").click(function () {
        $.ajax({
            type: "PATCH",
            url: "/visit/{{ $visit->id }}",
            data:
                {
                    'title' : $("#title").val(),
                    'date' : $("#date").val(),
                    'time' : $("#time").val(),
                    'weather' : $("#weather").val(),
                    'description' : $("#visitDescription").val()
                }
            ,
            success: function (data) {
                alert("Die Änderungen an der Begehung wurden gespeichert.");
                location.reload();
            }
        });
    });

  </script>


  <script>

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

      function doneFormatter(value, row, index) {

          if (value) {
              return [
                  '<input type="checkbox" name="erledigt" value="1" checked>'
              ]
          }

          return [
              '<input type="checkbox" name="erledigt" value="0">'
          ]
      }

      window.operateEvents = {
          'click .edit': function (e, value, row, index) {
              $("#modalEditVisitationnote").modal('toggle');
          }
      }

      /**
       * Initiiert die Bootstrap-Table.
       *
       */
      function initTable() {
          $table.bootstrapTable('destroy').bootstrapTable({
              locale: 'de-DE',
              columns: [
                  {
                      field: 'title',
                      title: 'Bezeichnung',
                      sortable: true,
                      align: 'left'
                  }, {
                      field: 'category',
                      title: 'Kategorie',
                      align: 'left',
                      sortable: true
                  }, {
                      field: 'created_at',
                      title: 'Erstellt',
                      align: 'left',
                      sortable: true,
                      formatter: createdAtFormatter
                  }, {
                      field: 'deadline',
                      title: 'Fälligkeit',
                      sortable: true,
                      align: 'left'
                  }, {
                      field: 'done',
                      title: 'erledigt',
                      sortable: true,
                      align: 'center',
                      formatter: doneFormatter
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


      // - BOOTSTRAP-TABLE MEMBERS - //

      var $tableMembers = $('#tableMembers')

      /**
       * Gibt eine map der Projekt-IDs der aktuell selektierten Zeilen zurück.
       *
       */
      function getIdSelectionsMembers() {
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

      function presenceFormatter(value, row, index) {

          if (value) {
              return [
                  '<input class=\"presenceCheck\" type=\"checkbox\" name=\"presence\" value=\"1\" checked onclick=\"handleClick(this,\'' + row.id + '\')\">'
              ]
          }

          return [
              '<input class=\"presenceCheck\" type=\"checkbox\" name=\"presence\" value=\"0\" onclick=\"handleClick(this,\'' + row.id + '\')\">'
          ]
      }

      function handleClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);

          //update the member's presence for this visit
          $.ajax({
              type: "PATCH",
              url: "/visit/{{ $visit->id }}/presence",
              data:
                  {
                      'memberID' : id,
                      'presence' : cb.checked
                  }
              ,
              success: function (data) {
                  alert("Die Änderungen bei der Anwesenheit wurden übernommen.");
              }
          });


      }

      window.operateEvents = {
          'click .edit': function (e, value, row, index) {
              alert("test");
          },
          'click .openVisit': function (e, value, row, index) {
              //$("#modalVisit").modal('toggle');
              //$("#visitModalLabel").html('<h5><i class="fa fa-walking"></i> Begehung: ' + row.title + ' ' + row.date + '</h5>');

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
                      field: 'present',
                      title: 'Anwesend',
                      align: 'center',
                      formatter: presenceFormatter
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

  </script>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
      $("#date").flatpickr(
          {
              enableTime: false,
              noCalendar: false,
              dateFormat: "d.m.Y",
          }
      );
      $("#time").flatpickr(
          {
              enableTime: true,
              noCalendar: true,
              time_24hr: true,
          }
      );
  </script>

  <script>

      $(document).ready(function () {

          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          //init bootstrap tables
          initTable();
          initTableMembers();

          $("#showDate").click(function () {
              var status = $("#date").val();
              alert(status);
          })

          $("#showTime").click(function () {
              var status = $("#time").val();
              alert(status);
          })

          $(':checkbox').change(function() {
              alert("Changed");
          });


      });

  </script>


  @component('partials.js')
      <strong>Whoops!</strong> Something went wrong!
  @endcomponent

</body>

</html>
