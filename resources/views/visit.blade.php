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
                    <a href="/bauprojekte">Bauprojekte</a> / <a href="/projects/{{ $project->id }}">{{ $project->number }} {{ $project->name }}</a>
                </div>
                <h2 class="m-0 font-weight-bold text-primary">Begehung: {{ $visit->title }} {{ $visit->date }}</h2>
            </div>
            <div class="col-md-2" style="text-align-right">
                <button class="btn btn-danger btn-circle mt-4 ml-4" title="PDF Bericht generieren" id="pdfTest2"><i class="fas fa-file-pdf"></i></button>
            </div>
          </div>
        </div>
          <div class="card-body">
              <div class="row mb-3">
                  <div class="col-md-6">
                      <label>Bezeichnung</label><br>
                      <input id="title" type="text" style="width:100%; color:#6e707e" value="{{$visit->title}}" placeholder="Bezeichnung...">
                  </div>
                  <div class="col-md-6">
                      <label>Bauleiter</label><br>
                      <select id="responsible">
                          @foreach($users as $user)
                            <option>{{ $user->name }}</option>
                          @endforeach
                      </select>
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
                      <label for="visitDescription">Baufortschritt</label>
                      <textarea rows="5" type="text" class="form-control" id="visitDescription">{{$visit->description}}</textarea>
                  </div>
              </div>
              <div style="text-align:right">
                  <button id="btnSaveVisit" type="button" class="btn btn-primary mb-4"><i class="fa fa-save"></i> Änderungen speichern</button>
              </div>

              <!-- Begehungsfotos -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="far fa-images"></i> Fotos zum Baufortschritt</h4>
                  </div>
                  <div id="toolbarVisitMedia">
                      <button id="btnNewVisitMedia" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Foto hinzufügen</button>
                  </div>
                  <div class="card-body">
                      <!-- Choose New Media [start] -->
                      <div id="chooseNewVisitMedia" style="display:none">
                          <div class="form-group">
                              <form id="newVisitMediaForm" action="{{ route('image.upload.post.visit') }}" method="POST" enctype="multipart/form-data">
                                  <label for="image">Foto hochladen</label>
                                  <div class="row">
                                      <div class="col-md-12 mb-3">
                                          <input id="photoDescription" type="text" style="width:100%; color:#6e707e" placeholder="Beschreibung zum Foto...">
                                      </div>
                                      <div class="col-md-9">
                                          <input type="file" id="image" name="image" class="form-control">
                                      </div>
                                      <div class="col-md-3">
                                          <button id="btnUploadVisitImage" type="submit" class="btn btn-success">Upload</button>
                                          <div id="newProjectImage"class="mt-1"></div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                          <div>
                              <button id="btnNewVisitMediaAbbrechen" class="btn btn-secondary" type="button">Abbrechen</button>
                          </div>
                      </div>
                      <!-- Choose New Media [end] -->
                      <!-- Table Present Members -->
                      <div class="table-responsive">
                          <table
                                  id="tableVisitMedia"
                                  data-id-field="id"
                                  data-side-pagination="client"
                                  data-toolbar="#toolbarVisitMedia"
                                  data-toggle="table"
                                  data-sortable="true"
                                  data-url="/visit/{{ $visit->id }}/media"
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

              <!-- Anwesende -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="fas fa-users"></i> Anwesende</h4>
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
                                  data-detail-view="false"
                                  data-response-handler="responseHandler"
                                  data-show-export="false"
                                  data-show-pagination-switch="true"
                                  data-row-style="rowStyle">
                          </table>
                      </div>
                  </div>
              </div>


              <div id="toolbarReports">
                  <button class="btn btn-danger btn-circle" title="PDF Bericht generieren" id="pdfTest"><i class="fas fa-file-pdf"></i></button> Neuen Begehungsbericht generieren
              </div>

              <!-- Berichte -->
              <div class="card shadow mb-4">
                  <div class="card-header py-3">
                      <h4><i class="fas fa-file-pdf"></i> Berichte</h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <!-- Table: Reports -->
                          <table
                                  id="reportsTable"
                                  data-id-field="id"
                                  data-side-pagination="client"
                                  data-toggle="table"
                                  data-sortable="true"
                                  data-url="/reports/{{$visit->id}}"
                                  data-search="true"
                                  data-toolbar="#toolbarReports"
                                  data-show-columns="true"
                                  data-pagination="true"
                                  data-page-list="[10, 25, 50, 100, ALL]"
                                  data-detail-formatter="detailFormatterReports"
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
      <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-clipboard-list"></i> Begehungsvermerk bearbeiten</h5>
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
                      <div class="form-group col-md-2">
                          <label for="visitationnoteCategory">Kategorie</label>
                          <select id="visitationnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Restarbeit">Restarbeit</option>
                              <option value="Information">Information</option>
                              <option value="zu erledigen">zu erledigen</option>
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                          <label for="visitationnoteImportant">Wichtig</label>
                          <input type="checkbox" class="form-control" id="visitationnoteImportant">
                      </div>
                      <div class="form-group col-md-3">
                          <label for="visitationnoteDeadline">Fälligkeit</label>
                          <input type="text" id="visitationnoteDeadline" style="width: 100%; color:#6e707e">
                      </div>
                      <div class="form-group col-md-2">
                          <label for="visitationnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="visitationnoteDone">
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
                  <div id="toolbarMedia">
                      <button id="btnNewMedia" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Foto hinzufügen</button>
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
                  <div class="row mb-3">
                      <div class="form-group col-md-3">
                          <label>Datum</label><br>
                          <input id="newVisitationnoteDate" type="text" style="width:100%; color:#6e707e" placeholder="Datum...">
                      </div>
                      <div class="form-group col-md-2">
                          <label for="newVisitationnoteCategory">Kategorie</label>
                          <select id="newVisitationnoteCategory">
                              <option value="Mangel" selected="selected">Mangel</option>
                              <option value="Restarbeit">Restarbeit</option>
                              <option value="Information">Information</option>
                              <option value="zu erledigen">zu erledigen</option>
                          </select>
                      </div>
                      <div class="form-group col-md-2">
                          <label for="newVisitationnoteImportant">Wichtig</label>
                          <input type="checkbox" class="form-control" id="newVisitationnoteImportant">
                      </div>
                      <div class="form-group col-md-3">
                          <label>Fälligkeit</label><br>
                          <input id="newVisitationnoteDeadline" type="text" style="width:100%; color:#6e707e" placeholder="Fälligkeit...">
                      </div>
                      <div class="form-group col-md-2">
                          <label for="newVisitationnoteDone">Erledigt</label>
                          <input type="checkbox" class="form-control" id="newVisitationnoteDone">
                      </div>
                  </div>
                  <div class="row mb-3">
                      <div class="form-group col-md-12">
                          <label for="newVisitationnoteDescription">Beschreibung</label>
                          <textarea rows="5" type="text" class="form-control" id="newVisitationnoteDescription"></textarea>
                      </div>
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

  <!-- Edit VisitMedia Modal [start] -->
  <div class="modal fade" id="modalEditVisitMedia" tabindex="-1" role="dialog" aria-labelledby="editVisitMediaModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><i class="far fa-image"></i></i> Foto bearbeiten</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">
                  <div class="form-group mb-3" style="display:none">
                      <input type="text" class="form-control" id="mediaID">
                  </div>
                  <div class="form-group mb-3">
                      <label for="newPhotoDesc">Beschreibung</label>
                      <input type="text" class="form-control" id="newPhotoDesc" placeholder="Beschreibung...">
                  </div>
                  <div class="form-group">
                      <label for="oldPhoto">Aktuelles Foto</label>
                      <div class="mb-3" id="oldVisitPhoto"></div>
                  </div>
                  <div class="form-group">
                      <form id ="editVisitMediaForm" action="{{ route('image.upload.post.edited.visit') }}" method="POST" enctype="multipart/form-data">
                          <label for="image">Neues Foto</label>
                          <div class="row">
                              <div class="col-md-9">
                                  <input type="file" id="newVisitImage" name="newVisitImage" class="form-control">
                              </div>
                              <div class="col-md-3">
                                  <button id="btnUploadNewImage" type="submit" class="btn btn-success">Upload</button>
                                  <div id="projectImageUpdate"class="mt-1"></div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="modal-footer">
                  <button id="btnSaveEditedVisitMedia" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Änderungen speichern</button>
                  <button id="btnCancelEditedVisitMedia" class="btn btn-secondary" type="button" data-dismiss="modal">Abbrechen</button>
              </div>
          </div>
      </div>
  </div>
  <!-- Edit VisitMedia Modal [end] -->


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

      $("#pdfTest2").click(function () {
          $("#pdfTest").click();
      });


      $("#pdfTest").click(function () {

          var idString = $.now().toString() + '{{ Auth::user()->id }}';

          $.ajax({
              type: "POST",
              url: "/exportvisit/save",
              data: JSON.stringify(
                  {
                      'idString' : idString,
                      'visitID' : '{{ $visit->id }}',
                      'projectID' : '{{ $project->id }}'
                  }
              ),
              success: function (data) {
                  //location.href = '/PdfDemo/' + idString;
                  //$("#reportsTable").bootstrapTable('refresh');
                  $.ajax({
                      type: "get",
                      url: '/PdfDemo/' + idString,
                      data: '',
                      success: function (data) {
                          $("#reportsTable").bootstrapTable('refresh');
                          $('html,body').animate({
                                  scrollTop: $("#reportsTable").offset().top},
                              'slow');
                      }
                  });


              }
          });
          //location.href = '/PdfDemo';
      });


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
                //alert("Die Änderungen an der Begehung wurden gespeichert.");
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

        var importantChecked = 0;
        if ($("#visitationnoteImportant").is(':checked')) {
            importantChecked = 1;
        }

        $.ajax({
            type: "PATCH",
            url: "/visitationnote/update/" + id,
            data:
                {
                    'title' : $("#visitationnoteTitle").val(),
                    'date' : $("#visitationnoteDate").val(),
                    'deadline' : $("#visitationnoteDeadline").val(),
                    'notes' : $("#visitationnoteDescription").val(),
                    'done' : checked,
                    'important' : importantChecked,
                    'category' : $("#visitationnoteCategory").val()
                }
            ,
            success: function (data) {
                //alert("Die Änderungen am Begehungsvermerk wurden gespeichert.");
                $table.bootstrapTable('refresh');
                $("#modalEditVisitationnnote").modal('toggle');
            }
        });
    });


    $("#btnNewMedia").click(function () {
        $("#btnNewMedia").hide();
        $("#image").val("");
        $("#chooseNewMedia").fadeIn();
    });

      $("#btnNewMediaAbbrechen").click(function () {
        $("#chooseNewMedia").hide();
        $("#btnNewMedia").fadeIn();
      });

      $("#btnNewVisitMedia").click(function () {
          $("#btnNewVisitMedia").hide();
          $("#image").val("");
          $("#chooseNewVisitMedia").fadeIn();
      });

      $("#btnNewVisitMediaAbbrechen").click(function () {
          $("#chooseNewVisitMedia").hide();
          $("#btnNewVisitMedia").fadeIn();
      });

    $("#btnNewVisitationnote").click(function () {

        $("#modalNewVisitationnnote").modal('toggle');
        $("#newVisitationnoteDate").val("");
        $("#newVisitationnoteTitle").val("");
        $("#newVisitationnoteDeadline").val("");
        $("#newVisitationnoteDescription").val("");
        $("#newVisitationnoteDone").prop('checked', false);
        $("#newVisitationnoteImportant").prop('checked', false);
        $("#newVisitationnoteCategory").val("Mangel");


    });

    $("#btnSaveNewVisitationnote").click(function () {
      var done = 0;
      if ($("#newVisitationnoteDone").is(':checked')) {
          done = 1;
      }
        var important = 0;
        if ($("#newVisitationnoteImportant").is(':checked')) {
            important = 1;
        }

      $.ajax({
          type: "POST",
          url: "/visitationnote",
          data:
              {
                  'visit_id' : '{{ $visit->id }}',
                  'date' : $("#newVisitationnoteDate").val() + " 00:00:00",
                  'deadline' : $("#newVisitationnoteDeadline").val(),
                  'notes' : $("#newVisitationnoteDescription").val(),
                  'done' : done,
                  'important' : important,
                  'category' : $("#newVisitationnoteCategory").val()
              }
          ,
          success: function (data) {
              //alert("Der Begehungsvermerk wurde erfolgreich angelegt.");
              $table.bootstrapTable('refresh');
              $("#modalNewVisitationnnote").modal('toggle');

          }
      });
    });

      $("#btnSaveEditedVisitMedia").click(function () {

          $.ajax({
              url: '/media/' + $("#mediaID").val(),
              data: {
                  'info' : $("#newPhotoDesc").val()
              },
              type: 'PATCH',
              success: function(data) {
                  $("#btnCancelEditedVisitMedia").click();
                  $tableVisitMedia.bootstrapTable('refresh');
              }
          });
      });

      $("#btnCancelEditedVisitMedia").click(function () {
        $("#modalEditVisitMedia").modal('toggle');
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
       * Bootstrap-table detailFormatterReports
       *
       * @param index
       * @param row
       * @returns {string}
       */
      function detailFormatterReports(index, row) {
          var html = []
          $.each(row, function (key, value) {
              if (key === 'log') {
                html.push('<p style="font-size:0.9em"><b>Verlauf:</b><br>' + value + '</p>')
              }

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

      //window.operateEvents for all bootstrap-tables
      window.operateEvents = {
          'click .edit': function (e, value, row, index) {

              $("#modalEditVisitationnnote").modal('toggle');
              $("#visitationnoteDate").val(row.created_at.substring(0,row.created_at.length - 9));
              $("#visitationnoteNumber").val(row.number);
              $("#visitationnoteDeadline").val(row.deadline);
              $("#visitationnoteDescription").val(row.notes);
              $("#visitationnoteDone").prop('checked', row.done);
              $("#visitationnoteImportant").prop('checked', row.important);
              $("#visitationnoteCategory").val(row.category);
              $("#visitationnoteID").val(row.id)
              $('#tableMedia').bootstrapTable('refresh', {url: '/visitationnote/media/' + row.id });
              $('#tableConcernedMembers').bootstrapTable('refresh', {url: '/visitationnote/concerned/' + row.id });


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
          },
          'click .deleteMedia': function (e, value, row, index) {
              bootbox.confirm({
                  message: "Foto wirklich löschen?",
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
                              url: "/media/" + row.id,
                              data: "",
                              success: function (data) {
                                  $tableMedia.bootstrapTable('refresh');
                              }
                          });
                      }
                  }
              });
          },
          'click .editVisitMedia': function (e, value, row, index) {
              $("#modalEditVisitMedia").modal('toggle');
              $("#mediaID").val(row.id);
              $("#newPhotoDesc").val(row.info);
              $("#oldVisitPhoto").html('<img class="img-fluid img-rounded table-img" src="/images/' + row.filename + '">');
          },
          'click .deleteVisitMedia': function (e, value, row, index) {
              bootbox.confirm({
                  message: "Foto wirklich löschen?",
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
                              url: "/media/" + row.id,
                              data: "",
                              success: function (data) {
                                  $tableVisitMedia.bootstrapTable('refresh');
                              }
                          });
                      }
                  }
              });
          },
          'click .deleteReport': function (e, value, row, index) {
              bootbox.confirm({
                  message: "Bericht wirklich löschen?",
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
                              url: "/report/" + row.id,
                              data: "",
                              success: function (data) {
                                  $reportsTable.bootstrapTable('refresh');
                              }
                          });
                      }
                  }
              });
          },
          'click .sendReport': function (e, value, row, index) {
              bootbox.confirm({
                  message: "Bericht jetzt per E-Mail an alle Projektteilnehmer im aktuellen Verteiler senden?",
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
                              type: "GET",
                              url: "/report/" + row.id + "/send",
                              data: "",
                              success: function (data) {
                                  $reportsTable.bootstrapTable('refresh');
                              }
                          });
                      }
                  }
              });
          },
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
       * Gibt eine map der Member-IDs der aktuell selektierten Zeilen zurück.
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

      function updatedAtFormatter(value, row, index) {
          var date = value.substring(0,value.length - 3);
          return [
              date
          ]
      }

      function createdAtFormatter(value, row, index) {
          var date = value.substring(0,value.length - 9);
          return [
              date
          ]
      }

      function createdAtFormatterReports(value, row, index) {
          var date = new Date(value);
          var d = date.getDate();
          var m = date.getMonth();
          var h = date.getHours();
          var min = date.getMinutes();
          if(date.getMonth() < 10) {
              m = "0" + m;
          }
          if(date.getDate() < 10) {
              d = "0" + d;
          }
          if(date.getHours() < 10) {
              h = "0" + h;
          }
          if(date.getMinutes() < 10) {
              min = "0" + min;
          }

          var y = date.getFullYear().toString();


          var output = d + "." + m + "." + y + ", " + h + ":" + min;

          return [
              output
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

      function subscribeFormatter(value, row, index) {

          if (value) {
              return [
                  '<input class=\"presenceCheck\" type=\"checkbox\" name=\"presence\" value=\"1\" checked onclick=\"handleSubscribeClick(this,\'' + row.id + '\')\">'
              ]
          }

          return [
              '<input class=\"presenceCheck\" type=\"checkbox\" name=\"presence\" value=\"0\" onclick=\"handleSubscribeClick(this,\'' + row.id + '\')\">'
          ]
      }

      function handleClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);
          var checked = 0;
          if (cb.checked) {
              checked = 1;
          }

          //update the member's presence for this visit
          $.ajax({
              type: "PATCH",
              url: "/visit/{{ $visit->id }}/presence",
              data:
                  {
                      'memberID' : id,
                      'presence' : checked
                  }
              ,
              success: function (data) {
                  //alert("Die Änderungen bei der Anwesenheit wurden übernommen.");
                  $tableMembers.bootstrapTable('refresh');

              }
          });


      }

      function handleSubscribeClick(cb, id) {
          //alert("Clicked id " + id + " , new value = " + cb.checked);
          var checked = 0;
          if (cb.checked) {
              checked = 1;
          }

          //update the member's presence for this visit
          $.ajax({
              type: "PATCH",
              url: "/visit/{{ $visit->id }}/subscribe",
              data:
                  {
                      'memberID' : id,
                      'subscribe' : checked
                  }
              ,
              success: function (data) {
                  //alert("Die Änderungen am Verteiler wurden übernommen.");
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
                  }, {
                      field: 'subscribe',
                      title: 'Verteiler',
                      align: 'center',
                      formatter: subscribeFormatter
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


      // - BOOTSTRAP-TABLE MEDIA - //

      var $tableMedia = $('#tableMedia')

      /**
       * Gibt eine map der Media-IDs der aktuell selektierten Zeilen zurück.
       *
       */
      function getIdSelectionsMedia() {
          return $.map($tableMedia.bootstrapTable('getSelections'), function (row) {
              return row.id;
          })
      }

      function operateFormatterMedia(value, row, index) {
          return [
              '<a class="deleteMedia" href="javascript:void(0)" title="Löschen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
              '</a> '
          ].join('')
      }

      function imageFormatterMedia(value, row, index) {
          return [
              '<a href="/images/' + value + '"><img class="img-fluid visitationnote-img" src="/images/' + value + '" /></a>'
          ]
      }


      /**
       * Initiiert die Bootstrap-Table.
       */
      function initTableMedia() {
          $tableMedia.bootstrapTable('destroy').bootstrapTable({
              locale: 'de-DE',
              columns: [
                  {
                      field: 'filename',
                      title: 'Foto',
                      sortable: false,
                      align: 'left',
                      formatter: imageFormatterMedia
                  }, {
                      field: 'operate',
                      title: 'Aktionen',
                      align: 'center',
                      events: window.operateEvents,
                      formatter: operateFormatterMedia
                  }
              ]
          })
          $tableMedia.on('check.bs.table uncheck.bs.table ' +
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
          $tableMedia.on('all.bs.table', function (e, name, args) {
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


      // - BOOTSTRAP-TABLE VisitMedia - //

      var $tableVisitMedia = $('#tableVisitMedia')

      /**
       * Gibt eine map der Media-IDs der aktuell selektierten Zeilen zurück.
       *
       */
      function getIdSelectionsVisitMedia() {
          return $.map($tableVisitMedia.bootstrapTable('getSelections'), function (row) {
              return row.id;
          })
      }

      function operateFormatterVisitMedia(value, row, index) {
          return [
              '<a class="editVisitMedia" href="javascript:void(0)" title="Bearbeiten">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>',
              '</a> ',
              '<a class="deleteVisitMedia" href="javascript:void(0)" title="Löschen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
              '</a> '
          ].join('')
      }

      /**
       * Initiiert die Bootstrap-Table.
       */
      function initTableVisitMedia() {
          $tableVisitMedia.bootstrapTable('destroy').bootstrapTable({
              locale: 'de-DE',
              columns: [
                  {
                      field: 'filename',
                      title: 'Foto',
                      sortable: false,
                      align: 'left',
                      formatter: imageFormatterMedia
                  },{
                      field: 'info',
                      title: 'Beschreibung',
                      sortable: true,
                      align: 'left'
                  }, {
                      field: 'operate',
                      title: 'Aktionen',
                      align: 'center',
                      events: window.operateEvents,
                      formatter: operateFormatterVisitMedia
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


      // - REPORTS BOOTSTRAP-TABLE - //

      var $reportsTable = $('#reportsTable')


      function operateFormatterReports(value, row, index) {
          var url = "{{url('/storage/app/public/reports/')}}/" + row.filename;
          return [
              '<a class="showReport" href="' + url + '" title="Anzeigen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-eye"></i></button>',
              '</a>  ',
              '<a class="sendReport" title="Bericht an aktuellen Verteiler senden">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-envelope"></i></button>',
              '</a>  ',
              '<a class="downloadReport" href="' + url + '" title="Download" download>',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-download"></i></button>',
              '</a>  ',
              '<a class="deleteReport" href="javascript:void(0)" title="Löschen">',
              '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
              '</a> '
          ].join('')
      }

      function filenameFormatterReports(value, row, index) {
          var url = "{{url('/storage/app/public/reports/')}}/" + value;

          return '<a href="' + url + '"><i class=\"far fa-file-pdf\"></i> ' + value + '</a>';
      }


      /**
       * Initiiert die Bootstrap-Table.
       */
      function initReportsTable() {
          $reportsTable.bootstrapTable('destroy').bootstrapTable({
              locale: 'de-DE',
              columns: [
                  {
                      field: 'filename',
                      title: 'Dateiname',
                      sortable: false,
                      align: 'left',
                      formatter: filenameFormatterReports
                  }, {
                      field: 'created_at',
                      title: 'erstellt am',
                      align: 'left',
                      sortable: true,
                      formatter: createdAtFormatterReports

                  },{
                      field: 'operate',
                      title: 'Aktion',
                      sortable: false,
                      align: 'left',
                      events: window.operateEvents,
                      formatter: operateFormatterReports
                  }
              ]
          })
          $reportsTable.on('check.bs.table uncheck.bs.table ' +
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
          $reportsTable.on('all.bs.table', function (e, name, args) {
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
      $("#visitationnoteDeadline").flatpickr(
          {
              enableTime: false,
              noCalendar: false,
              dateFormat: "Y-m-d",
          }
      );
      $("#newVisitationnoteDate").flatpickr(
          {
              enableTime: false,
              noCalendar: false,
              dateFormat: "Y-m-d",
          }
      );
      $("#newVisitationnoteDeadline").flatpickr(
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
          initTableMedia();
          initTableVisitMedia();
          initTableConcernedMembers();
          initReportsTable();

          $("#showDate").click(function () {
              var status = $("#date").val();
              alert(status);
          })

          $("#showTime").click(function () {
              var status = $("#time").val();
              alert(status);
          })

          $("#showDateVisitationNote").click(function () {
              var status = $("#newVisitationnoteDate").val();
              alert(status);
          })

          $("#showDeadlineVisitationNote").click(function () {
              var status = $("#newVisitationnoteDeadline").val();
              alert(status);
          })

          var newFile;

          //file ulpoad
          $('input[type="file"]').change(function(e) {
              var fileName = e.target.files[0].name;
              newFile =  e.target.files[0];
          });

          // this is the id of the form
          $("#newForm").submit(function(e) {

              e.preventDefault(); // avoid to execute the actual submit of the form.

              var formData = new FormData();

              // Attach file
              formData.append('image', newFile);

              formData.append('visitationnoteID', $("#visitationnoteID").val());

              $.ajax({
                  url: '/image-upload-post-visitationnote',
                  data: formData,
                  type: 'POST',
                  contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                  processData: false, // NEEDED, DON'T OMIT THIS
                  success: function(data) {
                      $("#btnNewMediaAbbrechen").click();
                      $tableMedia.bootstrapTable('refresh');
                  }
              });
          });

          var newVisitMediaFile;

          //file ulpoad
          $('input[type="file"]').change(function(e) {
              var fileName = e.target.files[0].name;
              newVisitMediaFile =  e.target.files[0];
          });

          // this is the id of the form
          $("#newVisitMediaForm").submit(function(e) {

              e.preventDefault(); // avoid to execute the actual submit of the form.

              var visitMediaFormData = new FormData();

              // Attach file
              visitMediaFormData.append('image', newVisitMediaFile);

              visitMediaFormData.append('visitID', '{{ $visit->id }}');

              visitMediaFormData.append('info', $("#photoDescription").val());

              $.ajax({
                  url: '/image-upload-post-visit',
                  data: visitMediaFormData,
                  type: 'POST',
                  contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                  processData: false, // NEEDED, DON'T OMIT THIS
                  success: function(data) {
                      $("#newVisitImage").html('<img class="img-fluid img-rounded" src="images/' + data + '">');
                      $("#btnUploadImage").hide();
                      $("#filename").val(data);
                      $("#btnEditVisitMediaAbbrechen").click();
                      $tableVisitMedia.bootstrapTable('refresh');
                  }
              });
          });

          // this is the id of the form
          $("#editVisitMediaForm").submit(function(e) {

              e.preventDefault(); // avoid to execute the actual submit of the form.

              var editVisitMediaFormData = new FormData();

              // Attach file
              editVisitMediaFormData.append('image', newVisitMediaFile);

              editVisitMediaFormData.append('visitID', '{{ $visit->id }}');

              editVisitMediaFormData.append('info', $("#newPhotoDesc").val());

              editVisitMediaFormData.append('mediaID', $("#mediaID").val());

              $.ajax({
                  url: '/image-upload-post-edited-visit',
                  data: editVisitMediaFormData,
                  type: 'POST',
                  contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                  processData: false, // NEEDED, DON'T OMIT THIS
                  success: function(data) {
                      $("#oldVisitPhoto").html('<img class="img-fluid img-rounded table-img" src="/images/' + data + '">');
                      $("#newVisitImage").val('');
                      $("#btnEditVisitMediaAbbrechen").click();
                      $tableVisitMedia.bootstrapTable('refresh');
                  }
              });
          });

      });

  </script>


  @component('partials.js')
      <strong>Whoops!</strong> Something went wrong!
  @endcomponent

</body>

</html>
