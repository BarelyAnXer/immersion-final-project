@extends('layouts.app')

@section('content')

<p class="text-6xl m-4 text-white">Create Post</p>

    <div style="width: 900px;" class="container max-w-full mx-auto pt-4">
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="title">Title: </label>
                <input class="h-10 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="title" name="title">
            </div>

            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="createdby">Type</label>
                <select id="type" name="type">
                    <option value="random">Random</option>
                    <option value="personal">Personal</option>
                </select>
            </div>
            
            
            <div class="mb-4">
                <label class="font-bold text-xl text-white" for="body">Content: </label>
                <textarea class="h-16 bg-white border border-gray-300 rounded py-4 px-3 mr-4 w-full text-gray-600 text-sm focus:outline-none focus:border-gray-400 focus:ring-0" id="editor1" name="body"></textarea>
            </div>

            <input class="text-white" type="file" id="cover_image" name="cover_image">

            <button class="bg-indigo-500 tracking-wide text-white px-6 py-2 inline-block mb-6 shadow-lg rounded hover:shadow">Create</button>

        </form>
    </div>

@endsection
