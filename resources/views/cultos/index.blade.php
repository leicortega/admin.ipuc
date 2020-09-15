@extends('layouts.app')

@section('MyScripts')
    <script src="{{ asset('assets/js/culto.js') }}"></script>
@endsection

@section('title')Cultos @endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button text-white bg-theme-1 shadow-md mr-2">Programar Culto</a>

        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div>

        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg> 
            </div>
        </div>
    </div>

    @if (session()->has('realizado') && session('realizado') == 1)
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9 col-span-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Culto realizado correctamente </div>
    @endif

    @if (session()->has('creado') && session('creado') == 1)
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-18 text-theme-9 col-span-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle w-6 h-6 mr-2"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg> Culto programado correctamente </div>
    @endif
    
    @if (session()->has('creado') && session('creado') == 0)
        <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 col-span-12"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-octagon w-6 h-6 mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg> Culto NO programado correctamente </div>
    @endif

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">FECHA</th>
                    <th class="whitespace-no-wrap">HORA</th>
                    <th class="text-center whitespace-no-wrap">TITULO</th>
                    <th class="text-center whitespace-no-wrap">DIRIGIDO</th>
                    <th class="text-center whitespace-no-wrap">URL</th>
                    <th class="text-center whitespace-no-wrap">PICO Y CEDULA</th>
                    <th class="text-center whitespace-no-wrap">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cultos as $item)
                    <tr class="intro-x">
                        <td class="w-40">
                            <span class="font-medium whitespace-no-wrap">{{ $item->fecha }}</span> 
                        </td>
                        <td>
                            <span class="font-medium whitespace-no-wrap">{{ $item->hora}}</span> 
                        </td>
                        <td class="text-center">{{ $item->titulo ?? 'No Aplica' }}</td>
                        <td class="text-center">{{ $item->dirigido ?? 'No Aplica' }}</td>
                        <td class="text-center">{{ $item->url ?? 'No Aplica' }}</td>
                        <td class="text-center">{{ $item->pico_cedula }}</td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;" onclick="confirmar_realizado({{ $item->id }})"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i></a>

                                <a class="flex items-center mr-3" href="javascript:;" onclick="agregar_asistencia({{ $item->id }}, '{{ $item->pico_cedula }}')"> <i data-feather="file-text" class="w-4 h-4 mr-1"></i></a>

                                <a class="flex items-center text-theme-6" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i></a>
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
            <form action="/cultos/create" method="post">
                @csrf

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Programar Culto
                    </h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-6">
                        <label>Fecha</label>
                        <input type="text" class="datepicker input w-full border mt-2 flex-1" name="fecha" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Hora</label>
                        <input type="time" class="input w-full border mt-2 flex-1" name="hora" required>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Titulo</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Escriba el titulo" name="titulo" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Dirigido por</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="Comite dirige" name="dirigido" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>URL Zoom</label>
                        <input type="text" class="input w-full border mt-2 flex-1" placeholder="https://zoom.com" name="url" >
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Pico y Cedula</label>
                        <select class="input w-full border mt-2 flex-1" name="pico_cedula" required>
                            <option value="">Seleccione</option>
                            <option value="Par">Par</option>
                            <option value="Impar">Impar</option>
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

    <!-- BEGIN: Agregar Hermanos Modal -->
    <div class="modal" id="agregar-hermanos-modal">
        <div class="modal__content modal__content--lg p-10">
            <form action="/cultos/agregar_asistencia" id="agregar_asistencia" method="post">
                @csrf

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Agregar Hermanos al culto
                    </h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-10">
                        <label>Hermanos con pico y sedula para este culto</label>
                        <div class="mt-2">
                            <select class="select2 w-full" id="hermano_id" name="hermano_id">
                                
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="culto_id" name="culto_id">
                    <div class="col-span-12 sm:col-span-2 mt-8">
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Enviar</button>
                    </div>
                </div>
            </form>

            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">NOMBRE</th>
                        <th class="whitespace-no-wrap">TELEFONO</th>
                        <th class="text-center whitespace-no-wrap">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="hermanos_asistentes">
                    
                </tbody>
            </table>

        </div>
    </div>
    <!-- END: Agregar Hermanos Modal -->

    {{-- MODAL ADD CULTO --}}
    <div class="modal" id="confirmar_asistencia_modal">
        <div class="modal__content">
            <form action="/cultos/confirmar_asistencia" id="confirmar_asistencia" method="post">
                @csrf

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto" id="confirmar_asistencia_modal_title">
                        
                    </h2>
                </div>

                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-12">
                        <label>Temperatura</label>
                        <input type="number" step="0.01" class="input w-full border mt-2 flex-1" placeholder="Digite la tempreatura" name="temperatura" required>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label>¿Ha renido algun sintoma relacionado al COVID-19?</label>
                        <select class="input w-full border mt-2 flex-1" name="sintomas" required>
                            <option value="">Seleccione</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div class="col-span-12 sm:col-span-12">
                        <label>¿Ha tenido contacto con personas contagiadas de COVID-19?</label>
                        <select class="input w-full border mt-2 flex-1" name="contacto_personas_infectadas" required>
                            <option value="">Seleccione</option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <input type="hidden" name="asistencia_id" id="asistencia_id">
                    <input type="hidden" name="culto_id_asistencia" id="culto_id_asistencia">
                </div>

                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Cancelar</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">Enviar</button>
                </div>

            </form>
        </div>
    </div>

    <!-- BEGIN: Confirmar culto realizado Modal -->
    <div class="modal" id="confirmar-realizado-modal">
        <div class="modal__content modal__content--lg p-10">
            <form action="/cultos/confirmar_realizado" id="confirmar_realizado" method="post">
                @csrf

                <div class=" items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Confirmar Culto Realizado
                    </h2>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-10">
                        <label>Digite la ofrenda</label>
                        <input type="number" name="ofrenda" id="ofrenda" class="input w-full border mt-2 flex-1" required> 
                    </div>
                    <input type="hidden" id="culto_id_realizado" name="culto_id_realizado">
                    <div class="col-span-12 sm:col-span-2 mt-8">
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END: Confirmar culto realizado Modal -->

@endsection

