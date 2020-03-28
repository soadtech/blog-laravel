<ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navegacion</li>
        <!-- Optionally, you can add icons to the links -->
        <li {{ request()->is('admin') ? 'class=active' : '' }}>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-home"></i> <span>Inicio</span>
          </a>
        </li>
        {{-- <li><a href="{{route('admin.post.index')}}"><i class="fa fa-eye"></i> <span>Ver todos los post</span></a></li> --}}
        

        <li class="treeview {{ request()->is('admin/posts*') ? 'active' : '' }}">
          <a href="#"><i class="fa fa-link"></i> <span>Opciones de blog</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li {{ request()->is('admin/posts') ? 'class=active' : '' }}><a href="{{route('admin.posts.index')}}"><i class="fa fa-eye"></i>Ver todos los post</a></li>
            <li><a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Crear un post</a></li>
          </ul>
        </li>
</ul>