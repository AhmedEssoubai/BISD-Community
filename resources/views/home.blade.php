@extends('layouts.app')

@section('content')
<div id="app">
    <Navbar></Navbar>
    <router-view></router-view>
    <footer-bar></footer-bar>
</div>
@endsection