@extends('layouts.app')

@section('content')
<p class="text-6xl m-4 text-white">Update Post</p>


    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="title">Title: </label>
                <input value="{{$post->title}}" class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="title" name="title">
            </div>

            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="createdby">Type</label>
                <select id="type" name="type">
                    @if ($post->type == "personal")
                        <option value="personal" selected>Personal</option>
                        <option value="random">Random</option>
                    @else
                        <option value="personal">Personal</option>
                        <option value="random" selected>Random</option>
                    @endif
                </select>
            </div>

            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="body">Content: </label>
                <textarea class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0 editor1" id="editor1" name="body"> {{$post->body}} </textarea>
            </div>

            <input class="text-white" type="file" id="cover_image" name="cover_image">

            <button class="bg-indigo-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Update</button>
        </form>

        

    </div>


@endsection
