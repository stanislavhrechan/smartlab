@extends('layouts.home')
@section('SmartLab')
@section('content')
    <x-user-pages.partners-page :partners="$partners"/>
@endsection