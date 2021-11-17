<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Posty</title>
</head>

<body class="bg-gray-200">
    <nav class="p-6 mb-4 bg-white flex justify-between">
        <ul class="flex items-center">
            <li><a href="{{ route('home') }}" class="p-3">Home</a></li>
            <li><a href="/" class="p-3">Dashboard</a></li>
            <li><a href="/" class="p-3">Posts</a></li>
        </ul>
        <ul class="flex items-center">
            {{-- if the user is signed in --}}
            @auth
                <li><a href="/" class="p-3">Saiicodes</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>  
                </li>
            @endauth
            
            {{-- if the user is not signed in --}}
            @guest
                <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                <li><a href="{{ route('register') }}" class="p-3">Register</a></li>  
            @endguest  
        </ul>
    </nav>
    @yield("content")
</body>

</html>