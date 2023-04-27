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
                        <div class="border-left-primary pl-2 text-primary mb-2">
                            {{ $street }} {{ $housenumber }}, {{ $postcode }} {{ $city }}<br>
                            Erstellt: {{ date('d.m.Y', strtotime($created_at)) }}<br>
                            Letzte Aktualisierung: {{ date('d.m.Y', strtotime($updated_at)) }}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <img class="img-fluid img-rounded" src="/images/{{ $photo }}">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                      <h4><i class="fas fa-users"></i> Projektbeteiligte</h4>
                    </div>
                    <div class="card-body">
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
                </div>
            </div>
            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h4><i class="fas fa-walking"></i> Begehungen</h4>
                    </div>
                    <div class="card-body">
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
                </div>
            </div>
            <div class="container-fluid">
                <!-- Begehungsvermerke -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4><i class="fas fa-clipboard-list"></i> Alle Begehungsvermerke dieses Bauvorhabens</h4>
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
                                data-url="/visitationnotesByProject/{{ $projectID }}"
                                data-toolbar="#toolbar"
                                data-search="true"
                                data-show-columns="true"
                                data-pagination="false"
                                data-page-list="[50, 100, ALL]"
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
          <h5 class="modal-title" id="exampleModalLabel">Schon fertig?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Wählen Sie "Logout" unten wenn Sie sich wirklich abmelden möchten.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
          <a class="btn btn-primary" href="/logout">Logout</a>
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
              </div>
              <div class="modal-footer">
                  <button id="btnSaveNewMember" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Hinzufügen</button>
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
              </div>
          </div>
      </div>
  </div>
  <!-- New Member Modal [end] -->

  <!-- New Projectnote Modal [start] -->
  <div class="modal fade" id="modalNewProjectnote" tabindex="-1" role="dialog" aria-labelledby="newProjectnoteModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Neuer Projektvermerk</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group mb-3">
                      <label for="newProjectnoteTitle">Bezeichnung</label>
                      <input type="text" class="form-control" id="newProjectnoteTitle" placeholder="Bezeichnung...">
                  </div>
                  <div class="row mb-3">
                      <div class="form-group col-md-3">
                          <label for="newProjectnoteDate">Datum</label><br>
                          <input type="text" id="newProjectnoteDate" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newProjectnoteCategory">Kategorie</label>
                          <select id="newProjectnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Restarbeit">Restarbeit</option>
                              <option value="Information">Information</option>
                              <option value="zu erledigen">zu erledigen</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newProjectnoteDeadline">Fälligkeit</label>
                          <input type="text" id="newProjectnoteDeadline" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="newProjectnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="newProjectnoteDone">
                      </div>
                  </div>
                  <div class="form-group mb-3">
                      <label for="newProjectnoteDescription">Bemerkungen</label>
                      <textarea rows="10" type="text" class="form-control" id="newProjectnoteDescription" placeholder="Bemerkungen (Freitext)"></textarea>
                  </div>
                  <div style="text-align:right">
                      <button id="btnSaveNewProjectnote" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                      <button id="btnSaveNewProjectnoteAbbrechen" class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- New Projectnote Modal [end] -->

  <!-- Edit Projectnote Modal [start] -->
  <div class="modal fade" id="modalEditProjectnote" tabindex="-1" role="dialog" aria-labelledby="editProjectnoteModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clipboard"></i> Projektvermerk bearbeiten</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group" style="display:none">
                      <label for="editedProjectnoteID">ID</label>
                      <input type="text" class="form-control" id="editedProjectnoteID" hidden>
                  </div>
                  <div class="form-group mb-3">
                      <label for="projectnoteTitle">Bezeichnung</label>
                      <input type="text" class="form-control" id="projectnoteTitle" placeholder="Bezeichnung...">
                  </div>
                  <div class="row mb-3">
                      <div class="form-group col-md-3">
                          <label for="projectnoteDate">Datum</label><br>
                          <input type="text" id="projectnoteDate" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="projectnoteCategory">Kategorie</label>
                          <select id="projectnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Restarbeit">Restarbeit</option>
                              <option value="Information">Information</option>
                              <option value="zu erledigen">zu erledigen</option>
                          </select>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="projectnoteDeadline">Fälligkeit</label>
                          <input type="text" id="projectnoteDeadline" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="projectnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="projectnoteDone">
                      </div>
                  </div>
                  <div class="form-group mb-3">
                      <label for="projectnoteDescription">Bemerkungen</label>
                      <textarea rows="10" type="text" class="form-control" id="projectnoteDescription" placeholder="Bemerkungen (Freitext)"></textarea>
                  </div>

                  <div style="text-align:right">
                      <button id="btnSaveProjectnote" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                      <button id="btnSaveProjectnoteAbbrechen" class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
                  </div>

                  <div class="modal-footer mt-4">
                      <div class="table-responsive">
                          <label class="mt-3" for="tableMedia">Betroffene Projektteilnehmer bzw. Gewerke</label>

                          <!-- Table Present Members -->
                          <div class="table-responsive">
                              <table
                                      id="tableConcernedMembers"
                                      data-id-field="id"
                                      data-side-pagination="client"
                                      data-toggle="table"
                                      data-sortable="true"
                                      data-url=""
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
              </div>
          </div>
      </div>
  </div>
  <!-- Edit Projectnote Modal [end] -->

 <!-- Edit Visitationnote Modal [start] -->
 <div class="modal fade" id="modalEditVisitationnnote" tabindex="-1" role="dialog" aria-labelledby="editVisitationnoteModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editVisitationnoteLabel"><i class="fa fa-clipboard-list"></i> Begehungsvermerk bearbeiten</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="form-group col-md-3">
                        <label for="visitationnoteDate">Datum</label><br>
                        <input type="text" id="visitationnoteDate" style="width: 100%; color:#6e707e">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="visitationnoteCategory">Kategorie</label>
                        <select id="visitationnoteCategory">
                            <option value="Mangel" selected="selected">Mangel</option>
                            <option value="Restarbeit">Restarbeit</option>
                            <option value="Information">Information</option>
                            <option value="zu erledigen">zu erledigen</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="visitationnoteDeadline">Fälligkeit</label>
                        <input type="text" id="visitationnoteDeadline" style="width: 100%; color:#6e707e">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input type="checkbox" id="visitationnoteImportant">
                        <label for="visitationnoteImportant">Wichtig</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="visitationnoteConcernsAll">
                        <label for="visitationnoteConcernsAll">Betrifft alle</label>
                    </div>
                    <div class="col-md-3">
                        <input type="checkbox" id="visitationnoteDone">
                        <label for="visitationnoteDone">Erledigt</label>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group col-md-1">
                        <label>Nr</label><br>
                        <input id="visitationnoteNumber" type="text" style="width:100%; color:#6e707e" readonly>
                    </div>
                    <div class="form-group col-md-11">
                        <label for="visitationnoteDescription">Beschreibung</label>
                        <textarea rows="5" type="text" class="form-control" id="visitationnoteDescription"></textarea>
                    </div>
                </div>
                <div class="form-group" style="display:none">
                    <label for="visitationnoteID">ID</label>
                    <input type="text" class="form-control" id="visitationnoteID" hidden>
                </div>
                <div style="text-align:right">
                    <button id="btnSaveVisitationnote" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
                </div>


                <div class="modal-footer mt-4">
                    <div class="table-responsive">
                        <label class="mt-3" for="tableMedia">Betroffene Projektteilnehmer bzw. Gewerke</label>
                        <!-- Table Present Members -->
                        <div class="table-responsive">
                            <table
                                    id="tableConcernedMembers"
                                    data-id-field="id"
                                    data-side-pagination="client"
                                    data-toggle="table"
                                    data-sortable="true"
                                    data-url=""
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

                <div class="modal-footer mt-4">
                    <div id="toolbarMedia">
                        <button id="btnNewMedia" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Foto hinzufügen</button>
                    </div>
                    <div class="table-responsive">
                        <label class="mt-3" for="tableMedia">Fotos</label>
                        <!-- Choose New Media [start] -->
                        <div id="chooseNewMedia">
                            <div class="form-group">
                                <form id="newForm" action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                                    <label for="image">Foto hochladen</label>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <input type="file" id="image" name="image" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <button id="btnUploadImage" type="submit" class="btn btn-success">Upload</button>
                                            <div id="newProjectImage"class="mt-1"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <button id="btnNewMediaAbbrechen" class="btn btn-secondary" type="button">Abbrechen</button>
                            </div>
                        </div>
                        <!-- Choose New Media [end] -->
                        <!-- Table: Media -->
                        <table
                                id="tableMedia"
                                data-id-field="id"
                                data-side-pagination="client"
                                data-toggle="table"
                                data-sortable="true"
                                data-url=""
                                data-toolbar="#toolbarMedia"
                                data-search="true"
                                data-show-columns="true"
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
    </div>
