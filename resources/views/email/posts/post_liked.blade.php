@component('mail::message')
# Your Post Was Liked

{{$liker->name}} liked your post, click the button to view your post.

@component('mail::button', ['url' => route('post.show', $post)])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
