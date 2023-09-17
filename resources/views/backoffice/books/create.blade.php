@extends('backoffice._layouts.main')
@section('content')
<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="content-page-header">
            <h5>Add Book</h5>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="card-body">
               <form action="" method="POST" enctype="multipart/form-data">
                  {!!csrf_field()!!}
                  <div class="form-group-item">
                     <h5 class="form-title">Basic Details</h5>
                     <div class="row">
                        <div class="form-group-item">
                            <div class="row">
                              
                               <div class=" col-12">
                                  <div class="form-group {{$errors->first('file') ? 'has-error' : NULL}}">
                                     <label>Image</label>
                                     <div class="form-group service-upload mb-0">
                                        <span><img src="{{asset('backoffice/img/icons/drop-icon.svg')}}" alt="upload"></span>
                                        <h6 class="drop-browse align-center">
                                           Drop your files here or<span class="text-primary ms-1">browse</span
                                              >
                                        </h6>
                                        <p class="text-muted">Maximum size: 50MB</p>
                                        <input type="file" name="file" id="image_sign">
                                        <div id="frames"></div>
                                     </div>
                                     @if($errors->first('file'))
                                     <span class="help-block">{{$errors->first('file')}}</span>
                                     @endif
                                  </div>
                               </div>
                            </div>
                         </div>
                        <div class="col-sm-12">
                           <div class="form-group {{$errors->first('title') ? 'has-error' : NULL}}">
                              <label>Title <span class="text-danger"> *</span></label>
                              <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title Name">
                              @if($errors->first('title'))
                              <span class="help-block">{{$errors->first('title')}}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="form-group {{$errors->first('author') ? 'has-error' : NULL}}">
                              <label>Author <span class="text-danger"> *</span></label>
                              <input type="text" name="author" value="{{ old('author') }}"  class="form-control" placeholder="Enter author Name">
                              @if($errors->first('author'))
                              <span class="help-block">{{$errors->first('author')}}</span>
                              @endif
                           </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group {{$errors->first('description') ? 'has-error' : NULL}}">
                               <label>Description <span class="text-danger"> *</span></label>
                               <textarea type="text" name="description"  class="form-control" placeholder="Enter description Name">{{ old('description') }}</textarea>
                               @if($errors->first('description'))
                               <span class="help-block">{{$errors->first('description')}}</span>
                               @endif
                            </div>
                         </div>
                      
                     </div>
                  </div>
                  <a type="reset" href="{{ route('backoffice.books.index') }}" class="btn btn-primary cancel me-2">
                  Cancel
                  </a>
                  <button type="submit" class="btn btn-primary">
                  Add Book
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@stop