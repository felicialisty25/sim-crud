@extends('master')

@section('content')

<div class="work-progres">
  <div class="chit-chat-layer1">
  	<div class="col-md-12 chit-chat-layer1-left">
      <div class="chit-chat-heading">
        <u><h2>DASHBOARD</h2></u>
      </div>
      <br>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center">
          <u><h3 class="title-hero">DATA SIM</h3></u>
          <canvas id="myChart"></canvas>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 text-center">
          <u><h3 class="title-hero">DATA SIM PER KOTA</h3></u>
          <canvas id="myChart2"></canvas>
        </div>
      </div>

    </div>
    <div class="clearfix"> </div>
  </div>
</div>

<script>
//Datatables script

 $(document).ready(function(){
    var ctx_sum_satisfaction = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx_sum_satisfaction, {
        type: 'bar',
        data: {
            labels: ["SIM A", "SIM B I", "SIM B II", "SIM C", "SIM D"],
            datasets: [{
                label: "Jumlah Penambahan SIM",
                backgroundColor: 'rgb(0, 0, 153)',
                borderColor: 'rgb(0, 0, 153)',
                data: [
                  @foreach($sim as $s)
                    {{$s}},
                  @endforeach
                ],
            }]
        },

        options: {
          title: {
               display: true,
               text: 'Summary of Data SIM',
               fontSize:20,
               fontStyle:'bold'
          },
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
        }
    });


    var ctx_pemahaman_materi = document.getElementById('myChart2').getContext('2d');
    var chart6 = new Chart(ctx_pemahaman_materi, {
        type: 'bar',
        data: {
            labels: [
              @foreach($kota as $k)
                "{{$k['nama_kota']}}",
              @endforeach
            ],
            datasets: [{
                label: "Kota",
                backgroundColor: 'rgb(0, 153, 76)',
                borderColor: 'rgb(0, 153, 76)',
                data: [
                  @foreach($jmlh_sim_kota as $jml)
                    {{$jml}},
                  @endforeach
                ],
            }]
        },

        options: {
          title: {
               display: true,
               text: 'Summary of Data SIM per Kota',
               fontSize:20,
               fontStyle:'bold'
           },
           scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
            }
        }
    });

    
 });
 </script>
@endsection
