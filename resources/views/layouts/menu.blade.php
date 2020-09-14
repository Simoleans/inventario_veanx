<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/logo.png') }}" class="img-circle elevation-2" alt="User Imagen">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ strtoupper(auth()->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
                {{-- <span class="right badge badge-danger">badge</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview  {{ active('user.*','menu-open') }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
                <i class="fas fa-angle-left right"></i>
               {{--  <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link {{ active('user.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Usuarios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link {{ active('user.create') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Usuario</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview  {{ active('producto.*','menu-open') }}">
            <a href="#" class="nav-link">
              <i class="fas fa-cart-arrow-down"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
               {{--  <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('producto.index') }}" class="nav-link {{ active('producto.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('producto.create') }}" class="nav-link {{ active('producto.create') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrar Producto</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview  {{ active('user.*','menu-open') }}">
            <a href="#" class="nav-link">
              <i class="fas fa-share-square"></i>
              <p>
                Inventario
                <i class="fas fa-angle-left right"></i>
               {{--  <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('movimiento.index') }}" class="nav-link {{ active('movimiento.index') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Movimientos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('inventario.index') }}" class="nav-link {{ active('user.create') }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ver Inventario</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('reporte.index') }}" class="nav-link">
              <i class="fas fa-file-pdf"></i>
              <p>
                Descargar Informes
                {{-- <span class="right badge badge-danger">badge</span> --}}
              </p>
            </a>
          </li>
          <li class="nav-header">OPCIONES</li>
            <li class="nav-item">
              <a href="{{ route('tipo.index') }}" class="nav-link {{ active('tipo.index') }}">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Tipo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('marca.index') }}" class="nav-link {{ active('marca.index') }}">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Marca</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('pack.index') }}" class="nav-link {{ active('pack.index') }}">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Packs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('atributo.index') }}" class="nav-link {{ active('atributo.index') }}">
                <i class="nav-icon far fa-circle text-default"></i>
                <p>Atributos</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('combo.index') }}" class="nav-link {{ active('combo.index') }}">
                <i class="nav-icon far fa-circle" style="color: #f012be "></i>
                <p>Combos</p>
              </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="fas fa-sign-out-alt text-danger"></i>
              <p class="text">Salir</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>