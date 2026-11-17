@extends('layouts.app')
@section('title', 'Aktuality - ' . auth()->user()->login . 'SmartLab')
@section('content')
<div class="mb-4 space-y-1 border-b border-black/15">
    <div class="flex justify-between items-center gap-1 min-h-[28px]">
        <div class=""><h2 class="text-2xl font-bold">Aktuality</h2></div>
    </div>
    <div class="flex gap-5">
        <a href="">
            <button id="btn-user-students" class="py-2 font-semibold text-[14px] text-emerald-600 border-b border-b-emerald-600">
                Informacia o aktualitach
            </button>
        </a>
       
    </div>
</div>
@endsection

