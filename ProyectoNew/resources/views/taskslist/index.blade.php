@extends("layouts.app")
@section("content")

<nav class="flex p-4">
    <router-link to="/home" 
    class="text-xl text-white mx-3 p-2" 
    active-class="font-bold" 
    exact> Home</router-link>

</nav>

<div class="d-flex justify-content-center mt-5">
    <router-view></router-view>
</div>

@endsection
