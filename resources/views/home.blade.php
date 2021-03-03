@extends('layouts.master')


@section('styles')
<style type="text/css">
  thead{
    background: #026cb2;
    color: white;
  }
</style>
@endsection


@section('content')

<!-- Start Content-->
<div class="container-fluid">
    @if (Session::has('success'))
       <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           <p>{{ Session::get('success') }}</p>
       </div>
   @endif

     @if ($errors->any())
                    <br>
                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>

                    @endif

    <br>
    {{--  <div class="row">

            <div class="col-md-12 col-xl-12">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-12">
                           <span class="h3">
                           <span class="custom-color">
                                Monthly Returns Statistics
                           </span>
                           </span>
                        </div>

                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->



    </div>  --}}
    <!-- end row-->

    <div class="row">
        <div class="col-md-6">

            <div class="col-md-12 card-box" >
                <canvas id="myChart" width="250" height="250"></canvas>
            </div>

        </div>

        <div class="col-md-5">


            <div class="col-md-12">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-soft-primary border" style="background-color: #3b9705">
                                <i class="fe-activity font-22 avatar-title"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="text-dark mt-1">{{ $pending_returns_count }}</h3>
                               <a href="{{ url('pending-uploaded-returns') }}">
                                   <h4 class="text-muted mb-1 custom-color">Pending</h4>
                                </a>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

            <div class="col-md-12">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-soft-primary border" style="background-color: #0537da;">
                                <i class="fe-bar-chart-2 font-22 avatar-title"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="text-dark mt-1"> {{ $approved_returns_count }}</h3>
                                <a href="{{ url('approve-cheque-list') }}">
                                    <h4 class="text-muted mb-1 custom-color">Approved</h4>
                                 </a>
                                {{--  <h4 class="text-muted mb-1 custom-color">Approved</h4>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->

             <div class="col-md-12">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-soft-primary border" style="background-color: #da055e;">
                                <i class="fe-aperture font-22 avatar-title"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="text-dark mt-1">{{ $rejected_returns_count }}</h3>
                                <a href="{{ url('reject-cheque-list') }}">
                                    <h4 class="text-muted mb-1 custom-color">Rejected</h4>
                                 </a>
                                {{--  <h4 class="text-muted mb-1 custom-color">Rejected</h4>  --}}
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->


            <div class="col-md-12">
                <div class="widget-rounded-circle card-box">
                    <div class="row">
                        <div class="col-4">
                            <div class="avatar-lg rounded-circle bg-soft-primary border" style="background-color: #da055e;">
                                <i class="fe-power font-22 avatar-title"></i>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="text-right">
                                <h3 class="text-dark mt-1">{{ date('d-F-Y') }}</h3>
                                <h4 class="text-muted mb-1 custom-color">Last Login</h4>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end widget-rounded-circle-->
            </div> <!-- end col-->


    </div>



        </div>


</div>


@endsection

@section('scripts')

<script src="{{asset('assets/js/chartjs/Chart.js')}}"></script>

 <script src="{{asset('assets/libs/morris-js/morris.min.js')}}"></script>
 <script src="{{asset('assets/libs/raphael/raphael.min.js')}}"></script>
 <script src="{{asset('assets/js/pages/dashboard-1.init.js')}}"></script>
 <script type="text/javascript">
   function getRandomColor() {
      var letters = '0123456789ABCDEF';
      var color = '#';
      for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
      }
      return color;
    }


    $( document ).ready(function() {
       $("#avatar").css("background-color", getRandomColor());
    });
 </script>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['PENDING', 'APPROVED', 'REJECTED'],
            datasets: [{
                label: 'Statistics',
                data: [ @json($pending_returns_count), @json($approved_returns_count), @json($rejected_returns_count)],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>

@endsection
