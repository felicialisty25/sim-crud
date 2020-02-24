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
              <u><h2>Data SIM</h2></u>
            </div>
          </div>
          <div class="col-md-6 text-right">
            <a href="{{route('sim.create')}}"><button type="button" class="btn btn-success">CREATE DATA SIM</button></a>
          </div>
        </div>
      <br>    
      <!--start table-->
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="table_data_sim">
          <thead>
          <tr>
              <th>No SIM</th>
              <th>Nama</th>
              <th>Kategori SIM</th>
              <th>Kota Pembuatan</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            @foreach($data_sim as $sim)
                <tr class="clickable-row">
                    <td>{{$sim->no_sim}}</td>
                    <td>{{$sim->nama}}</td>
                    <td>{{$sim->kategori_sim}}</td>
                    <td>{{$sim->nama_kota}}</td>
                    <td><a href="/sim/{{$sim->id_sim}}"><button type="button" class="btn btn-info">VIEW</button></a></td>
                    <td><a href="/sim/{{$sim->id_sim}}/edit"><button type="button" class="btn btn-warning">EDIT</button></a></td>
                    <td><button type="button" class="btn btn-danger" data-id="{{$sim->id_sim}}" data-nama="{{$sim->nama}}" data-no="{{$sim->no_sim}}" data-toggle="modal" data-target="#delete">Delete</button></td>
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

<!-- Modal Delete -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Delete Data SIM</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('sim.destroy', 'test')}}" method="post" style="margin-bottom:10%;" id="delete-form">
            {{method_field('delete')}}
            {{ csrf_field() }}
            <input type="hidden" id="id_sim" name="id_sim" class="form-control">
            <p id="label-del"></p>
            <div class="form-group">
              <span class="pull-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                <input type="submit" class="btn btn-success" name="submit-btn" value="Yes">
              </span>
            </div>
        </form>
      </div>

    </div>
  </div>
</div>

<script>
//Datatables script

  //Delete Data
  $('#delete').on('show.bs.modal', function(event){
      var button=$(event.relatedTarget)
      var id_sim = button.data('id')
      var nama = button.data('nama')
      var no_sim = button.data('no')
      var modal = $(this)
      modal.find('.modal-body #id_sim').val(id_sim);
      var endlab = ")?";
      var lab = "Are you sure want to delete this data (No SIM : ".concat(no_sim).concat(", Nama : ").concat(nama).concat(endlab);
      document.getElementById("label-del").innerHTML = lab;
  });

  $(document).ready(function(){
    $('#table_data_sim').DataTable({
    });
    $('#salah').fadeOut(3500);
    $('#benar').fadeOut(3500);
  });
 </script>
@endsection
