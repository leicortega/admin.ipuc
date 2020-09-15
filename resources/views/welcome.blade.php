@extends('layouts.app')

@section('title')Dashboard @endsection

@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Bienvenido {{ auth()->user()->name }}
                </h2>
            </div>
            
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="/cultos/programados">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="file-text" class="report-box__icon text-theme-11"></i> 
                                    <div class="ml-auto">
                                        {{-- <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="2% Lower than last month"> 2% <i data-feather="chevron-down" class="w-4 h-4"></i> </div> --}}
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">Administrar Cultos</div>
                                {{-- <div class="text-base text-gray-600 mt-1">New Orders</div> --}}
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <a href="/hermanos">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-10"></i> 
                                    <div class="ml-auto">
                                        {{-- <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div> --}}
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">Administrar Hermanos</div>
                                {{-- <div class="text-base text-gray-600 mt-1">Item Sales</div> --}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END: General Report -->
    </div>
</div>
@endsection