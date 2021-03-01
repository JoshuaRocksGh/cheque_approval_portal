@extends('layouts.master')


@section('styles')

        <!-- Bootstrap CSS -->
        {{--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  --}}


        {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">  --}}
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

        <link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">

        {{-- <link href="{{ asset('assets/josh/style.css') }}" rel="stylesheet"> --}}



@endsection

@section('content')

<!-- Start Content-->
<div class="" >

    <legend></legend>

                <div class="card-box">

                    <div class="container">

                    <div class=" row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">

                                <div>

                                    @if ($errors->any())

                                            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                                @foreach ($errors->all() as $error)
                                                    <span>{{ $error }}</span>
                                                @endforeach
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>

                                    @endif

                            </div>

                                    <div class="row return_details__">

                                        <div class="col-md-12">
                                            <p class="h2">
                                                Upload Monthly Returns File
                                            </p>
                                            <hr>

                                            <p id="">
                                                <h4 > <span> ID: &nbsp; </span>  <span id="return_details_id" class="text-success">{{ $return_id }}</span></h4>
                                                <h4 > <span>Name:  &nbsp; </span>  <span id="return_details_name" class="text-success">{{ $return_name }}</span></h4>
                                                <h4 > <span>Reference:  &nbsp; </span>  <span id="return_details_reference" class="text-success">{{ $return_reference }}</span></h4>
                                                <h4 > <span>EndDate:  &nbsp; </span>  <span id="return_details_endDate" class="text-success">{{ $return_endDate }}</span></h4>
                                                <h4 > <span>Status: &nbsp; </span>  <span id="return_details_status" class="text-success">{{ $return_status }}</span></h4>
                                                <h4 > <span>Return Type Id: &nbsp; </span>  <span id="return_details_status" class="text-success">{{ $returnTypeId }}</span></h4>
                                                <h4 > <span>Revision d: &nbsp; </span>  <span id="return_details_status" class="text-success">{{ $revisionId }}</span></h4>
                                            </p>

                                        </div>

                                    </div>

                                    <div>
                                            <form method="POST" action="{{ url('post-upload') }}" enctype="multipart/form-data"  autocomplete="off">
                                                    @csrf

                                                <div class="modal-content">




                                                        <p>

                                                            <div class="form-group">
                                                                <label>Clear Previous Data *:</label>

                                                                <div class="radio">
                                                                    <input type="radio" name="clearData" id="genderM" value="true" required="" data-parsley-multiple="clear_previous" checked>
                                                                    <label for="genderM">
                                                                        YES
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <input type="radio" name="clearData" id="genderF" value="false" data-parsley-multiple="clear_previous" >
                                                                    <label for="genderF">
                                                                        NO
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="hidden" name="returnTypeId" class="form-control" value="{{ $returnTypeId }}">
                                                                <input type="hidden" name="revisionId" class="form-control" value="{{ $revisionId }}">
                                                                <input type="hidden" name="return_id" class="form-control" value="{{ $return_id }}">
                                                                <input type="hidden" name="return_name" class="form-control" value="{{ $return_name }}">
                                                                <input type="hidden" name="return_reference" class="form-control" value="{{ $return_reference }}">
                                                                <input type="hidden" name="return_endDate" class="form-control" value="{{ $return_endDate }}">
                                                                <input type="hidden" name="return_status" class="form-control" value="{{ $return_status }}">
                                                                {{-- <input type="hidden" name="returnTypeId" class="form-control" value="{{ $returnTypeId }}">
                                                                <input type="hidden" name="revisionId" class="form-control" value="{{ $revisionId }}"> --}}
                                                            </div>
                                                            {{--  <div class="form-group">
                                                                <label for="" class="h5">Narration</label>
                                                                <input type="text" class="form-control">
                                                            </div>  --}}

                                                            <div class="form-group">
                                                                <label for="">Return document</label> <br>
                                                                <input type="file" name="file" required>
                                                            </div>
                                                            <br>


                                                        </p>


                                                    <div class="modal-footer">

                                                        <button type="submit" id="btn-submit-return" class="btn btn-success" >Submit Return</button>

                                                        <button type="button" class="btn btn-danger" onclick="window.location = 'returns' ">Cancel</button>
                                                    </div>
                                                </div>
                                            </form>

                                    </div>




                        </div>

                        <div class="col-md-2"></div>



                    </div>



                </div>
    <!-- end row-->

    </div>




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

        <script>
            $(document).ready(function () {


                $('#btn-submit-return').click(function(){
                    Swal.showLoading()
                })
            });
        </script>


@endsection
