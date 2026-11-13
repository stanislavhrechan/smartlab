@extends('layouts.app')
@section('title', 'Katalog používateľov - ' . auth()->user()->login . 'SmartLab')
@section('content')
<div class="mb-4 space-y-1 border-b border-black/15">
    <div class="flex justify-between items-center gap-1 min-h-[28px]">
        <div class=""><h2 class="text-2xl font-bold">Katalog používateľov</h2></div>
    </div>
    <div class="flex gap-5">
        <a href="?tab=students">
            <button id="btn-user-students" class="py-2 font-semibold text-[14px] {{ $tab === 'students' ? 'text-emerald-600 border-b border-b-emerald-600' : '' }}">
                Študenti
            </button>
        </a>
        <a href="?tab=partners">
            <button id="btn-user-partneri" class="py-2 font-semibold text-[14px] {{ $tab === 'partners' ? 'text-emerald-600 border-b border-b-violet-600' : '' }}">
                Partneri
            </button>
        </a>
    </div>
</div>

@if($tab === 'students')
<x-dashboard.admin.users.students />
@else
<x-dashboard.admin.users.partneri />
@endif
@endsection

