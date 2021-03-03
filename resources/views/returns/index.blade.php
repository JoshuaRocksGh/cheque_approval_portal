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

  {{-- <br> --}}
<legend></legend>
<!-- Start Content-->
    <div class="container-fluid" >

        <div class="card-box">
                    <div class="row">

                                <div class="col-md-3">
                                    <p class="h4">
                                        Returns from BOG ORASS <br>
                                    </p>
                                    <div>

                                    </div>
                                </div>

                                <div class="col-md-5">
                                                <form method="GET" action="{{ url('returns') }}"  autocomplete="off">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="input-group m-t-6">
                                                            <a style="color: #fff;" class="btn btn-secondary btn-rounded waves-effect">{{$john['paging']['totalItemsNumber']}}:RECORDS</a>&nbsp;
                                                            <a style="color: #fff;" class="btn btn-secondary btn-rounded waves-effect">{{$john['paging']['totalPagesNumber']}}:PAGES</a>&nbsp;
                                                            <span class="input-group-append">
                                                                <button type="submit" class="btn waves-effect waves-light btn-secondary "><i class="far fa-file-alt mr-1"></i>Current Page</button>
                                                            </span>
                                                                <input type="text" class="form-control" name="page" placeholder="page number" value="{{ Request::get('page') }}" required>
                                                                <span class="input-group-append">
                                                            <button type="submit" class="btn waves-effect waves-light btn-secondary "><i class="fa fa-search mr-1"></i></button>
                                                            </span>

                                                        </div>


                                                        {{-- <div class="col-md-6">
                                                            <input type="text" name="page" class="form-control " value="" placeholder="page number" required>
                                                        </div>

                                                        <div class="col-md-2">
                                                                    <button class="btn btn-primary  custom-bg-color" type="submit" >Fetch </button>

                                                        </div> --}}

                                                    </div>

                                            </form>
                                </div>


                                <div class="col-md-4">


                                        <form method="GET" action="{{ url('search-returns') }}"  autocomplete="off">
                                                @csrf
                                                <div class="row">
                                                    <div class="input-group m-t-3">
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <input type="text" class="form-control" name="revision_id" placeholder="Revision ID" required>
                                                            <span class="input-group-append">
                                                                <button type="submit" class="btn waves-effect waves-light btn-primary custom-bg-color"><i class="fa fa-search mr-1"></i> Search</button>
                                                            </span>
                                                        </div>


                                                    {{-- <div class="col-md-10">
                                                                <input type="text" name="revision_id" class="form-control " value="" placeholder="Revision ID" required>
                                                    </div>

                                                    <div class="col-md-2">
                                                                <button class="btn btn-primary  custom-bg-color" type="submit" >Search </button>

                                                    </div> --}}

                                                </div>

                                            </form>



                                </div>
                    </div>
                    <br>
                    <div class="row ">


                        <div class="col-md-12 ">




                            <table class="table table-bordered" style="zoom: 0.8" id="datatable-styling" >

                                        <thead class=" ">
                                            <tr class="text-center">
                                                <th scope="col">ID</th>
                                                <th scope="col">Description</th>
                                                <th scope="col">Reference</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">End Date</th>

                                                {{-- <th>Actions</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($john['data'] as $return)
                                                <tr >
                                                    <td scope="col" class="text-center">{{ $return['id'] }}</td>
                                                    <td scope="col" class="" style="width: 450px;" >
                                                        <a href="#" class="view_details"  data-value="{{ json_encode($return) }}" data-toggle="modal"
                                                        data-target="#view_return_modal">
                                                            {{ $return['name'] }}
                                                        </a>




                                                        {{-- END MODAL --}}

                                                    </td>
                                                    <td scope="col" class="text-center">{{ $return['reference'] }}</td>


                                                    <td scope="col" class="text-center">

                                                        @if( $return['status']['name']  == 'No Data')
                                                            <span class="badge badge-info">{{  $return['status']['name']  }}</span>
                                                        @endif

                                                        @if( $return['status']['name']  == 'Valid')
                                                            <span class="badge badge-success">{{  $return['status']['name']  }}</span>
                                                        @endif

                                                        @if( $return['status']['name']  == 'In Progress')
                                                            <span class="badge badge-warning">{{  $return['status']['name']  }}</span>
                                                        @endif


                                                    </td>

                                                    <td scope="col"  class="text-center">{{date_format(date_create(substr(($return['endDate']), 0, 10)),"d-M-Y")}}</td>

                                                    {{-- <td  class="text-center">

                                                        <a href="{{ url('upload-returns?revisionId='.$return['revisions'][0]['id'] . '&returnTypeId='.$return['returnTypes'][0]['id']) }}" class="text-success">
                                                            <i class="fe-upload "  style="cursor: pointer;"></i>  Submit
                                                        </a>

                                                    </td> --}}


                                                </tr>
                                            @endforeach

                                        </tbody>
                            </table>
                        </div>



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
                                            <h4 > <span> ID: &nbsp; </span>  <span id="return_details_id"></span></h4>
                                            <h4 > <span>Name:  &nbsp; </span>  <span id="return_details_name"></span></h4>
                                            <h4 > <span>Reference:  &nbsp; </span>  <span id="return_details_reference"></span></h4>
                                            <h4 > <span>EndDate:  &nbsp; </span>  <span id="return_details_endDate"></span></h4>
                                            <h4 > <span>Status: &nbsp; </span>  <span id="return_details_status"></span></h4>
                                        </p>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-7">

                                                <p id="dd">

                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item list-group-item-action bg-success">
                                                        <h5 class="text-white"> RETURN TYPES</h5>
                                                        </a>
                                                        <p id="returnTypes">

                                                        </p>

                                                    </div>

                                                </p>

                                            </div>

                                            <div class="col-md-5">

                                                <p id="dd">

                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item list-group-item-action bg-success">
                                                        <h5 class="text-white"> REVISIONS</h5>
                                                        </a>
                                                        <p id="revisions">

                                                        </p>

                                                    </div>

                                                </p>

                                            </div>

                                        </div>
                                    </div>


                            </div>



                        </div>
                        <div class="modal-footer">

                            <button type="button" name="" id="" class="btn btn-success" >Submit</button>

                            <button type="button" class="btn btn-secondart" data-dismiss="modal">Close</button>
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

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>


        <script>
            $(document).ready(function () {
                $('#datatable-styling').DataTable({
                    "pageLength": 200
                    });

                $('.btn-btn-btn').click(function (e) {
                    // e.preventDefault();
                    Swal.showLoading();

                    setTimeout(function(){
                        return true;
                    }, 500)


                });
            });
        </script>


        <script>
            $(document).ready(function () {

                $(".view_details").click(function(){

                    var return_details = $(this).data('value');
                    {{-- console.log(return_details) --}}




                    $("#return_details_id").text("")
                    $("#return_details_name").text("")
                    $("#return_details_reference").text("")
                    $("#return_details_endDate").text("")
                    $("#return_details_status").text("")



                    $('#returnTypes').text("")
                    $('#revisions').text("")

                    $("#return_details_id").text(return_details.id)
                    $("#return_details_name").text(return_details.name)
                    $("#return_details_reference").text(return_details.reference)
                    $("#return_details_endDate").text(return_details.endDate)
                    $("#return_details_status").text(return_details.status.name)

                    $.each(return_details.returnTypes, function( index, value ) {
                        $('#returnTypes').append(`
                              <button type="button" class="list-group-item list-group-item-action">
                                  <a href="upload-returns?revisionId=${return_details.revisions[index].id}&returnTypeId=${value.id}">
                                       <h4>${value.name}</h4>
                                    </a>
                                  <span class="h5"> ${value.id} </span>

                                  <br>
                                  <span class="h5">Version: ${value.versionNo}


                                    <a href="upload-returns?revisionId=${return_details.revisions[index].id}&returnTypeId=${value.id}&return_id=${return_details.id}&return_name=${return_details.name}&return_reference=${return_details.reference}&return_endDate=${return_details.endDate}&return_status=${return_details.status.name}" class="btn btn-sm btn-info" style="float:right;">
                                            Upload
                                      </a>


                                  </span>


                                </button>
                        `)
                    });

                     $.each(return_details.revisions, function( index, value ) {
                        $('#revisions').append(`
                              <button type="button" class="list-group-item list-group-item-action">
                                  <h4>ID: ${value.id}</h4>
                                  <span class="h5">DueDate: ${value.dueDate}</span>
                                  <br>
                                  <span class="h5">Action: ${value.lastActionPerformed} <br></span>

                                </button>
                        `)
                    });


                })
            });
        </script>


@endsection
