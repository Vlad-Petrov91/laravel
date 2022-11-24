<li class="nav-item"><a class="nav-link{{ request()->routeIs('home')?' active':'' }}" href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.index')?' active':'' }}" href="{{route('admin.index')}}">Правка новостей</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.categories')?' active':'' }}" href="{{ route('admin.categories') }}">Правка категорий</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.downloadText')?' active':'' }}" href="{{ route('admin.downloadText') }}">Скачать текст</a></li>
