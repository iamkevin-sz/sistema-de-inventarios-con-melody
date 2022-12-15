<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        @can('ver dashboard')
        <li class="nav-item">
            <a class="nav-link" href="home">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        @endcan

        {{--  @can('reports.day' || 'reports.date' || 'report.results')  --}}
        <li class="nav-item">


            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('reports.day') --}}
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reportes.dia')}}">Reportes por día</a>
                    </li>
                    {{-- @endcan --}}
                    {{-- @can('reports.date') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reportes.fecha')}}">Reportes por fecha</a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
        </li>
        {{--  @endcan  --}}
        {{-- @can('purchases.index') --}}
        <br>
        <p style="color:red; text-indent:2.5em; font-weight:bold">SISTEMA POS</p>
        <li class="nav-item">
            <a class="nav-link" href="{{route('compras.index')}}">
                <i class="fas fa-cart-plus menu-icon"></i>
                <span class="menu-title">Compras</span>
            </a>
        </li>
        {{-- @endcan --}}

        {{-- @can('sales.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('ventas.index')}}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Ventas</span>
            </a>
        </li>
        {{-- @endcan --}}

        {{-- @can('sales.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('cotizaciones.index')}}">
                <i class="fas fa-shopping-cart menu-icon"></i>
                <span class="menu-title">Cotizaciones</span>
            </a>
        </li>
        {{-- @endcan --}}

        {{-- @can('orders.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('clientes.index')}}">
                <i class="fas fa-fw fa-users menu-icon"></i>

                <span class="menu-title">Clientes</span>
            </a>
        </li>
        {{-- @endcan --}}

        {{--  @can('products.index' ||
            'categories.index' ||
            'tags.index' ||
            'brands.index'
            )  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#inventario" aria-expanded="false"
                aria-controls="inventario">
                <i class="fas fa-boxes menu-icon menu-icon"></i>
                <span class="menu-title">Inventario</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="inventario">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('products.index') --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('productos.index')}}">
                            <i class="fas fa-boxes"></i>&nbsp;
                            <span class="menu-title">Productos</span>
                        </a>
                    </li>
                    {{-- @endcan --}}
                    @can('mostrar categorias')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categorias.index')}}">
                            <i class="fas fa-tags"></i>&nbsp;
                            <span class="menu-title">Categorías</span>
                        </a>
                    </li>

                    @endcan

                </ul>
            </div>
        </li>
        {{--  @endcan  --}}




        {{--  @endcan  --}}
        @can('clients.index')
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>
        @endcan

        {{-- @can('providers.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('proveedores.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>

        <br>

        <p style="color:red; text-indent:2.5em; font-weight:bold">ROLES Y PERMISOS</p>
        {{-- @endcan --}}
        {{-- @can('users.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-user-tag menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        {{-- @endcan --}}
        {{-- @can('roles.index') --}}
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-cog menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        {{-- @endcan --}}
        {{--  @can(
            'business.index' ||
            'printers.index'
            )  --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    {{-- @can('business.index') --}}
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">Empresa</a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('business.index') --}}
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="#">Backup</a>
                    </li>
                    {{-- @endcan --}}

                    {{-- @can('printers.index')
                    <li class="nav-item">
                        <a class="nav-link" href="#">Impresora</a>
                    </li>
                    @endcan --}}
                </ul>
            </div>

        </li>
        {{--  @endcan  --}}

    </ul>
    @include('sweetalert::alert')
</nav>
