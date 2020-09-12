<!DOCTYPE html>
<html lang="es">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="{{ asset('assets/images/logo.png') }}" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Dashboard de administrador IPUC Jose Eustacio Rivera.">
        <meta name="author" content="Leiner Ortega">
        <title>Login - IPUC Admin</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-10" src="{{ asset('assets/images/logo.png') }}">
                        <span class="text-white text-lg ml-3"> IPUC</span> </span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('assets/images/logo-ipuc.png') }}">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            IPUC
                            <br>
                            Jose Eustacio
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Un señor, una fe, un bautismo.</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <form method="POST" action="{{ route('login') }}" style="display: flex !important; width: 100%;">
                    @csrf 

                    <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0" style="width: 100%">
                        <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                            <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                Iniciar Sesion
                            </h2>
                            {{-- <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div> --}}
                            <div class="intro-x mt-8">
                                <input type="number" class="@error('identificacion') border-theme-6 @enderror intro-x login__input input input--lg border border-gray-300 block" required autocomplete="off" name="identificacion" placeholder="Identificacion">
                                <input type="password" class="@error('identificacion') border-theme-6 @enderror intro-x login__input input input--lg border border-gray-300 block mt-4" required autocomplete="off" name="password" placeholder="Contraseña">
                                
                                @error('identificacion')
                                    <div class="text-theme-6 mt-2">Usuario o contraseña incorrectos.</div>
                                @enderror
                            </div>
                            <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                                <div class="flex items-center mr-auto">
                                    <input type="checkbox" class="input border mr-2" name="remember" id="remember">
                                    <label class="cursor-pointer select-none" for="remember-me">Recordadrme</label>
                                </div>
                                {{-- <a href="">Forgot Password?</a>  --}}
                            </div>
                            <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                <button class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Ingresar</button>
                                {{-- <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</button> --}}
                            </div>
                        </div>
                    </div>
                </form>
                
                <!-- END: Login Form -->
            </div>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <!-- END: JS Assets-->
    </body>
</html>
