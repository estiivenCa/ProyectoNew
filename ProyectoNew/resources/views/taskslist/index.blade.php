@extends("layouts.app")
@section("content")

<nav class="flex p-4">
    <router-link to="/form" 
    class="text-xl text-white mx-3 p-2" 
    active-class="font-bold" 
    exact>Add task</router-link>

    <router-link to="/" 
    class="text-xl text-white mx-3 p-2" 
    active-class="font-bold" 
    exact>Task Lists </router-link>
</nav>

<div class="d-flex justify-content-center mt-5">
    <router-view></router-view>
</div>

@endsection
