<div>
    <!-- Be present above all else. - Naval Ravikant -->
    {{-- {{$titulo}} --}}
    {{-- <h1>{{$slot}}</h1> --}}

    @if($posts->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div class="">
                    <a href="{{route('posts.show', ['post' => $post, 'user' => $post->user])}}"><img src="{{asset('uploads').'/'.$post->imagen}}" alt="{{$post->titulo}}"></a>

                </div>
            @endforeach
        </div>

        <div class="my-10">
            {{$posts->links('pagination::tailwind')}}
        </div>

    @else
        <p>No hay posts</p>
    @endif

</div>