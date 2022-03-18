@extends('layouts.app')

@section('content')

<p class="text-6xl pt-5 pl-5 bg-gray-900 text-white text-center">Posts</p>



@if (count($posts) > 0)
@foreach ($posts as $post)

@if ($post->type == "random")

    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
                <img class="object-cover object-center rounded" alt="hero" src="/storage/cover_images/{{$post->cover_image}}">
            </div>
            <div
                class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">
                    <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                    <br class="hidden lg:inline-block"><p class="text-sm">Created on {{$post->created_at->toDayDateTimeString()}}</p> 
                </h1>
                <p class="mb-8 leading-relaxed text-lg">{!!$post->body!!}</p>
                
            </div>
        </div>
    </section>
@endif
@endforeach

@else
{{-- <p class="text-center text-white mt-28 text-6xl">No posts found</p> --}}
@endif



@endsection
