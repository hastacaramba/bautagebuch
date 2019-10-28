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
            <div class="col-md-10">
              <div>
                  <a href="/bauprojekte">Bauprojekte</a> / <a href="/projects/{{ $projectID }}">{{ $number }} {{ $name }}</a>
              </div>
              <h2 class="m-0 font-weight-bold text-primary">Bauprojekt: {{ $number }} {{ $name }}</h2>
              <div class="border-left-primary pl-2 text-primary">
                {{ $street }} {{ $housenumber }}, {{ $postcode }} {{ $city }}<br>
                Erstellt: {{ $created_at }}<br>
                Letzte Aktualisierung: {{ $updated_at }}
              </div>
            </div>
            <div class="col-md-2">
              <img class="img-fluid img-rounded" src="/images/{{ $photo }}">
            </div>
          </div>
        </div>
        <div class="card-body">

            <ul class="tabs">
                <li class="tab-link current" data-tab="tab-1"><i class="fas fa-users"></i> Projektbeteiligte</li>
                <li class="tab-link" data-tab="tab-2"><i class="fas fa-walking"></i> Begehungen</li>
                <li class="tab-link" data-tab="tab-3"><i class="far fa-clipboard"></i> Projektvermerke</li>
                <li class="tab-link" data-tab="tab-3"><i class="far fa-folder"></i> Dokumente</li>
            </ul>

            <div id="tab-1" class="tab-content current">
                <div id="toolbarMembers">
                    <button id="btnNewMember" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Projektbeteiligte hinzufügen</button>
                </div>
                <!-- Table Members -->
                <div class="table-responsive">
                    <table
                            id="tableMembers"
                            data-id-field="id"
                            data-side-pagination="client"
                            data-toggle="table"
                            data-sortable="true"
                            data-url="/members/{{ $projectID }}"
                            data-toolbar="#toolbarMembers"
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
            <div id="tab-2" class="tab-content">
                <div id="toolbarVisits">
                    <button id="btnNewVisit" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Neue Begehung</button>
                </div>
                <!-- Table Visits -->
                <div class="table-responsive">
                    <table
                            id="tableVisits"
                            data-id-field="id"
                            data-side-pagination="client"
                            data-toggle="table"
                            data-sortable="true"
                            data-url="/visits/{{ $projectID }}"
                            data-toolbar="#toolbarVisits"
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
            <div id="tab-3" class="tab-content">
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            </div>
            <button class="btn btn-success btn-circle mt-4 ml-4" id="pdfTest"><i class="fas fa-file-pdf"></i></button>
        </div>
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

  <!-- New Member Modal [start] -->
  <div class="modal fade" id="modalNewMember" tabindex="-1" role="dialog" aria-labelledby="newMemberModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <div class="modal-title" id="visitModalLabel"><i class="fa fa-walking"></i> Projektbeteiligte hinzufügen</div>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label for="contactSelect">Kontakt</label>
                      <div id="contactSelect"></div>
                  </div>
                  <div class="form-group">
                      <label for="subareaSelect">Gewerk</label>
                      <div id="subareaSelect"></div>
                  </div>
              <div class="modal-footer">
                  <button id="btnSaveNewMember" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Hinzufügen</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
              </div>
          </div>
      </div>
  </div>
  <!-- New Member Modal [end] -->

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

      //tabs
        $('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('ul.tabs li').removeClass('text-primary');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $(this).addClass('text-primary');
            $("#"+tab_id).addClass('current');
        })

    });

    $("#pdfTest").click(function () {

        var id = $.now().toString() + '{{ Auth::user()->id }}';

        $.ajax({
            type: "POST",
            url: "/export/save",
            data: JSON.stringify(
                {
                    'id' : id,
                    'name' : '{{ $name }}',
                    'number': '{{ $number }}'
                }
            ),
            success: function (data) {
                location.href = '/PdfDemo/' + id;
            }
        });
        //location.href = '/PdfDemo';
    });

    $("#btnNewMember").click(function (e) {

        e.preventDefault();

        $("#modalNewMember").modal('toggle');

        var output = "<div class=\"mb-2\"><select class=\"js-example-basic-single\" id=\"contactSelectBox\" style=\"width: 100%\">\n" +
            "</select></div>";
        $("#contactSelect").html(output);

        //hol Dir alle Kontakte im geeigneten Format für select2
        $('#contactSelectBox').select2({
            placeholder: "Suchen Sie hier nach einem Kontakt...",
            ajax: {
                type: "GET",
                url: '/contacts/select',
                dataType: 'json'
            }
        });


        var outputSubarea = "<div class=\"mb-2\"><select class=\"js-example-basic-single\" id=\"subareaSelectBox\" style=\"width: 100%\">\n" +
            "</select></div>";
        $("#subareaSelect").html(outputSubarea);

        //hol Dir alle Kontakte im geeigneten Format für select2
        $('#subareaSelectBox').select2({
            placeholder: "Suchen Sie hier nach einem Gewerk...",
            ajax: {
                type: "GET",
                url: '/subareas/select',
                dataType: 'json'
            }
        });


    });


    $("#btnSaveNewMember").click(function () {

        $.ajax({
            type: "POST",
            url: "/member",
            data:
                {
                    'projectID' : '{{ $projectID }}',
                    'contactID' : $("#contactSelectBox").select2('data')[0]["id"],
                    'subareaID' : $("#subareaSelectBox").select2('data')[0]["id"]
                }
            ,
            success: function (data) {
                $("#modalNewMember").modal('toggle');
                $tableMembers.bootstrapTable('refresh');
            }
        });
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
        '<a class="delete" href="javascript:void(0)" title="Entfernen">',
          '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
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
      'click .delete': function (e, value, row, index) {
          $.ajax({
              type: "DELETE",
              url: "/member/" + row.id,
              data: "",
              success: function (data) {
                  $tableMembers.bootstrapTable('refresh');
              }
          });
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
            field: 'operate',
            title: 'Entfernen',
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

    function operateFormatterVisits(value, row, index) {
        return [
            '<a href="/visit/' + row.id + '"><button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-eye"></i></button></a>'
        ]
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

  @component('partials.js')
    <strong>Whoops!</strong> Something went wrong!
  @endcomponent

</body>

</html>
