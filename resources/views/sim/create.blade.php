@extends('master')

@section('content')
<style media="screen">
  .image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;
    color: #333;
    background-color: #fff;
    border-color: #ccc;
  }
  .image-preview-input input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
  }
  .image-preview-input-title {
    margin-left:2px;
  }
</style>
<script type="text/javascript">
$(document).on('click', '#close-preview', function(){
  $('.image-preview').popover('hide');
  // Hover befor close the preview
  $('.image-preview').hover(
      function () {
         $('.image-preview').popover('show');
      },
       function () {
         $('.image-preview').popover('hide');
      }
  );
});

$(function() {
  // Create the close button
  var closebtn = $('<button/>', {
      type:"button",
      text: 'x',
      id: 'close-preview',
      style: 'font-size: initial;',
  });
  closebtn.attr("class","close pull-right");
  // Set the popover default content
  $('.image-preview').popover({
      trigger:'manual',
      html:true,
      title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
      content: "There's no image",
      placement:'bottom'
  });
  // Clear event
  $('.image-preview-clear').click(function(){
      $('.image-preview').attr("data-content","").popover('hide');
      $('.image-preview-filename').val("");
      $('.image-preview-clear').hide();
      $('.image-preview-input input:file').val("");
      $(".image-preview-input-title").text("Browse");
  });
  // Create the preview image
  $(".image-preview-input input:file").change(function (){
      var img = $('<img/>', {
          id: 'dynamic',
          width:250,
          height:350
      });
      var file = this.files[0];
      var reader = new FileReader();
      // Set preview image into the popover data-content
      reader.onload = function (e) {
          $(".image-preview-input-title").text("Change");
          $(".image-preview-clear").show();
          $(".image-preview-filename").val(file.name);
          img.attr('src', e.target.result);
          $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
      }
      reader.readAsDataURL(file);
  });
});
</script>

<div class="work-progres">
  <div class="chit-chat-layer1">
  	<div class="col-md-12 chit-chat-layer1-left">
      <a href="{{ url('sim') }}"><h1><u>All Data SIM</u></h1></a>
      <div class="chit-chat-heading">
            Add Data SIM
      </div>
     
      <br>
      <form class="form-horizontal bordered-row" method="post" action="{{ route('sim.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
                <div class="row">
                	<!-- KIRI -->
                    <div class="col-md-4">
                      <h5>Maximum Image Size Upload 1 MB = 1024 KB</h5>
                    	<!-- GAMBAR -->
                      <!-- image-preview-filename input [CUT FROM HERE]-->
                      <div class="input-group image-preview">
                          <input type="text" class="form-control image-preview-filename" style="position:relative;z-index:0;"> <!-- don't give a name === doesn't send on POST/GET -->
                          <span class="input-group-btn">
                              <!-- image-preview-clear button -->
                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                  <span class="glyphicon glyphicon-remove"></span> Clear
                              </button>
                              <!-- image-preview-input -->
                              <div class="btn btn-default image-preview-input">
                                  <span class="glyphicon glyphicon-folder-open"></span>
                                  <span class="image-preview-input-title">Browse</span>
                                  <input type="file" name="file_foto" accept="image/png, image/jpeg, image/gif" required/> <!-- rename it -->
                              </div>
                          </span>
                      </div><!-- /input-group image-preview [TO HERE]-->
                    </div>
                    <!-- KANAN -->
                    <div class="col-md-8">
                      <!-- No SIM -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">No SIM</label>
		                    <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_sim" id="no_sim" required>
		                    </div>
                        </div>
                      </div>
                      <!-- Nama -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nama</label>
		                    <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" id="nama" required>
		                    </div>
                        </div>
                      </div>
                      <!-- ALAMAT -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Alamat</label>
		                    <div class="col-sm-8">
		                        <textarea class="form-control" id="alamat" name="alamat" required></textarea>
		                    </div>
                        </div>
                      </div>
                      <!-- Tempat Lahir -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Lahir</label>
		                    <div class="col-sm-8">
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
		                    </div>
                        </div>
                      </div>
                      <!-- TANGGAL LAHIR -->
                      <div class="row">
                        <div class="form-group">
                            <label for="" class="col-md-3 control-label">Tanggal Lahir</label>
                            <div class="col-md-8">
                              <div class='input-group date' id='datetimepicker1' style="position:relative;z-index:0;">
                                  <input type='date' class="form-control" format="dd-mm-yyyy" name="tanggal_lahir" id="tanggal_lahir" required/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>
                        </div>
                      </div>
                      <!-- Pekerjaan -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Pekerjaan</label>
		                    <div class="col-sm-8">
                                <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" required>
		                    </div>
                        </div>
                      </div>
                      <!-- Kategori SIM -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Kategori SIM</label>
		                    <div class="col-sm-8">
                                <select class="form-control" name="kategori_sim" id="kategori_sim">
                                    <option value="-">--</option>
                                    <option value="SIM A">SIM A</option>
                                    <option value="SIM B I">SIM B I</option>
                                    <option value="SIM B II">SIM B II</option>
                                    <option value="SIM C">SIM C</option>
                                    <option value="SIM D">SIM D</option>
                                </select>
		                    </div>
                        </div>
                      </div>
                      
                      <!-- Tempat Pembuatan -->
                      <div class="row">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Tempat Pembuatan</label>
                            <div class="col-md-6">
                                <input type="text" id="id_tempat_pembuatan" class="form-control" name="id_tempat_pembuatan" style="display:none;">
                                <input type="text" id="tempat_pembuatan" class="form-control" name="tempat_pembuatan" readonly="readonly">
                            </div>
                            <div class="col-md-3">
                              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_tempat">Click</button>
                            </div>
                        </div>
                      </div>
                    </div> <!-- AKHIR KANAN -->
                </div> <!-- PENUTUP ROW -->
                <br><br>
                <div class="bg-default text-center pad20A mrg25T">
                    <button class="btn btn-lg btn-primary">TAMBAH DATA SIM</button>
                </div>
            </form>

            <div class="modal fade" id="modal_tempat" role="dialog" style="text-align:center;">
              <div class="modal-dialog" style="width:1000px;">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tempat Pembuatan</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="table_tempat">
                        <thead>
                        <tr style="text-align:center;">
                            <th>#</th>
                            <th>Nama Tempat Pembuatan</th>
                            <th>Kota Tempat Pembuatan</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody style="text-align:left;">
                            @foreach($data_tempat_pembuatan as $tempat)
                            <tr class="clickable-row" style="text-align:left;">
                                <td>{{$tempat->id_tempat_pembuatan}}</td>
                                <td>{{$tempat->nama_tempat}}</td>
                                <td>{{$tempat->nama_kota}}</td>
                                <td><button class="btn btn-primary" onclick="pilih({{$tempat->id_tempat_pembuatan}},'{{$tempat->nama_tempat}}','{{$tempat->nama_kota}}')">Pilih</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!--end of table pengguna-->
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<script>
  //Datatables script
    function pilih(id,tempat,kota){
        $('#id_tempat_pembuatan').val(id);
        var str=tempat+" | "+kota;
        $('#tempat_pembuatan').val(str);
        $('#modal_tempat').modal('hide');
    }

    $(document).ready(function(){
        $('#table_tempat').DataTable({
        });
    });
 </script>
@endsection
