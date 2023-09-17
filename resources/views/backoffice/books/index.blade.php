@extends('backoffice._layouts.main')

@section('content')

<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="content-page-header ">
            <h5>Library</h5>
            <div class="list-btn">
               <ul class="filter-list">
                  <li>
                     <a class="btn btn-primary" href="{{ route('backoffice.books.create') }}">
                     <i class="fa fa-plus-circle me-2" aria-hidden="true"></i>Add Books </a>
                  </li>
               </ul>
            </div>
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
                              <th>Image</th>
                              <th>Title</th>
                              <th>Author</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        @forelse($books as $index => $item)
                           <tr>
                              <td>{{$index + 1}}</td> 
                              <td><img src="{{ asset('uploads/images/book/'.$item->image_filename) }}" alt="Book Image" width="100" height="100"></td>
                              <td>{{$item->title}}</td>
                              <td>{{$item->author}}</td>
                              <td>{{$item->status === 'available' ? 'Available' : 'Not Available'}}</td>
                              <td class="d-flex align-items-center">
                                 <div class="dropdown dropdown-action">
                                    <a href="#" class=" btn-action-icon " data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                       <ul>
                                          <li>
                                             <a class="dropdown-item" href="{{route('backoffice.books.edit',[$item->id])}}">
                                             <i class="far fa-edit me-2"></i>Edit </a>
                                          </li>
                                          <li>
                                             <a class="dropdown-item action-delete" href="#" data-bs-toggle="modal" data-url="{{route('backoffice.books.destroy',[$item->id])}}" data-bs-target="#delete_modal">
                                             <i class="far fa-trash-alt me-2"></i>Delete </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @empty
                           <td colspan="8" class="text-left"><div class="d-flex"><i>No record found yet. </i> <a href="{{route('backoffice.books.create')}}"><strong class="pl-2 pr-2">Click here</strong></a> to create one.</div></td>
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


<div class="modal custom-modal fade" id="delete_modal" role="dialog">
   <div class="modal-dialog modal-dialog-centered modal-md">
      <div class="modal-content">
         <div class="modal-body">
            <div class="form-header">
               <h3>Delete Item</h3>
               <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-btn delete-action">
               <div class="row">
                  <div class="col-6">
                     <a href="#" class="w-100 btn btn-primary paid-continue-btn" id="btn-confirm-delete">Delete</a>
                  </div>
                  <div class="col-6">
                     <button type="submit" data-bs-dismiss="modal" class="w-100 btn btn-primary paid-cancel-btn">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop


@section('page-scripts')
<script type="text/javascript">
  $(function(){
    $(".action-delete").on("click",function(){
      var btn = $(this);
      $("#btn-confirm-delete").attr({"href" : btn.data('url')});
    });

    $('#btn-confirm-delete').on('click', function() {
      $('.btn-link').hide();
          $('.btn-loading').button('loading');
          $('#target').submit();
     });

  });
</script>
@stop
@section('page-styles')
<style>
    table tbody tr td{
        height: 70px;
        
    }
</style>
@stop