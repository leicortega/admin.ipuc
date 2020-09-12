@extends('layouts.app')

@section('title')Hermanos @endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button text-white bg-theme-1 shadow-md mr-2">Agregar Hermano</a>

        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>

        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>
    </div>

    @if (session()->has('creado') && session('creado') == 1)
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9 col-span-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Hermano programado correctamente </div>
    @endif
    
    @if (session()->has('creado') && session('creado') == 0)
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 col-span-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Hermano NO programado correctamente </div>
    @endif

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">IDENTIFICACION</th>
                    <th class="whitespace-no-wrap">NOMBRE</th>
                    <th class="text-center whitespace-no-wrap">TELEFONO</th>
                    <th class="text-center whitespace-no-wrap">DIRECCION</th>
                    <th class="text-center whitespace-no-wrap">TIPO</th>
                    <th class="text-center whitespace-no-wrap">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hermanos as $item)
                    <tr class="intro-x">
                        <td class="w-40">
                            <span class="font-medium whitespace-no-wrap">{{ $item->identificacion }}</span> 
                        </td>
                        <td>
                            <span class="font-medium whitespace-no-wrap">{{ $item->nombre}}</span> 
                        </td>
                        <td class="text-center">{{ $item->telefono ?? 'No Aplica' }}</td>
                        <td class="text-center">{{ $item->direccion ?? 'No Aplica' }}</td>
                        <td class="text-center">{{ $item->tipo ?? 'No Aplica' }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Editar </a>

                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Eliminar </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        <ul class="pagination">
            <li>
                <a class="pagination__link" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-4 h-4"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
            </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li> <a class="pagination__link" href="">1</a> </li>
            <li> <a class="pagination__link pagination__link--active" href="">2</a> </li>
            <li> <a class="pagination__link" href="">3</a> </li>
            <li> <a class="pagination__link" href="">...</a> </li>
            <li>
                <a class="pagination__link" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
            </li>
            <li>
                <a class="pagination__link" href=""> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-4 h-4"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
            </li>
        </ul>
        <select class="w-20 input box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div> --}}
    <!-- END: Pagination -->

    {{-- MODAL ADD CULTO --}}
    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content">
            <form action="/hermanos/create" method="post">
                @csrf

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Agregar Hermano
                    </h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label>Nombre</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Escriba el nombre" name="nombre" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Identificacion</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Escriba la identificacion" name="identificacion" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Telefono</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Escriba el telefono" name="telefono" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Direccion</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Escriba la direccion" name="direccion" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Fecha de Nacimiento</label>
                        <input type="text" class="datepicker input w-full border mt-2 flex-1" name="fecha_nacimiento" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Tipo</label>
                        <select class="input w-full border mt-2 flex-1" name="tipo" required>
                            <option value="">Seleccione</option>
                            <option value="Hermano">Hermano</option>
                            <option value="Amigo">Amigo</option>
                            <option value="Apartado">Apartado</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Bautizado</label>
                        <select class="input w-full border mt-2 flex-1" name="bautizado" required>
                            <option value="">Seleccione</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                <div class="text-3xl mt-5">¿Seguro desea eliminar el culto?</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancelar</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Eliminar</button>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

@endsection