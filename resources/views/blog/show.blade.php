@extends('layouts.app')
@section('content')
        <div class="w-4/5 m-auto text-left">
            <div class="py-15">
                <h1 class="text-6xl">
                    {{ $post->title }}
                </h1>
            </div>
        </div>
        <div class="w-4/5 m-auto pt-20">
            <span class="text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span> Created on <span class="font-bold">{{date('jS M Y', strtotime($post->updated_at))}}</span>
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                {{ $post->description }}
            </p>
            <img class="h-70 w-full" src="{{asset('/images')}}/{{$post->image_path}}">
            <br>
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
            <br>
        </div>
@endsection