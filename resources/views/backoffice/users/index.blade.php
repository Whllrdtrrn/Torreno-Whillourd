@extends('backoffice._layouts.main')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="content-page-header ">
            <h5>Users Maintenance</h5>
         </div>
      </div>

      <div class="row">
         <div class="col-sm-12">
            <div class=" card-table">
               <div class="card-body">
                  <div class="table-responsive">
                     <table class="table table-center table-hover datatable">
                        <thead class="thead-light">
                           <tr>
                              <th>#</th>
                              <th>Name</th>
                              <th>Email</th>
                              <!-- <th>Status</th> -->
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $index => $item)
                           <tr>
                              <td>{{$index + 1}}</td> 
                              <td>{{$item->name}}</td>
                              <td>{{$item->email}}</td>
                              <td>
                                 <div class="form-check form-switch">
                                    <input class="form-check-input user-status-toggle" name="status" type="checkbox" role="switch" data-id="{{ $item->id }}" id="flexSwitchCheckChecked" {{ $item->status === 'active' ? 'checked' : '' }}>
                                 </div>
                              </td>
                           </tr>
                           @empty
                           <td colspan="8" class="text-left"><div class="d-flex"><i>No record found yet. </i> <a href="{{route('backoffice.users.create')}}"><strong class="pl-2 pr-2">Click here</strong></a> to create one.</div></td>
                           @endforelse
                           
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop


@section('page-scripts')
<script>
   $(document).ready(function() {
       $('.user-status-toggle').on('change', function() {
           var id = $(this).data('id');
           var status = this.checked ? 'active' : 'inactive';
           
           var confirmation = confirm('Are you sure you want to update the status?');
            if (confirmation) {
               $.ajaxSetup({
                  headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
               });

               $.ajax({
                     type: 'POST',
                     url: '/admin/users/update-user-status',
                     data: {
                        id:id,
                        status: status
                     },
                     success: function(response) {
                        console.log(response);
                     },
                     error: function(error) {
                        console.error(error);
                     }
               });
            } else {
                this.checked = !this.checked;
            }
       });
   });
</script>
@stop
@section('page-styles')
<style>
 .form-check-input:checked {
    background-color: green;
    border-color: green;
}
</style>
@stop