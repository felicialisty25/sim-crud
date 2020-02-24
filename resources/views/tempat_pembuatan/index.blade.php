@extends('master')

@section('content')

@if(\Session::has('success'))
<div class="alert alert-success" id="benar">
  <p>{{\Session::get('success')}}</p>
</div>
@endif

@if(count($errors) > 0)
<div class="alert alert-danger" id="salah">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="work-progres">
  <div class="chit-chat-layer1">
  	<div class="col-md-12 chit-chat-layer1-left">
      <div class="row">
        <div class="col-md-6 text-left">
          <div class="chit-chat-heading">
            <u><h2>Data Tempat Pembuatan SIM</h2></u>
          </div>
        </div>
        <div class="col-md-6 text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addData">CREATE TEMPAT PEMBUATAN</button>
        </div>
      </div>
      <br>

      <!--start table-->
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_tempat_pembuatan">
          <thead>
            <tr>
              <th>#</th>
              <th>Nama Tempat Pembuatan</th>
              <th>Alamat Tempat Pembuatan</th>
              <th>Kota</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach($tempat as $row)
            <tr>
                <td>{{ $row->id_tempat_pembuatan }}</td>
                <td>{{ $row->nama_tempat }}</td>
                <td>{{ $row->alamat_tempat }}</td>
                <td>{{ $row->nama_kota }}</td>
                <td><button type="button" class="btn btn-warning" data-id="{{$row->id_tempat_pembuatan}}" data-title="{{$row->nama_tempat}}" data-alamat="{{$row->alamat_tempat}}" data-kota="{{$row->id_kota}}" data-toggle="modal" data-target="#edit">Edit</button></td>
                <td><button type="button" class="btn btn-danger" data-id="{{$row->id_tempat_pembuatan}}" data-title="{{$row->nama_tempat}}" data-alamat="{{$row->alamat_tempat}}" data-kota="{{$row->id_kota}}" data-toggle="modal" data-target="#delete">Delete</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end of table-->
      
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<!-- Modal Add-->
<div id="addData" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title">Add New Tempat Pembuatan</h4>
      </div>
      <div class="modal-body">
          <form action="{{url('tempatPembuatan')}}" method="post" style="margin-bottom:10%;">
            {{ csrf_field() }}
            <div class="form-group">
            <label for="nama_tempat_pembuatan">Nama Tempat Pembuatan</label>
            <input type="text" name="nama_tempat" class="form-control" placeholder="Enter Nama Tempat Pembuatan">
            </div>
            <div class="form-group">
                <label for="alamat_tempat_pembuatan">Alamat Tempat Pembuatan</label>
                <textarea class="form-control" name="alamat_tempat" id="alamat_tempat" rows="3" placeholder="Enter Alamat Tempat Pembuatan"></textarea>
            </div>
            <div class="form-group">
                <label for="id_kota">Kota</label><br>
                <select class="js-example-disabled-results form-control" name="id_kota" id="id_kota" style="width:100%;">
                    @foreach($kota as $row)
                        <option value="{{$row->id_kota}}">{{$row->nama_kota}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
            <span class="pull-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
                <input type="submit" class="btn btn-success" name="submit_kota" value="Add Data">
            </span>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- end modal content -->


<!-- Modal Edit -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Tempat Pembuatan</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('tempatPembuatan.update', 'test')}}" method="post" style="margin-bottom:10%;" id="edit-form">
          {{method_field('patch')}}
          {{ csrf_field() }}
            <input type="hidden" id="id_tempat_pembuatan" name="id_tempat_pembuatan" class="form-control">
            <div class="form-group">
              <label for="nama_tempat_pembuatan">Nama Tempat Pembuatan</label>
              <input type="text" id="nama_tempat" name="nama_tempat" class="form-control" placeholder="Enter Nama Tempat Pembuatan">
            </div>
            <div class="form-group">
                    <label for="alamat_tempat_pembuatan">Alamat Tempat Pembuatan</label>
                    <textarea class="form-control" name="alamat_tempat" id="alamat_tempat" rows="3" placeholder="Enter Alamat Tempat Pembuatan"></textarea>
                </div>
                <div class="form-group">
                    <label for="id_kota">Kota</label><br>
                    <select class="js-example-disabled-results2 form-control" name="id_kota" id="id_kota2" style="width:100%;">
                        @foreach($kota as $row)
                            <option value="{{$row->id_kota}}">{{$row->nama_kota}}</option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
              <span class="pull-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal"> Close </button>
                <input type="submit" class="btn btn-success" name="submit_kota" value="Edit Data">
              </span>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>
<!-- end modal content -->

<!-- Modal Delete -->
<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Tempat Pembuatan</h4>
        </div>
        <div class="modal-body">
          <form action="{{route('tempatPembuatan.destroy', 'test')}}" method="post" style="margin-bottom:10%;" id="delete-form">
            {{method_field('delete')}}
            {{ csrf_field() }}
              <input type="hidden" id="id_tempat_pembuatan" name="id_tempat_pembuatan" class="form-control">
              <p id="label-del"></p>
              <div class="form-group">
                <span class="pull-right">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                  <input type="submit" class="btn btn-success" name="submit_kota" value="Yes">
                </span>
              </div>
          </form>
        </div>
  
      </div>
    </div>
  </div>
  <!-- end modal content -->

<script>
//Edit Data
$('#edit').on('show.bs.modal', function(event){
  var button=$(event.relatedTarget)
  var nama_tempat = button.data('title') 
  var alamat_tempat = button.data('alamat')
  var id_kota = button.data('kota')
  var id_tempat_pembuatan = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id_tempat_pembuatan').val(id_tempat_pembuatan);
  modal.find('.modal-body #nama_tempat').val(nama_tempat);
  modal.find('.modal-body #alamat_tempat').val(alamat_tempat);
  modal.find('.modal-body #id_kota2').val(id_kota);
  $('#id_kota2').select2().trigger('change');
  
});

//Delete Data
$('#delete').on('show.bs.modal', function(event){
  var button=$(event.relatedTarget) 
  var nama_tempat_pembuatan = button.data('title')
  var alamat_tempat_pembuatan = button.data('alamat')
  var id_kota = button.data('kota')
  var id_tempat_pembuatan = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id_tempat_pembuatan').val(id_tempat_pembuatan);
  var endlab = ")?";
  var lab = "Are you sure want to delete this data (Nama Tempat Pembuatan : ".concat(nama_tempat_pembuatan).concat(endlab);
  document.getElementById("label-del").innerHTML = lab;
});

//Datatables script
 $(document).ready(function(){
    $('#table_tempat_pembuatan').DataTable({});

    $('#salah').fadeOut(3500);
    $('#benar').fadeOut(3500);

    $("#id_kota").select2();
    $("#id_kota2").select2();
 });
 </script>
@endsection
