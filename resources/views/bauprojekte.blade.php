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
            <button id="btnNewProject" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> neues Bauprojekt</button>
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
            <form id="newForm" action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
              <label for="image">Foto</label>
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
            <input type="text" class="form-control" readonly id="projectID">
          </div>
          <div class="form-group" style="display:none">
            <label for="filename">Dateiname</label>
            <input type="text" class="form-control" readonly id="filename" >
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
            <label for="oldPhoto">Aktuelles Foto</label>
            <div class="mb-3" id="oldPhoto"></div>
          </div>
          <div class="form-group">
            <form id ="editForm" action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
              <label for="image">Neues Foto</label>
              <div class="row">
                <div class="col-md-9">
                  <input type="file" id="newImage" name="newImage" class="form-control">
                </div>
                <div class="col-md-3">
                  <button id="btnUploadNewImage" type="submit" class="btn btn-success">Upload</button>
                  <div id="projectImageUpdate"class="mt-1"></div>
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

      var newFile;

      //file ulpoad
      $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        newFile =  e.target.files[0];
      });

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      //init bootstrap table projects
      initTable();

      // this is the id of the form
      $("#newForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var formData = new FormData();

        // Attach file
        formData.append('image', newFile);

        $.ajax({
          url: '/image-upload-post',
          data: formData,
          type: 'POST',
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data) {
            $("#newProjectImage").html('<img class="img-fluid img-rounded" src="images/' + data + '">');
            $("#btnUploadImage").hide();
            $("#filename").val(data);
          }
        });
      });

      // this is the id of the form
      $("#editForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var formData = new FormData();

        // Attach file
        formData.append('image', newFile);

        $.ajax({
          url: '/image-upload-post',
          data: formData,
          type: 'POST',
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data) {
            $("#projectImageUpdate").html('<img class="img-fluid img-rounded" src="images/' + data + '">');
            $("#btnUploadNewImage").hide();
            $("#filename").val(data);
            //$("#btnUploadImage").attr("disabled","disabled");
          }
        });
      });

      $("#btnSaveNewProject").click(function () {
        //Create new project
        if (($("#number").val().length) && ($("#name").val().length) ) {
          $imageFileName = $('#filename').val();
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
          $imageFileName = $('#filename').val();
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
        '<a class="open" href="javascript:void(0)" title="Öffnen">',
          '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-eye"></i></button>',
        '</a>  ',
        '<a class="edit" href="javascript:void(0)" title="Bearbeiten">',
          '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-edit"></i></button>',
        '</a>  ',
        '<a class="delete" href="javascript:void(0)" title="Löschen">',
        '<button type="button" class="btn btn-default" style="color:#345589; border: none" ><i class="fas fa-trash"></i></button>',
        '</a>  '
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



    function updatedAtFormatter(value, row, index) {

      var timestamp = new Date(value);
      var d = timestamp.getDate().toString();
      if(timestamp.getDate() < 10) {
        d = "0" + d;
      }

      var month = timestamp.getMonth() + 1;
      var m = month.toString();
      if(timestamp.getMonth() < 10) {
        m = "0" + m;
      }
      var y = timestamp.getFullYear().toString();

      var h = timestamp.getHours().toString();
      if(timestamp.getHours() < 10) {
        h = "0" + h;
      }
      var min = timestamp.getMinutes().toString();
      if(timestamp.getMinutes() < 10) {
        min = "0" + min;
      }

      var output = d + "." + m + "." + y + ", " + h + ":" + min;

      return [
        output
      ]
    }

    window.operateEvents = {
      'click .edit': function (e, value, row, index) {
        $("#projectID").val(row.id);
        $("#newNumber").val(row.number);
        $("#newName").val(row.name);
        $("#newStreet").val(row.street);
        $("#newHousenumber").val(row.housenumber);
        $("#newPostcode").val(row.postcode);
        $("#newCity").val(row.city);
        $("#filename").val(row.photo);
        $("#oldPhoto").html("<img class=\"img-rounded table-img\" src=\"images/" + row.photo + "\">");
        $("#modalEditProject").modal('toggle');
      },
      'click .open': function (e, value, row, index) {
        location.href = "/projects/" + row.id;
      },
      'click .delete': function (e, value, row, index) {
        bootbox.confirm({
          message: "Wollen Sie das Bauprojekt wirklich endgültig entfernen?",
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
                url: "/project/" + row.id,
                data: "",
                success: function (data) {
                  alert("Das Projekt wurde gelöscht.")
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
            sortable: true	
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
            title: 'Aktionen',
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
