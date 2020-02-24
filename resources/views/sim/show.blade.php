@extends('master')

@section('content')

@if(isset($success))
<div class="alert alert-success" id="benar">
  <p>{{$success}}</p>
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
      <a href="{{ url('sim') }}"><h1><u>ALL DATA SIM</u></h1></a>
            
      <div class="row">
        <div class="col-md-6 text-left">
          <div class="chit-chat-heading">
            <u><h2>Data SIM</h2></u>
          </div>
        </div>
        <div class="col-md-6 text-right">
            <a href="/sim/pdf/{{$data_sim[0]->id_sim}}"><button type="button" class="btn btn-success">EXPORT INTO PDF</button></a>
        </div>
      </div>
      <br>

      <div class="row">
      	<!-- KIRI -->
          <div class="col-md-4">
          	<!-- GAMBAR -->
            <div class="form-group">
              <div class="col-sm-12 col-md-offset-3">
              	<div class="imgwrapper" style="max-width: 180px;">
          			   <img src="/storage/image_foto/{{$data_sim[0]->foto}}" class="img-responsive">
          			</div>
              </div>
            </div>
          </div>

          <!-- KANAN -->
          <div class="col-md-8">
            <!-- NO SIM -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">No SIM</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->no_sim}}
                </div>
            </div>
          	<!-- NAMA -->
            <div class="row">
                <label class="col-md-5 control-label" style="border: 1px solid grey;">Nama</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->nama}}
                </div>
            </div>
            <!-- ALAMAT -->
            <div class="row">
                <label class="col-md-5 control-label" style="border: 1px solid grey;">Alamat</label>
            <div class="col-md-6" style="border: 1px solid grey;">
                <p style="white-space: pre-wrap;">{{$data_sim[0]->alamat}}</p>
            </div>
            </div>
            <!-- TEMPAT Tanggal LAHIR -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Tempat & Tanggal Lahir</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->tempat_lahir}}, {{date('d-m-Y', strtotime($data_sim[0]->tanggal_lahir))}}
                </div>
            </div>
            <!-- PEKERJAAN -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Pekerjan</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->pekerjaan}}
                </div>
            </div>
            <!-- KATEGORI SIM -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Kategori SIM</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->kategori_sim}}
                </div>
            </div>
            <!-- NAMA TEMPAT PEMBUATAN -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Nama Tempat Pembuatan</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->nama_tempat}}
                </div>
            </div>
            <!-- Alamat Tempat Pembuatan -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Alamat Tempat Pembuatan</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    <p style="white-space: pre-wrap;">{{$data_sim[0]->alamat_tempat}}</p>
                </div>
            </div>
            <!-- Nama Kota -->
            <div class="row">
                <label for="" class="col-md-5 control-label" style="border: 1px solid grey;">Kota Tempat Pembuatan</label>
                <div class="col-md-6" style="border: 1px solid grey;">
                    {{$data_sim[0]->nama_kota}}
                </div>
            </div>
        </div>
        <!-- AKHIR KANAN -->
      </div> <!-- PENUTUP ROW -->
      <br>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<script>
  //Datatables script
  $(document).ready(function(){
      $('#salah').fadeOut(3500);
      $('#benar').fadeOut(3500);
  });
</script>
@endsection
