@extends('layouts.app')
@section('title', 'Katalog používateľov - ' . auth()->user()->login . 'SmartLab')
@section('content')
<div class="mb-4 space-y-1 border-b border-black/15">
    <div class="flex justify-between items-center gap-1 min-h-[28px]">
        <div class=""><h2 class="text-2xl font-bold">Zoznam partnerov</h2></div>
    </div>
    <div class="flex gap-5">
        <a >
            <button id="btn-user-partneri" class="py-2 font-semibold text-[14px] text-emerald-600 border-b border-b-violet-600">
                Partneri
            </button>
        </a>
    </div>
</div>

@if($partners->isNotEmpty())
<x-dashboard.admin.users.partneri :partners="$partners"/>
@else
<div class="flex justify-center items-center">
    <div class="flex flex-col items-center">
        <div class="mt-20">
            <svg class="size-24" viewBox="0 0 150 150" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="74.6908" cy="74.6907" r="63.5" fill="#35A69F"/>
                <path d="M75.1936 43.9778C67.6806 59.8601 54.6464 95.5683 62.6146 111.343L108.637 93.1159" stroke-width="5" stroke="white"/>
                <ellipse cx="102.191" cy="61.6914" rx="9" ry="8.5" fill="white"/>
                <ellipse cx="45.1907" cy="61.6914" rx="9" ry="8.5" fill="white"/>
            </svg>
        </div>
        <h2 class="text-xl">Nemáte partnerov</h2>
        <p class="text-gray-500 max-w-md leading-[130%] text-[15px] mt-5 text-center">Táto stránka zobrazuje informácie o počte vašich partnerov a podrobnosti o nich. Momentálne nemáte žiadnych partnerov; požiadajte ich, prosím, aby sa zaregistrovali.</p>
        <div class="mt-5">
        </div>
    </div>
</div>
@endif
@endsection

