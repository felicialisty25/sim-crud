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
            <u><h2>Data Kota</h2></u>
          </div>
        </div>
        <div class="col-md-6 text-right">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addData">CREATE KOTA</button>
        </div>
      </div>
      <br>

      <!--start table -->
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_kota">
          <thead>
            <tr>
              <th>#</th>
              <th>NAMA Kota</th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            @foreach($kota as $row)
            <tr>
                <td>{{ $row['id_kota'] }}</td>
                <td>{{ $row['nama_kota'] }}</td>
                <td><button type="button" class="btn btn-warning" data-id="{{$row['id_kota']}}" data-title="{{$row['nama_kota']}}" data-toggle="modal" data-target="#edit">Edit</button></td>
                <td><button type="button" class="btn btn-danger" data-id="{{$row['id_kota']}}" data-title="{{$row['nama_kota']}}" data-toggle="modal" data-target="#delete">Delete</button></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!--end of table -->
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<!-- Modal Add-->
<div id="addData" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add New Kota</h4>
      </div>
      <div class="modal-body">
        <form action="{{url('kota')}}" method="post" style="margin-bottom:10%;">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="nama_kota">Nama Kota</label>
              <input type="text" name="nama_kota" class="form-control" placeholder="Enter Nama Kota">
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
        <h4 class="modal-title">Edit Kota</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('kota.update', 'test')}}" method="post" style="margin-bottom:10%;" id="edit-form">
          {{method_field('patch')}}
          {{ csrf_field() }}
            <input type="hidden" id="id_kota" name="id_kota" class="form-control">
            <div class="form-group">
              <label for="nama_kota">Nama Kota</label>
              <input type="text" id="nama_kota" name="nama_kota" class="form-control" placeholder="Enter Nama Kota">
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
        <h4 class="modal-title">Delete Kota</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('kota.destroy', 'del')}}" method="post" style="margin-bottom:10%;" id="delete-form">
          {{method_field('delete')}}
          {{ csrf_field() }}
            <input type="hidden" id="id_kota" name="id_kota" class="form-control">
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
  var button=$(event.relatedTarget) //Button thtat triggered the modal
  var nama_kota = button.data('title') //Extractinfo from data-atribute
  var id_kota = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id_kota').val(id_kota);
  modal.find('.modal-body #nama_kota').val(nama_kota);
});

//Delete Data
$('#delete').on('show.bs.modal', function(event){
  var button=$(event.relatedTarget) //Button thtat triggered the modal
  var nama_kota = button.data('title') //Extractinfo from data-atribute
  var id_kota = button.data('id')
  var modal = $(this)
  modal.find('.modal-body #id_kota').val(id_kota);
  var endlab = ")?";
  var lab = "Are you sure want to delete this data (Kota : ".concat(nama_kota).concat(endlab);
  document.getElementById("label-del").innerHTML = lab;
});

//Datatables script
 $(document).ready(function(){
    $('#table_kota').DataTable({});

    $('#salah').fadeOut(3500);
    $('#benar').fadeOut(3500);
 });
 </script>
@endsection
