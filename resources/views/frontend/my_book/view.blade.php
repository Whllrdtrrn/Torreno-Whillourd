@extends('frontend._layouts.main')
@section('page-styles')
<style>
    .section__view{
        margin-top: 65px;
    }
    .view__img{
        margin-top: 40px;
    }
    .view__img img{
        height: 400px;
        max-width: 500px;
        width: 100%;
        width: auto;
        object-fit: cover
    }
   
    .title__view{
        font-size: 30px;
    }
    .author__view{
        font-size: 20px;
    }
    .view__card{
        display: flex;
        align-items: center;

    }
    .text__view{
        margin-top: 90px;
    }
    .view__main{
        margin-left: 30px;
    }
    .view__paragraph{
        text-align: justify;
        font-size: 20px;
    }   
    .capitalize{
        text-transform: capitalize;
    }
</style>
@stop
@section('content')
<div class="section__view">
    <div class="container">
        <div class="view__card">
            <div class="view__img">
                <img src="{{asset('uploads/images/book/'.$book->image_filename)}}" alt="">
            </div>
            <div class="view__main">
                <div class="text__view ">
                    <h1 class="title__view oswald-font-700"><span class="oswald-font-500 capitalize">{{ $book->title }}</span> </h1>
                    <h4 class="author__view oswald-font-600"><span class="oswald-font-500 capitalize">{{ $book->author }}</span>  </h4>
                </div>
                <p class="view__paragraph oswald-font-300 mt-5">
                    {{ $book->description }}
                </p>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-scripts')
@stop