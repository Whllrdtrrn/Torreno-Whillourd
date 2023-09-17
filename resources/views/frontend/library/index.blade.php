@extends('frontend._layouts.main')
@section('content')
 <!-- Background image -->
  <div class="p-5 text-center bg-image"
         style="background-image: url('/img/bg-wallpaper.jpg');">
         <div class="bg-overlay"></div>
        <div class="mt-5 text-container">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-white">
                    <h1 class="mb-3 oswald-font">LIBRARY</h1>
                    <h4 class="mb-3 roboto-font">Explore a World of Books</h4>
                </div>
            </div>
        </div>
    </div>

<!-- Background image -->
    <div class="section__02">
        <div class="container">
            <div class="card__container row">
                @forelse ($books as $index => $book)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card__header">
                                <img src="{{ asset('uploads/images/book/'.$book->image_filename) }}" alt="" class="w-100">
                            </div>
                            <div class="card-details text-capitalize">
                                <h5 class="title oswald-font">Title: <span class="roboto-font">{{ $book['title'] }}</span></h5>
                                <p class="author oswald-font">Author: <span class="roboto-font">{{ $book['author'] }}</span></p>

                                @php
                                    $borrowed = $MyBook->where('book_id', $book->id)->first();
                                @endphp

                                @if (!$borrowed)
                                    <form action="{{ route('book.borrowBook') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                                        <button type="submit" class="btn btn-primary w-100 oswald-font {{ $book->status === 'not-available' ?  'btn-danger' : 'btn-primary' }}" {{ $book->status === 'not-available' ?  'disabled' : '' }}>{{ $book->status === 'available' ?  'Borrow this book' : 'Not Available' }}</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary w-100 oswald-font {{ $book->status === 'available' ?  'btn-secondary' : 'btn-danger' }}" disabled>{{ $book->status === 'available' ?  'Borrowed' : 'Not Available' }}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No Data</p>
                @endforelse
            </div>
        </div>
    </div>
@stop
