@extends('layouts.app')
@section('content')
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 border-b border-gray-200">
                <h1 class="text-6xl">
                    Blog Posts
                </h1>
            </div>
        </div>
<!-- Component Code -->
@if (session()->has('message'))
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
            {{ session()->get('message') }}
        </p>
    </div>
@endif
@if (Auth::check())
<div class="pt-15 w-4/5 m-auto">
        <a href="{{ route('blog.create') }}" class="bg-blue-500 uppercase bg-transperent text-gray-100 text-xs font-extrabold py-3 px-5 roundend-3xl">
        Create post
    </a>
</div>
@endif
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
        @foreach ($posts as $post)
      <div class="rounded overflow-hidden shadow-lg">
    <a href="/blog/{{ $post->slug }}"><div class="relative">
      <img class="h-48 w-full" src="{{asset('/images')}}/{{$post->image_path}}">
  <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
      <a href="!#"><div class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
        <span class="font-bold">{{date('jS M', strtotime($post->updated_at))}}</span>
        </div></a>
      </div></a>
    <div class="px-6 py-4">
      <a href="#" class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">{{ $post->title }}</a>
      <p class="text-gray-500 text-sm">
        {{ $post->description }}
      </p>
    </div>
    <div class="px-6 py-4 flex flex-row items-center">
      <span href="/blog/{{ $post->slug }}" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row justify-between items-center">
        <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
       viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
  <g>
      <g>
          <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
              c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
              c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"/>
      </g>
  </g>
  </svg>
        <span class="float-right ml-1">Author: {{ $post->user->name }}</span></span>
    </div>
    @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
    <span class="float-right">
        <a href="/blog/{{ $post->slug }}/edit" class="text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
            Edit
        </a>
    </span>

    <span class="float-right">
        <form action="/blog/{{ $post->slug }}" method="POST">
            @csrf
            @method('delete')

            <button class="text-red-500 pr-3" type="submit">
                Delete
            </button>

        </form>
    </span>
    @endif
  </div>
  @endforeach
    </div>
  </div>
    @endsection