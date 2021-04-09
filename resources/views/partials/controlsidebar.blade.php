<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVEGACION</li>
        <li class="treeview {{ (request()->is('home')) ? 'active' : '' }}">
          <a href="{{ route('home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
       
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Almacen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="treeview {{ ! Route:: is('categoria.index') ?: 'active' }} " ><a href="{{ route('categoria.index') }}"><i class="fa fa-circle-o"></i> Categorias</a></li>
            <li class="treeview {{ ! Route:: is('articulo.index') ?: 'active' }} "><a href="{{ route('articulo.index') }}"><i class="fa fa-circle-o"></i> Articulos</a></li>
          </ul>
        </li>
       
        <li class="treeview {{ ! Route:: is('cliente.index') ?: 'active' }} "><a href="{{ route('cliente.index') }}"><i class="fa fa-user"></i> <span>Clientes</span></a></li>
        <li class="treeview {{ ! Route:: is('proveedor.index') ?: 'active' }} "><a href="{{ route('proveedor.index') }}"><i class="fa fa-users"></i> <span>Proveedores</span></a></li>

        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
