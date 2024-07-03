@extends("layouts.app")
@section("content")

<nav class="flex p-4 bg-info">
    <router-link to="/home" 
    class="text-xl text-white mx-3 p-2" 
    active-class="font-bold" 
    exact> Home</router-link>

</nav>


    <router-view></router-view>


@endsection
