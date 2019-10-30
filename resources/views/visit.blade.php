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

              <!-- Anwesende -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="fas fa-clipboard-list"></i> Anwesende</h4>
                  </div>
                  <div class="card-body">
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

  <!-- Edit Visitationnote Modal [start] -->
  <div class="modal fade" id="modalEditVisitationnnote" tabindex="-1" role="dialog" aria-labelledby="editVisitationnoteModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clipboard-list"></i> Begehungsvermerk bearbeiten</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group" style="display:none">
                      <label for="visitationnoteID">ID</label>
                      <input type="text" class="form-control" id="visitationnoteID" hidden>
                  </div>
                  <div class="form-group mb-3">
                      <label for="visitationnoteTitle">Bezeichnung</label>
                      <input type="text" class="form-control" id="visitationnoteTitle" placeholder="Bezeichnung...">
                  </div>
                  <div class="row mb-3">
                      <div class="form-group col-md-3">
                          <label for="visitationnoteDate">Datum</label><br>
                          <input type="text" id="visitationnoteDate" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="visitationnoteCategory">Kategorie</label>
                          <select id="visitationnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Information">Information</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="visitationnoteDeadline">Fälligkeit</label>
                          <input type="text" id="visitationnoteDeadline" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="visitationnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="visitationnoteDone">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="visitationnoteDescription">Bemerkungen</label>
                      <textarea rows="10" type="text" class="form-control" id="visitationnoteDescription" placeholder="Bemerkungen (Freitext)"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <button id="btnSaveVisitationnote" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Edit Visitationnote Modal [end] -->

  <!-- New Visitationnote Modal [start] -->
  <div class="modal fade" id="modalNewVisitationnnote" tabindex="-1" role="dialog" aria-labelledby="newVisitationnoteModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clipboard-list"></i> Begehungsvermerk anlegen</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group mb-3">
                      <label for="newVisitationnoteTitle">Bezeichnung</label>
                      <input type="text" class="form-control" id="newVisitationnoteTitle" placeholder="Bezeichnung...">
                  </div>
                  <div class="row mb-3">
                      <div class="form-group col-md-3">
                          <label for="newVisitationnoteDate">Datum</label><br>
                          <input type="text" id="newVisitationnoteDate" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newVisitationnoteCategory">Kategorie</label>
                          <select id="newVisitationnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Information">Information</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newVisitationnoteDeadline">Fälligkeit</label>
                          <input type="text" id="newVisitationnoteDeadline" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newVisitationnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="newVisitationnoteDone">
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="newVisitationnoteDescription">Bemerkungen</label>
                      <textarea rows="10" type="text" class="form-control" id="newVisitationnoteDescription" placeholder="Bemerkungen (Freitext)"></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                  <button id="btnSaveNewVisitationnote" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
              </div>
          </div>
      </div>
  </div>
  <!-- New Visitationnote Modal [end] -->

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

    $("#btnSaveVisitationnote").click(function () {

        var id = $("#visitationnoteID").val();

        var checked = 0;
        if ($("#visitationnoteDone").is(':checked')) {
            checked = 1;
        }

        $.ajax({
            type: "PATCH",
            url: "/visitationnote/update/" + id,
            data:
                {
                    'title' : $("#visitationnoteTitle").val(),
                    'date' : $("#visitationnoteDate").val() + " 00:00:00",
                    'deadline' : $("#visitationnoteDeadline").val(),
                    'notes' : $("#visitationnoteDescription").val(),
                    'done' : checked,
                    'category' : $("#visitationnoteCategory").val()
                }
            ,
            success: function (data) {
                alert("Die Änderungen am Begehungsvermerk wurden gespeichert.");
                $table.bootstrapTable('refresh');
                $("#modalEditVisitationnnote").modal('toggle');
            }
        });
    });

    $("#btnNewVisitationnote").click(function () {

        $("#modalNewVisitationnnote").modal('toggle');
        $("#visitationnoteDate").val("");
        $("#visitationnoteTitle").val("");
        $("#visitationnoteDeadline").val("");
        $("#visitationnoteDescription").val("");
        $("#visitationnoteDone").prop('checked', false);
        $("#visitationnoteCategory").val("Mangel");


    });

    $("#btnSaveNewVisitationnote").click(function () {
      var checked = 0;
      if ($("#visitationnoteDone").is(':checked')) {
          checked = 1;
      }

      $.ajax({
          type: "POST",
          url: "/visitationnote",
          data:
              {
                  'visit_id' : '{{ $visit->id }}',
                  'title' : $("#newVisitationnoteTitle").val(),
                  'date' : $("#newVisitationnoteDate").val() + " 00:00:00",
                  'deadline' : $("#newVisitationnoteDeadline").val(),
                  'notes' : $("#newVisitationnoteDescription").val(),
                  'done' : checked,
                  'category' : $("#newVisitationnoteCategory").val()
              }
          ,
          success: function (data) {
              alert("Der Begehungsvermerk wurde erfolgreich angelegt.");
              $table.bootstrapTable('refresh');
              $("#modalNewVisitationnnote").modal('toggle');

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
      function operateFormatterVisitationnotes(value, row, index) {
          return [
              '<a class="edit" href="javascript:void(0)" title="Bearbeiten">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>',
              '</a>  ',
              '<a class="delete" href="javascript:void(0)" title="Löschen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
              '</a> ',
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
                  '<input class=\"doneCheck\" type=\"checkbox\" name=\"done\" value=\"1\" checked onclick=\"handleDoneClick(this,\'' + row.id + '\')\">'
              ]
          }

          return [
              '<input class=\"doneCheck\" type=\"checkbox\" name=\"done\" value=\"0\" onclick=\"handleDoneClick(this,\'' + row.id + '\')\">'
          ]
      }

      function handleDoneClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);

          var checked = 0;
          if (cb.checked) {
              checked = 1;
          }

          //update the done status for this visitationnote
          $.ajax({
              type: "PATCH",
              url: "/visitationnote/" + id,
              data:
                  {
                      'done' : checked
                  }
              ,
              success: function (data) {
                  alert("Die Änderungen beim Begehungsvermerk wurden übernommen.");
                  $table.bootstrapTable('refresh');
              }
          });


      }

      //window.operateEvents for all bootstrap-tables
      window.operateEvents = {
          'click .edit': function (e, value, row, index) {

              $("#modalEditVisitationnnote").modal('toggle');
              $("#visitationnoteDate").val(row.created_at.substring(0,row.created_at.length - 9));
              $("#visitationnoteTitle").val(row.title);
              $("#visitationnoteDeadline").val(row.deadline);
              $("#visitationnoteDescription").val(row.notes);
              $("#visitationnoteDone").prop('checked', row.done);
              $("#visitationnoteCategory").val(row.category);
              $("#visitationnoteID").val(row.id);
          },
          'click .delete': function (e, value, row, index) {
              bootbox.confirm({
                  message: "Begehungsvermerk wirklich entfernen?",
                  buttons: {
                      confirm: {
                          label: 'Ja',
                          className: 'btn-success'
                      },
                      cancel: {
                          label: 'Nein',
                          className: 'btn-danger'
                      }
                  },
                  callback: function (result) {
                      if (result) {
                          $.ajax({
                              type: "DELETE",
                              url: "/visitationnote/" + row.id,
                              data: "",
                              success: function (data) {
                                  $table.bootstrapTable('refresh');
                              }
                          });
                      }
                  }
              });
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
                  }, {
                      field: 'operate',
                      title: 'Aktionen',
                      align: 'center',
                      events: window.operateEvents,
                      formatter: operateFormatterVisitationnotes
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
              '</a> '
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
                  $tableMembers.bootstrapTable('refresh');

              }
          });


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
              dateFormat: "Y-m-d",
          }
      );
      $("#time").flatpickr(
          {
              enableTime: true,
              noCalendar: true,
              time_24hr: true,
          }
      );
      $("#visitationnoteDate").flatpickr(
          {
              enableTime: false,
              noCalendar: false,
              dateFormat: "Y-m-d",
          }
      );
      $("#visitationnnoteDeadline").flatpickr(
          {
              enableTime: false,
              noCalendar: false,
              dateFormat: "Y-m-d",
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

      });

  </script>


  @component('partials.js')
      <strong>Whoops!</strong> Something went wrong!
  @endcomponent

</body>

</html>