</div>
<!-- Edit Visitationnote Modal [end] -->

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

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <script>
    $(document).ready(function () {

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      //init bootstrap tables
      initTableMembers();
      initTableProjectNotes();
      initTableVisits();
      initTableConcernedMembers();
      initTable();

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


    $("#projectnoteDate").flatpickr(
        {
            enableTime: false,
            noCalendar: false,
            dateFormat: "Y-m-d",
        }
    );
    $("#projectnoteDeadline").flatpickr(
        {
            enableTime: false,
            noCalendar: false,
            dateFormat: "Y-m-d",
        }
    );

    $("#newProjectnoteDate").flatpickr(
        {
            enableTime: false,
            noCalendar: false,
            dateFormat: "Y-m-d",
        }
    );
    $("#newProjectnoteDeadline").flatpickr(
        {
            enableTime: false,
            noCalendar: false,
            dateFormat: "Y-m-d",
        }
    );

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


    $("#btnNewProjectNote").click(function () {
        $("#modalNewProjectnote").modal('toggle');
    });

    $("#btnSaveNewProjectnote").click(function () {

        var checked = 0;
        if ($("#newProjectnoteDone").is(':checked')) {
            checked = 1;
        }

        $.ajax({
            type: "POST",
            url: "/projectnote",
            data:
                {
                    'projectID' : '{{ $projectID }}',
                    'title' : $("#newProjectnoteTitle").val(),
                    'date' : $("#newProjectnoteDate").val(),
                    'category' : $("#newProjectnoteCategory").val(),
                    'notes' : $("#newProjectnoteDescription").val(),
                    'deadline' : $("#newProjectnoteDeadline").val(),
                    'done' : checked,
                }
            ,
            success: function (data) {
                $("#btnSaveNewProjectnoteAbbrechen").click();
            }
        });
    });

    $("#btnSaveNewProjectnoteAbbrechen").click(function () {
        $("#modalNewProjectnote").modal('toggle');
        $tableProjectNotes.bootstrapTable('refresh');
    });


    $("#btnSaveProjectnote").click(function () {

        var checked = 0;
        if ($("#projectnoteDone").is(':checked')) {
            checked = 1;
        }

        $.ajax({
            type: "patch",
            url: "/projectnote/update/" + $("#editedProjectnoteID").val(),
            data:
                {
                    'title' : $("#projectnoteTitle").val(),
                    'date' : $("#projectnoteDate").val(),
                    'category' : $("#projectnoteCategory").val(),
                    'notes' : $("#projectnoteDescription").val(),
                    'deadline' : $("#projectnoteDeadline").val(),
                    'done' : checked,
                }
            ,
            success: function (data) {
                $("#btnSaveProjectnoteAbbrechen").click();
            }
        });
    });

    $("#btnSaveProjectnoteAbbrechen").click(function () {
        $("#modalEditProjectnote").modal('toggle');
        $tableProjectNotes.bootstrapTable('refresh');
    });


    $("#btnSaveNewMember").click(function () {

        if ($("#contactSelectBox").select2('data').length == 0 || $("#subareaSelectBox").select2('data').length == 0) {

            alert ("Bitte wählen Sie sowohl Kontakt als auch Gerwerk aus!");

        } else {

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
        }


    });


    $("#btnNewVisit").click(function (e) {
        $.ajax({
            type: "POST",
            url: "/visit/new/{{ $projectID }}",
            data: {
                'userID' : '{{ Auth::user()->id }}'
            },
            success: function (data) {
                location.href="/visit/" + data;
            }
        });
    });


    $("#imgRotate").click(function () {

        $.ajax({
            url: '/media/rotate/' + $("#mediaID").val(),
            data: {
            },
            type: 'PATCH',
            success: function(data) {
                $("#oldVisitPhoto").html('<img class="img-fluid img-rounded table-img" src="/images/' + data.filename + '">');
            }
        });


    });


  </script>

  <script>

   // - BOOTSTRAP-TABLE Visitationnotes - //

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
       *
       * @param value
       * @param row
       * @param index
       * @returns {string}
       */
      function operateFormatterVisitationnotes(value, row, index) {
          return [
              '<a class="editVisitationnote" href="javascript:void(0)" title="Bearbeiten">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>',
              '</a>  ',
              '<a class="deleteVisitationnote" href="javascript:void(0)" title="Löschen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
              '</a> ',
          ].join('')
      }


      function importantFormatter(value, row, index) {

          if (value) {
              return [
                  '<input class=\"importantCheck\" type=\"checkbox\" name=\"important\" value=\"1\" checked onclick=\"handleImportantClick(this,\'' + row.id + '\')\">'
              ]
          }

          return [
              '<input class=\"importantCheck\" type=\"checkbox\" name=\"important\" value=\"0\" onclick=\"handleImportantClick(this,\'' + row.id + '\')\">'
          ]
      }

      function handleImportantClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);

          var checked = 0;
          if (cb.checked) {
              checked = 1;
          }

          //update the done status for this visitationnote
          $.ajax({
              type: "PATCH",
              url: "/visitationnote/" + id + "/important",
              data:
                  {
                      'important' : checked
                  }
              ,
              success: function (data) {
                  //alert("Die Änderungen beim Begehungsvermerk wurden übernommen.");
                  $table.bootstrapTable('refresh');
              }
          });


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
                  //alert("Die Änderungen beim Begehungsvermerk wurden übernommen.");
                  $table.bootstrapTable('refresh');
              }
          });


      }

      function handleConcernedClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);

          var checked = 0;
          if (cb.checked) {
              checked = 1;
          }

          //update the done status for this visitationnote
          $.ajax({
              type: "PATCH",
              url: "/visitationnote/" + $("#visitationnoteID").val() + "/concerned",
              data:
                  {
                      'memberID' : id,
                      'concerned' : checked
                  }
              ,
              success: function (data) {
                  //alert("Die Änderungen beim Begehungsvermerk wurden übernommen.");
                  $tableConcernedMembers.bootstrapTable('refresh');
              }
          });


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
                      field: 'number',
                      title: 'Nr',
                      sortable: true,
                      align: 'left',
                      valign: 'top'
                  },{
                      field: 'notes',
                      title: 'Beschreibung',
                      sortable: false,
                      align: 'left',
                      valign: 'top'
                  }, {
                      field: 'created_at',
                      title: 'erstellt',
                      align: 'left',
                      valign: 'top',
                      sortable: true,
                      formatter: createdAtFormatter
                  }, {
                      field: 'category',
                      title: 'Kategorie',
                      align: 'left',
                      valign: 'top',
                      sortable: true
                  }, {
                      field: 'deadline',
                      title: 'Fälligkeit',
                      sortable: true,
                      align: 'left',
                      valign: 'top'
                  }, {
                      field: 'important',
                      title: 'wichtig',
                      sortable: true,
                      align: 'center',
                      valign: 'top',
                      formatter: importantFormatter
                  }, {
                      field: 'done',
                      title: 'erledigt',
                      sortable: true,
                      align: 'center',
                      valign: 'top',
                      formatter: doneFormatter
                  }, {
                      field: 'operate',
                      title: '',
                      align: 'center',
                      valign: 'top',
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
        var date = new Date(value);
        var d = date.getDate().toString();
        var month = date.getMonth() + 1;
        var m = month.toString();
        if(date.getMonth() < 10) {
            m = "0" + m;
        }
        if(date.getDate() < 10) {
            d = "0" + d;
        }

        var y = date.getFullYear().toString();


        var output = d + "." + m + "." + y;

      return [
        output
      ]
    }

    function createdAtFormatterProjectNotes(value, row, index) {
        var date = new Date(value.substr(0,10));
        var d = date.getDate();
        var m = date.getMonth();
        if(date.getMonth() < 10) {
            m = "0" + m;
        }
        if(date.getDate() < 10) {
            d = "0" + d;
        }

        var y = date.getFullYear().toString();


        var output = d + "." + m + "." + y;

        return [
            output
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

    function handleConcernedClick(cb, id) {
        //alert("Clicked id " + id + " , new value = " + cb.checked);

        var checked = 0;
        if (cb.checked) {
            checked = 1;
        }

        //update the concerned status for this projectnote
        $.ajax({
            type: "PATCH",
            url: "/projectnote/" + $("#editedProjectnoteID").val() + "/concerned",
            data:
                {
                    'memberID' : id,
                    'concerned' : checked
                }
            ,
            success: function (data) {
                alert("Die Änderungen beim Projektvermerk wurden übernommen.");
                $tableConcernedMembers.bootstrapTable('refresh');
            }
        });


    }

    window.operateEvents = {
        'click .editVisitationnote': function (e, value, row, index) {

            $("#editVisitationnoteLabel").html("<i class=\"fa fa-clipboard-list\"></i> Begehungsvermerk bearbeiten");
            $("#modalEditVisitationnnote").modal('toggle');
            $("#visitationnoteDate").val(row.created_at.substring(0,row.created_at.length - 9));
            $("#visitationnoteNumber").val(row.number);
            $("#visitationnoteDeadline").val(row.deadline);
            $("#visitationnoteDescription").val(row.notes);
            $("#visitationnoteDone").prop('checked', row.done);
            $("#visitationnoteImportant").prop('checked', row.important);
            $("#visitationnoteConcernsAll").prop('checked', row.concernsAll);
            $("#visitationnoteCategory").val(row.category);
            $("#visitationnoteID").val(row.id)
            $('#tableMedia').bootstrapTable('refresh', {url: '/visitationnote/media/' + row.id });
            $('#tableConcernedMembers').bootstrapTable('refresh', {url: '/visitationnote/concerned/' + row.id });


    },

        'click .deleteVisitationnote': function (e, value, row, index) {
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
          },

      'click .delete': function (e, value, row, index) {
          bootbox.confirm({
              message: "Projektbeteiligten wirklich aus diesem Projekt entfernen?",
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
                          url: "/member/" + row.id,
                          data: "",
                          success: function (data) {
                              $tableMembers.bootstrapTable('refresh');
                          }
                      });
                  }
              }
          });
      },
      'click .deleteVisit': function (e, value, row, index) {
          bootbox.confirm({
              message: "Wollen Sie die Begehung wirklich vollständig löschen?",
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
                          url: "/visit/" + row.id,
                          data: "",
                          success: function (data) {
                              $tableVisits.bootstrapTable('refresh');
                          }
                      });
                  }
              }
          });
      },
      'click .editProjectnote':function (e, value, row, index) {
          $('#tableConcernedMembers').bootstrapTable('refresh', {url: '/projectnote/concerned/' + row.id });
          $("#modalEditProjectnote").modal('toggle');
          $("#projectnoteTitle").val(row.title);
          $("#projectnoteDate").val(row.created_at.substring(0,row.created_at.length - 9));
          $("#projectnoteCategory").val(row.category);
          $("#projectnoteDeadline").val(row.deadline);
          $("#projectnoteDescription").val(row.notes);
          $("#projectnoteDone").prop('checked', row.done);
          $("#editedProjectnoteID").val(row.id);
          //$("#visitModalLabel").html('<h5><i class="fa fa-walking"></i> Begehung: ' + row.title + ' ' + row.date + '</h5>');

      },
      'click .deleteProjectnote':function (e, value, row, index) {
          bootbox.confirm({
              message: "Projektvermerk wirklich löschen?",
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
                          url: "/projectnote/" + row.id,
                          data: "",
                          success: function (data) {
                              $tableProjectNotes.bootstrapTable('refresh');
                          }
                      });
                  }
              }
          });
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


    // - BOOTSTRAP-TABLE PROJECTNOTES - //

    var $tableProjectNotes = $('#tableProjectNotes')

    /**
     * Gibt eine map der Projectnote-IDs der aktuell selektierten Zeilen zurück.
     *
     */
    function getIdSelectionsProjectNotes() {
      return $.map($tableProjectNotes.bootstrapTable('getSelections'), function (row) {
        return row.id;
      })
    }

    function operateFormatterProjectNotes(value, row, index) {
        return [
            '<button type="button" class="btn btn-default editProjectnote" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>' +
            '<button type="button" class="btn btn-default deleteProjectnote" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
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
            url: "/projectnote/" + id,
            data:
                {
                    'done' : checked
                }
            ,
            success: function (data) {
                alert("Die Änderungen beim Projektvermerk wurden übernommen.");
                $tableProjectNotes.bootstrapTable('refresh');
            }
        });


    }

    /**
     * Initiiert die Bootstrap-Table.
     */
    function initTableProjectNotes() {
      $tableProjectNotes.bootstrapTable('destroy').bootstrapTable({
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
            field: 'title',
            title: 'Bezeichnung',
            align: 'left',
            sortable: true,
          }, {
            field: 'category',
            title: 'Kategorie',
            align: 'left',
            sortable: true,
          }, {
            field: 'created_at',
            title: 'Erstellt',
            align: 'left',
            sortable: true,
            formatter: createdAtFormatterProjectNotes
          }, {
            field: 'deadline',
            title: 'Fälligkeit',
            align: 'left',
            sortable: true,
            formatter: createdAtFormatter
          }, {
            field: 'done',
            title: 'erledigt',
            align: 'center',
            sortable: true,
                formatter: doneFormatter
          }, {
            field: 'operate',
            title: 'Aktionen',
            align: 'center',
            events: window.operateEvents,
            formatter: operateFormatterProjectNotes
          }
        ]
      })
      $tableProjectNotes.on('check.bs.table uncheck.bs.table ' +
              'check-all.bs.table uncheck-all.bs.table',
              function () {
                //$remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$activate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$deactivate.prop('disabled', !$table.bootstrapTable('getSelections').length)
                //$newPW.prop('disabled', !$table.bootstrapTable('getSelections').length)

                // save your data, here just save the current page
                selections = getIdSelectionsProjectNotes()
                // push or splice the selections if you want to save all data selections
              })
      $tableProjectNotes.on('all.bs.table', function (e, name, args) {
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
            "<a href=\"/visit/" + row.id + "\"><button type=\"button\" class=\"btn btn-default\" style=\"color:#345589; border: none\" ><i class=\"fas fa-eye\"></i></button></a>" +
            "<button type=\"button\" class=\"btn btn-default deleteVisit\" style=\"color:#345589; border: none\" ><i class=\"fas fa-trash\"></i></button>"
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
     *
     * @param value
     * @param row
     * @param index
     * @returns {string}
     */
    function visitDoneFormatter(value, row, index) {
        var done = '<i class="far fa-square"></i>';

        if (value ===  0) {
            done = '<i class="far fa-check-square"></i>';
        }

        return [
            done
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
                    formatter: createdAtFormatter
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
                    field: 'notdone',
                    title: 'Abgeschlossen',
                    align: 'center',
                    sortable: true,
                    formatter: visitDoneFormatter
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


    // - BOOTSTRAP-TABLE ConcernedMembers - //

    var $tableConcernedMembers = $('#tableConcernedMembers')

    /**
     * Gibt eine map der Member-IDs der aktuell selektierten Zeilen zurück.
     *
     */
    function getIdSelectionsConcernedMembers() {
        return $.map($tableConcernedMembers.bootstrapTable('getSelections'), function (row) {
            return row.id;
        })
    }

    function operateFormatterConcernedMembers(value, row, index) {
        return [
            '<a class="deleteConcernedMember" href="javascript:void(0)" title="Löschen">',
            '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
            '</a> '
        ].join('')
    }

    function concernedFormatter(value, row, index) {

        if (value) {
            return [
                '<input class=\"concernedCheck\" type=\"checkbox\" name=\"concerned\" value=\"1\" checked onclick=\"handleConcernedClick(this,\'' + row.id + '\')\">'
            ]
        }

        return [
            '<input class=\"concernedCheck\" type=\"checkbox\" name=\"concerned\" value=\"0\" onclick=\"handleConcernedClick(this,\'' + row.id + '\')\">'
        ]
    }


    /**
     * Initiiert die Bootstrap-Table.
     */
    function initTableConcernedMembers() {
        $tableConcernedMembers.bootstrapTable('destroy').bootstrapTable({
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
                    field: 'subarea',
                    title: 'Gewerk',
                    sortable: true,
                    align: 'left',
                }, {
                    field: 'concerned',
                    title: 'Betroffen',
                    align: 'center',
                    formatter: concernedFormatter
                }

            ]
        })
        $tableConcernedMembers.on('check.bs.table uncheck.bs.table ' +
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
        $tableConcernedMembers.on('all.bs.table', function (e, name, args) {
            //console.log(name, args)
        })

    }



  </script>

  @component('partials.js')
    <strong>Whoops!</strong> Something went wrong!
  @endcomponent

</body>

</html>
