@extends('layouts.app')

@section('content')

<p class="text-6xl pt-5 pl-5 bg-gray-900 text-white text-center">Random Posts</p>

@if (count($posts) > 0)
    @foreach ($posts as $post)

        @if ($post->type == "random")


            <div class="z-40 absolute h-full w-full hidden justify-center items-center" id="overlay{{$post->id}}">
                <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg font-bold">Confirm Delete?</h4>
                        <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal{{$post->id}}"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="mt-2 text-sm">
                        <p>Are you sure you want to delete this post? this action can't be undone</p>
                    </div>

                    <div class="mt-3 flex justify-end space-x-3">
                        <form method="POST" action="/posts/{{ $post->id }}">
                            @method('DELETE')
                            @csrf
                            <button class="px-3 py-1 bg-red-800 text-gray-200 hover:bg-red-600 rounded">Delete</button>
                        </form>
                    </div>
                </div>
            </div>


            <section class="text-gray-400 bg-gray-900 body-font">
                <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
                    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
                        <img class="object-cover object-center rounded" alt="hero"
                            src="/storage/cover_images/{{$post->cover_image}}"">
                                </div>
                                <div
                                    class=" lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left
                            items-center text-center">
                        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">
                            <a href="/posts/{{$post->id}}">{{$post->title}}</a>
                            <br class="hidden lg:inline-block"><p class="text-sm">Created on {{$post->created_at->toDayDateTimeString()}}</p> 
                        </h1>

                        <p class="mb-8 leading-relaxed">{!!$post->body!!}</p>
                        <div class="flex justify-center pt-3">
                            <button
                                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                <a href="/posts/{{$post->id}}/edit">Edit</a>
                            </button>

                            
                            <button id="delete-btn{{$post->id}}"
                                class="ml-4 inline-flex text-gray-400 bg-gray-800 border-0 py-2 px-6 focus:outline-none hover:bg-gray-700 hover:text-white rounded text-lg">
                                Delete
                            </button>
                            
                        </div>
                    </div>
                </div>
            </section>



            <script>
                window.addEventListener('DOMContentLoaded', () => {
                    const overlay = document.querySelector('#overlay{{$post->id}}')
                    const delBtn = document.querySelector('#delete-btn{{$post->id}}')
                    const closeBtn = document.querySelector('#close-modal{{$post->id}}')

                    const toggleModal = () => {
                        overlay.classList.toggle('hidden')
                        overlay.classList.toggle('flex')
                    }

                    delBtn.addEventListener('click', toggleModal)

                    closeBtn.addEventListener('click', toggleModal)
                })

            </script>
        @endif

    @endforeach

@else
{{-- <p class="text-center text-white mt-28 text-6xl">No posts found</p> --}}
@endif

@endsection
