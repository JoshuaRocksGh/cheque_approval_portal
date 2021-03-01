

@extends('layouts.master')
@section('styles')
<!-- Bootstrap CSS -->
{{--  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
   integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
--}}
{{--  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
--}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
<link href="{{ asset('assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
{{-- 
<link href="{{ asset('assets/josh/style.css') }}" rel="stylesheet">
--}}
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
<div class="row">
   <div class="col-md-12 card-box">
      <h3 class="text-success">All Users</h3>
      <hr>
      @if (Session::has('success'))
      <div class="alert alert-success">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
         <p>{{ Session::get('success') }}</p>
      </div>
      @endif
      <table class="table table-bordered data-table" style="zoom: 0.8;" id="datatable-styling">
         <thead class=" ">
            <tr class="text-center">
               <th scope="col">ID.</th>
               <th scope="col">Name</th>
               <th scope="col">E-Mail</th>
               @if(Auth::user()->user_role == 'Y')
               <th scope="col">---Action---</th>
               @endif
            </tr>
         </thead>
         <tbody>
            @foreach ($users as $user)
            <tr >
               <th scope="col" class="text-center">{{$user->id}}</th>
               <th scope="col" class="text-center text-truncate " style="max-width: 150px;">{{$user->name}}</th>
               {{-- 
               <th scope="col" class="text-center">{{ $return->clear_data }}</th>
               --}}
               <td scope="col" class="text-center">{{$user->email}}</td>
               <input type="hidden" value="{{ $user->user_role }}" name="user_role_{{ $user->id }}" id="user_role_{{ $user->id }}">

               @if(Auth::user()->user_role == 'Y')
               <td scope="col" class="text-center">
                  <a href="#" class="btn btn-sm btn-success btn-rounded" id="edit_user">
                  <i class="mdi mdi-check"></i>
                  </a>
                  {{-- &nbsp; --}}
                  <a href="#" class="btn btn-sm btn-danger btn-rounded" id="delete_btn">
                  <i class="mdi mdi-close"></i>
                  </a>
               </td>
               @endif


            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
<div class="button-list">


   <!-- Signup modal content -->
   <div id="editUserModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-body">
               <div class="text-center mt-2 mb-4">
                  <a href="index.html" class="text-success">
                  <span>aaaaaaa<img src="../assets/images/logo-dark.png" alt="" height="24"></span>
                  </a>
               </div>


               <form method="POST" class="px-3" action="" id="editForm_id">
                  {{ csrf_field() }}
                  <div class="form-group">
                     <label for="username">Name</label>
                     <input class="form-control" name="name" type="text" id="name">
                  </div>
                  <div class="form-group">
                     <label for="emailaddress">User Name</label>
                     <input class="form-control" name="email" type="text" id="email" required="">
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input class="form-control" type="password" name="password" id="password" >
                  </div>

                  <div class="form-group">
                     <label for="password">Password Confirm</label>
                     <input class="form-control" type="password" id="password" >
                  </div>

                  <div class="form-group">
                  <h4 class="header-title">is Admin?</h4>
                  
                  <select class="custom-select" name="user_role">
                      <option selected>SELECT</option>
                      <option value="Y">YES</option>
                      <option value="N">NO</option>
                  </select>
                  </div>


                  <div class="form-group text-center">
                     <button class="btn btn-primary" type="submit">Submit</button>
                  </div>
               </form>


            </div>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->

    <!-- Danger Alert Modal -->
    <div id="deleteUser_info" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content modal-filled bg-danger">
                <div class="modal-body p-4">
                  <form method="POST" action="" id="deleteForm_id"> 
                  {{ csrf_field() }} 
                    <div class="text-center">
                        <i class="dripicons-wrong h1 text-white"></i>
                        <h4 class="mt-2 text-white">Oh snap!</h4>
                        <p class="mt-3 text-white">Delete user?</p>
                        <button type="submit" id="delRec" class="btn btn-light my-2">Continue</button>
                    </div>
                 </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



</div>
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
   integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
   integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
{{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
   integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  --}}
<!-- CHART init js -->
<script src="{{  asset('assets/js/chartjs/Chart.min.js') }}"></script>
<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>
<!-- Modal-Effect -->
<script src="{{ asset('assets/libs/custombox/custombox.min.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{{asset('resources/views/login/user_info.js')}}"></script>
@endsection

