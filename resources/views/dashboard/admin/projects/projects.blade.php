@extends('layouts.app')
@section('title', 'Projekty - ' . auth()->user()->login . 'SmartLab')
@section('content')
<div class="mb-4 space-y-1 border-b border-black/15">
    <div class="flex justify-between items-center gap-1 min-h-[28px]">
        <div class=""><h2 class="text-2xl font-bold">Projekty</h2></div>
    </div>
    <div class="flex gap-5">
        <a href="">
            <button id="btn-user-students" class="py-2 font-semibold text-[14px] text-emerald-600 border-b border-b-emerald-600">
                Projekty
            </button>
        </a>
    </div>
</div>
@if($projects->isNotEmpty())
<x-dashboard.admin.projects.projects :projects="$projects" :partners="$partners"/>
@else
<div class="flex justify-center items-center">
    <div class="flex flex-col items-center">
        <div class="mt-20">
            <svg class="size-16" viewBox="0 0 122 116" fill="none" xmlns="http://www.w3.org/2000/svg">
                <ellipse cx="61" cy="58" rx="61" ry="58" fill="#FFD52C"/>
                <path d="M21.0642 86.4878C20.5642 70.8211 22.7642 39.2878 35.5642 38.4878C35.775 38.4212 36.0131 38.4012 36.2739 38.4334C55.8755 36.9381 89.0316 34.931 94.5642 38.4878C100.164 42.0879 103.398 71.9878 101.064 86.4878H48.0642H21.0642Z" fill="white" stroke-width="3" stroke="black"/>
                <line x1="94.9209" y1="45.684" x2="85.9209" y2="52.684" stroke-width="3" stroke="black"/>
                <line x1="92.4638" y1="53.0919" x2="84.4015" y2="45.0297" stroke-width="3" stroke="black"/>
                <circle cx="66.5" cy="50" r="5.5" fill="black"/>
                <path d="M77.5 13.5L45 11L46.5 29.5L75.5 27.5L77.5 13.5Z" fill="white"/>
                <path d="M45 38V11M45 11L77.5 13.5L75.5 27.5L46.5 29.5L45 11Z" stroke-width="3" stroke="black"/>
            </svg>
        </div>
        <h2 class="text-xl mt-5">Neexistujú žiadne projekty.</h2>
        <p class="text-gray-500 max-w-md leading-[130%] text-[15px] mt-2 text-center">Táto stránka slúži na správu projektov (ktoré možno vytvoriť pre študentskú súťaž alebo na účely publikovania informácií o projekte v rámci SmartLab).</p>
        <div class="mt-5">
            <x-dashboard.admin.projects.create-project :partners="$partners"/>
        </div>
    </div>
</div>
@endif
@endsection

