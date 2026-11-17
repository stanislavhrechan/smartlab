@extends('layouts.home')
@section('SmartLab')
@section('content')
   <x-user-pages.students-page :projects="$projects"/>
@endsection