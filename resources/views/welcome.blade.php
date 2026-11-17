@extends('layouts.home')
@section('SmartLab')
@section('content')
    <!-- <x-home.hero-section />
    <x-home.about-section />
    @if($projects->isNotEmpty())
    <x-home.projects-section :projects="$projects"/>
    @endif
    <x-home.podujatia-section /> -->
    <x-user-pages.home-page :projects="$projects"/>
@endsection

//kokot