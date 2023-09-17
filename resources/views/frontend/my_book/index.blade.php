@extends('frontend._layouts.main')
@section('content')
<div class="section__01">
    <!-- Background image -->
    <div class="p-5 text-center bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');">
         <div class="bg-overlay"></div>
        <div class="mt-5 text-container">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 oswald-font">My Books</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Background image -->
    <div class="section__02">
        <div class="container">
            <div class="card__container row mt-5">
                @forelse ($books as $index => $item)
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card__header">
                            <img src="{{asset('uploads/images/book/'.$item->book->image_filename)}}" alt="" class="w-100">
                        </div>
                        <div class="card-body text-capitalize">
                            <h5 class="card-title title oswald-font">Title: <span
                                    class="roboto-font">{{ $item->book->title }}</span></h5>
                            <p class="card-text author oswald-font">Author: <span
                                    class="roboto-font">{{ $item->book->author }}</span></p>
                                    <div class="d-flex justify-content-between gap-2">
                                        @if ($item->book->status === 'available')
                                        <a class="btn btn-primary btn-block oswald-font w-100" href="{{route('mybook.view_book', ['book_id' => $item->book_id])}}">Read More</a>
                                        <a class="btn btn-secondary btn-block oswald-font w-100 action-delete" href="#" data-bs-toggle="modal"data-url="{{route('mybook.return_book',[$item->id])}}" data-bs-target="#delete_modal">Return Books</a>
                                        @else
                                        <button class="btn btn-danger btn-block oswald-font w-100" disabled>Not Available</button>
                                        @endif
                                    </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <p class="text-center roboto-font">No books available.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="modal custom-modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md">
       <div class="modal-content">
          <div class="modal-body">
             <div class="form-header ">
                <h3 class="oswald-font-400">Return Books</h3>
                <p class="oswald-font-300">Are you sure want to return it now?</p>
             </div>
             <div class="modal-btn delete-action">
                <div class="row">
                   <div class="col-6">
                      <a href="#" class="w-100 btn btn-primary oswald-font-400 paid-continue-btn" id="btn-confirm-delete">Yes</a>
                   </div>
                   <div class="col-6">
                      <button type="submit" data-bs-dismiss="modal" class="w-100 oswald-font-400 btn btn-secondary paid-cancel-btn">No</button>
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