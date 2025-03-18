<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') </title>
    {{-- Icono de pestaña  --}}
    <link rel="icon" href="{{ asset('img/papeleria.png') }}" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/dash.css')}}">
    <!-- datatables  -->
    <link rel="stylesheet" href="{{url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Iconos de bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    </head>
    <body>
        <!-- MENU -->
        <section id="sidebar">
            <a href="{{url('/admin')}}" class="brand">
                <img src="{{url('img/logo_educadora.png')}}" style="height: 60px; margin-right: 4px; float: left;">
                La Educadora</a>
            <ul class="side-menu">
                {{-- <li><a href="{{url('/admin')}}" class="active"><i class='bx bxs-dashboard icon'></i>Principal</a></li> --}}
                {{-- <li class="divider" data-text="main">Main</li> --}}

                {{-- seccion de configuracion  --}}
                {{-- <li>
                    <a href="#"><i class='bx bxs-cog icon' ></i>Configuración <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/empresas/create')}}">Editar Configuracion</a></li>
                        
                    </ul>
                </li> --}}
                <li><a href="{{url('admin/roles')}}"><i class='bx bxs-user icon' ></i>Roles</a></li>

                <li><a href="{{url('admin/usuarios')}}"><i class='bx bxs-group icon' ></i>Usuarios</a></li>

                <li><a href="{{url('admin/categorias')}}"><i class='bx bxs-category icon' ></i>Categorias</a></li>

                <li><a href="{{url('admin/productos')}}"><i class='bx bx-list-plus icon' ></i>Productos</a></li>

                <li><a href="{{url('admin/proveedores')}}"><i class='bx bx-group icon' ></i>Proveedores</a></li>

                <li><a href="{{url('admin/inventarios')}}"><i class='bx bxs-package icon' ></i>Iventario</a></li>


                <li><a href="{{url('admin/compras')}}"><i class='bx bx-cart-alt icon' ></i>Compras</a></li>

                <li><a href="{{url('admin/clientes')}}"><i class='bx bxs-user-detail icon' ></i>Clientes</a></li>

                <li><a href="{{url('admin/ventas')}}"><i class='bx bx-money icon' ></i>Ventas</a></li>

                
                {{-- Roles
                <li>
                    <a href="#"><i class='bx bxs-user icon' ></i>Roles <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/roles')}}">Listado de roles</a></li>
                        li><a href="{{url('admin/roles/create')}}">Creacion de roles</a></li> 
                        
                    </ul>
                </li> --}}

                {{-- Usuarios
                <li>
                    <a href="#"><i class='bx bxs-group icon' ></i>Usuarios<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/usuarios')}}">Listado de usuarios</a></li>
                        {<li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li> --}}

                {{-- Categorias
                <li>
                    <a href="#"><i class='bx bxs-category icon' ></i>Categorias<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/categorias')}}">Listado de categorias</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}

                {{-- Productos
                <li>
                    <a href="#"><i class='bx bx-list-plus icon' ></i>Productos<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/productos')}}">Listado de Productos</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}

                {{-- proveedores
                <li>
                    <a href="#"><i class='bx bx-group icon' ></i>Proveedores<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/proveedores')}}">Listado de Proveedores</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li> 
                        
                    </ul>
                </li>
                --}}
                {{-- proveedores

                <li>
                    <a href="#"><i class='bx bx-cart-alt icon' ></i>Compras<i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{url('admin/compras')}}">Listado de Compras</a></li>
                        <li><a href="{{url('admin/usuarios/create')}}">Creacion de usuarios</a></li>
                        
                    </ul>
                </li>
                --}}


                

                {{-- <li class="divider" data-text="seccion">opcion</li>
                <li><a href="#"><i class='bx bx-table icon' ></i> opcion</a></li>
                <li>
                    <a href="#"><i class='bx bxs-notepad icon' ></i> opcion <i class='bx bx-chevron-right icon-right' ></i></a>
                    <ul class="side-dropdown">
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                        <li><a href="#">opcion</a></li>
                    </ul>
                </li> --}}


            </ul>
        </section>
        <!-- FIN MENU -->
    
        <!-- INICO NAVBAR PERFIL-->
        <section id="content">
            <!-- NAVBAR -->
            <nav>
                <i class='bx bx-menu toggle-sidebar' ></i>
                
                {{-- Salir de sesion  --}}
                <div class="profile">
                    {{ Auth::user()->name }} 
                    <img src="https://th.bing.com/th/id/OIP.f4wLVIL_SURqRFpL7fdr2QHaHa?rs=1&pid=ImgDetMain" alt="Perfil"> 
                    <ul class="profile-link">
                        <li ><a  href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" ><i class='bx bxs-arrow-from-right' ></i> Salir</a></li>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </ul>
                </div>
            </nav>
            <!-- FIN NAVBAR -->


            <!-- CUERPO PRINCIPAL DINAMICO -->
            <main>
                @yield('content') 
                
            </main>
            <!-- FIN CUERPO PRINCIPAL -->

        </section>
        <!-- FIN NAVBAR -->
        @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')) )
                        
            <script>
                Swal.fire({
                    position: "top-center",
                    icon: "{{$icono}}",
                    title: "{{$message}}",
                    showConfirmButton: false,
                    timer: 4600
                });
            </script>
        @endif
        
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="{{asset('js/script.js')}} "></script>



        <!-- Bootstrap 4 -->
        <script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- DATATABLE 4 -->
        <script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{url('plugins/jszip/jszip.min.js')}}"></script>
        <script src="{{url('plugins/pdfmake/pdfmake.min.js')}}"></script>
        <script src="{{url('plugins/pdfmake/vfs_fonts.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{url('dist/js/adminlte.min.js')}}"></script>
    </body>
    
</html>
