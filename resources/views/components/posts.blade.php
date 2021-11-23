@props(['post' => $post])

<div>
    <!-- The whole future lies in uncertainty: live immediately. - Seneca -->
    
    <div class="mb-4">
            <a href="{{ route('user.posts', $post->user) }}" class="font-bold">{{ $post->user->username }}</a> <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        
                <p class="mb-2">{{$post->body}}</p>

                        {{-- Delete a post --}}
                <div>
                    @can('delete', $post)
                        <form action="{{route('posts.destroy', [$post->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form> 
                    @endcan   
                </div>

                        {{-- like and unlike a post --}}
                <div class="flex items-center">
                    @auth
                        @if (!$post->likedBy(auth()->user()))
                             <form action="{{ route('posts.like', [$post->id]) }}" method="post" class="mr-1">
                             @csrf
                             <button type="submit" class="text-blue-500">like</button>
                        </form>
                        @else
                        <form action="{{route('posts.like', [$post->id])}}" method="post" class="mr-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">unlike</button>
                        </form> 
                         @endif 
                    @endauth
                    
                    <span>{{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}}</span>
                </div>
    </div>
</div>