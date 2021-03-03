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
            background: #98865bcc !Important;
            color: white;
          }
    </style>

@endsection

@section('content')
<br>
<!-- Start Content-->
<div class="container-fluid" >


                <div class="row">

                    <div class="col-md-12 card-box">

                        <h3 class=" " style="color: #99865BCC">Pending Cheque Approvals</h3>
                        <hr>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <p>{{ Session::get('success') }}</p>
                            </div>
                        @endif
                            <table class="table table-bordered" style="zoom: 0.8;" id="datatable-styling">

                                    <thead class=" ">
                                        <tr class="text-center">
                                            <th scope="col">NO.</th>
                                            <th scope="col">CHEQUE NUMBER</th>
                                            <th scope="col">DETAILS</th>
                                            {{-- <th scope="col">Reference</th> --}}

                                            {{-- <th scope="col">Clear Data</th> --}}
                                            {{--  <th scope="col">Filename</th>  --}}
                                            <th scope="col">DATE</th>
                                            <th scope="col">ACTION</th>

                                            {{--  @if(Auth::user()->user_role == 'Y')
                                                <th scope="col">---Action---</th>
                                            @endif  --}}


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

                                            <th scope="col" class="text-center">
                                                <a href="#" class="view_details"  data-value="{{ json_encode($return) }}" data-toggle="modal"
                                                data-target="#view_return_modal">
                                                View
                                            </a>
                                            </th>


                                            <td scope="col" class="text-center">{{date_format(date_create(substr(($return->posting), 0, 10)),"d-M-Y")}}</td>


                                                    <td scope="col" class="text-center">
                                                        <a href="{{ url('approve-cheque', ['cheque_id' => $return->id  ]) }}" class="btn btn-sm btn-success btn-rounded btn-approve-return" id="">
                                                            <i class="mdi mdi-check"></i>
                                                        </a>


                                                        <a href="{{ url('reject-cheque', ['cheque_id' => $return->id ]) }}" class="btn btn-sm btn-danger btn-rounded btn-decline-return" id="">
                                                            <i class="mdi mdi-close"></i>
                                                        </a>


                                                    </td>





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

                                {{--  <p id="">
                                    <h3 > <span> ID: &nbsp; </span>  <span id="return_details_id" class="text-success"></span></h4>
                                    <h3 > <span>Name:  &nbsp; </span>  <span id="return_details_name" class="text-success"></span></h4>
                                    <h3 > <span>Reference:  &nbsp; </span>  <span id="return_details_reference" class="text-success"></span></h4>
                                    <h3 > <span>EndDate:  &nbsp; </span>  <span id="return_details_endDate" class="text-success"></span></h4>

                                    <h3 > <span>Revision ID: &nbsp; </span>  <span id="return_details_revision_id" class="text-success"></span></h4>
                                    <h3 > <span>Return Type ID: &nbsp; </span>  <span id="return_details_return_type_id" class="text-success"></span></h4>
                                </p>  --}}

                                <h4>Front View</h4>
                                <hr>
                                <img id="img_" src='#' />
                                <br>

                                <h4>Back View</h4>
                                <hr>
                                <img id="img__" src='#' />

                            </div>

                            <div class="col-md-12">


                                    <a id="approve_cheque_link" href="#" class="btn btn-success approved">Approve</a>
                                    <a id="reject_cheque_link" href="#" class="btn btn-danger rejected">Reject</a>


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

        {{-- Sweet Alert js --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


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

                    $("#img_").attr("src", "data:image/png;base64," + return_details.front_view);
                    $("#img__").attr("src", "data:image/png;base64," + return_details.back_view);

                    $("#reject_cheque_link").attr("href", "reject-cheque/"+return_details.id);
                    $("#approve_cheque_link").attr("href", "approve-cheque/"+return_details.id);

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




                $('.btn-btn-btn').click(function(){
                    Swal.showLoading()
                })

            });
        </script>



@endsection
