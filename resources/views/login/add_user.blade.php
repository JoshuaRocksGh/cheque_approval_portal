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


                             <div class="col-lg-6 offset-3">

                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Add User</h4>
                                    
                                     @if (Session::has('success'))
                                           <div class="alert alert-success">
                                               <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                               <p>{{ Session::get('success') }}</p>
                                           </div>
                                       @endif

                                    <form action="{{url('post_user')}}" method="POST" class="parsley-examples">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="userName">Full Name<span class="text-danger">*</span></label>
                                            <input type="text" name="name" parsley-trigger="change" required
                                                   placeholder="Enter full name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="emailAddress">Email address<span class="text-danger">*</span></label>
                                            <input type="email" name="email" parsley-trigger="change" required
                                                   placeholder="Enter email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                          <h4 class="header-title">is Admin?</h4>
                                          
                                          <select class="custom-select" name="user_role">
                                              <option selected>SELECT</option>
                                              <option value="Y">YES</option>
                                              <option value="N">NO</option>
                                          </select>
                                          </div>
                                        <div class="form-group">
                                            <label for="pass1">Password<span class="text-danger">*</span></label>
                                            <input id="pass1" type="password" name="password" placeholder="Password" required
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Confirm Password <span class="text-danger">*</span></label>
                                            <input data-parsley-equalto="#pass1" type="password" required
                                                   placeholder="Password" class="form-control" name="password_confirmation">
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox checkbox-purple">
                                                <input id="checkbox6a" type="checkbox">
                                                <label for="checkbox6a">
                                                    Remember me
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </button>
                                        </div>

                                    </form>
                                </div> <!-- end card-box -->
                            </div>
                            <!-- end col -->













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




                $('.btn-btn-btn').click(function(){
                    Swal.showLoading()
                })

            });
        </script>



@endsection