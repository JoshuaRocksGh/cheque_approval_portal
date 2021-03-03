@extends('layouts.master')


@section('styles')

        <!-- Bootstrap CSS -->
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}


        {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">  --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

        <link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        {{-- <link href="{{ asset('assets/josh/style.css') }}" rel="stylesheet"> --}}

    <style>
        thead {
            background: #02b239 !Important;
            color: white;
          }
    </style>

@endsection

@section('content')
<br>
<!-- Start Content-->
<div class="container-fluid" >
    @if (Session::has('success'))
       <div class="alert alert-success">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
           <p>{{ Session::get('success') }}</p>
       </div>
   @endif
    {{--  <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <form class="form-inline">
                        <div class="form-group">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control border-white" id="dash-daterange">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-blue border-blue text-white">
                                        <i class="mdi mdi-calendar-range font-13"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->  --}}


                <div class="row">

                    <div class="col-md-12 card-box">

                        <h3 class=" " style="color: #98865bcc">Approved Cheques</h3>
                        <hr>
                            <table class="table table-bordered" style="zoom: 0.8;" id="datatable-styling">

                                    <thead class=" ">
                                        <tr class="text-center">
                                            <th scope="col">NO.</th>
                                            <th scope="col">CHEQUE NUMBER</th>
                                            <th scope="col">DETAILS</th>
                                            {{-- <th scope="col">Reference</th> --}}
                                            <th scope="col">End Date</th>
                                            {{-- <th scope="col">Clear Data</th> --}}
                                            {{--  <th scope="col">Filename</th>  --}}
                                            {{--  <th scope="col">Posted Date</th>  --}}




                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $count = 1;
                                        @endphp


                                        @foreach ($uploaded_returns as $return)
                                            <tr >
                                             <td scope="col" class="text-center">{{ $count }} </td>
                                            <th scope="col" class="text-center">
                                                <a href="#" class="view_details"  data-value="{{ json_encode($return) }}" data-toggle="modal"
                                                    data-target="#view_return_modal">
                                                    {{ $return->cheque_no }}
                                                </a>

                                            </th>
                                            {{-- <th scope="col" class="text-center">{{ $return->return_reference }}</th> --}}
                                            <th scope="col" class="text-center">{{ $return->cheque_no }}</th>
                                            <th scope="col" class="text-center text-truncate " style="max-width: 150px;">{{ $return->return_type_id }}</th>
                                            {{-- <th scope="col" class="text-center">{{ $return->clear_data }}</th> --}}

                                            {{--  <td scope="col" class="text-center">
                                                <a href="{{ url('download-return', ['filename' => $return->filename ]) }}">
                                                    {{ $return->filename }}
                                                </a>

                                            </td>  --}}

                                            <td scope="col" class="text-center">{{date_format(date_create(substr(($return->created_at), 0, 10)),"d-M-Y")}}</td>





                                            </tr>

                                                @php
                                                    $count++;
                                                @endphp
                                        @endforeach



                                    </tbody>

                        </table>
                    </div>



                </div>
    <!-- end row-->




<!-- Modal for REQUEST -->
<div class="modal fade" id="view_return_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="zoom: 0.85;">
        <form action="">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title custom-color text-center" id="exampleModalLongTitle">CHEQUE INFORMATIONS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row return_details__">

                            <div class="col-md-12">

                                <p id="">
                                    <h3 > <span> ID: &nbsp; </span>  <span id="return_details_id" class="text-success"></span></h4>
                                    <h3 > <span>Name:  &nbsp; </span>  <span id="return_details_name" class="text-success"></span></h4>
                                    <h3 > <span>Reference:  &nbsp; </span>  <span id="return_details_reference" class="text-success"></span></h4>
                                    <h3 > <span>EndDate:  &nbsp; </span>  <span id="return_details_endDate" class="text-success"></span></h4>
                                    {{-- <h3 > <span>Status: &nbsp; </span>  <span id="return_details_status" class="text-success"></span></h4> --}}
                                    <h3 > <span>Revision ID: &nbsp; </span>  <span id="return_details_revision_id" class="text-success"></span></h4>
                                    <h3 > <span>Return Type ID: &nbsp; </span>  <span id="return_details_return_type_id" class="text-success"></span></h4>
                                </p>

                            </div>



                    </div>



                </div>

            </div>
        </form>
    </div>
</div>
<!-- Modal for REQUEST -->




</div>

@endsection

@section('scripts')

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        {{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>  --}}
        <!-- CHART init js -->
        <script src="{{  asset('assets/js/chartjs/Chart.min.js') }}"></script>

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- Modal-Effect -->
        <script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>


        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#datatable-styling').DataTable({
                    "pageLength": 200
                    });

                $(".view_details").click(function(){

                    var return_details = $(this).data('value');
                    console.log(return_details)

                    {{-- return false; --}}




                    $("#return_details_id").text("")
                    $("#return_details_name").text("")
                    $("#return_details_reference").text("")
                    $("#return_details_endDate").text("")
                    {{-- $("#return_details_status").text("") --}}
                    $("#return_details_return_type_id").text("")
                    $("#return_details_revision_id").text("")



                    $('#returnTypes').text("")
                    $('#revisions').text("")

                    $("#return_details_id").text(return_details.id)
                    $("#return_details_name").text(return_details.return_name)
                    $("#return_details_reference").text(return_details.return_reference)
                    $("#return_details_endDate").text(return_details.return_endDate)
                    {{-- $("#return_details_status").text(return_details.status) --}}
                    $("#return_details_return_type_id").text(return_details.return_type_id)
                    $("#return_details_revision_id").text(return_details.revision_id)


                })




                $('#btn-btn-btn').click(function(){
                    Swal.showLoading()
                })

            });
        </script>



@endsection
