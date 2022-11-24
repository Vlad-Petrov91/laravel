<li class="nav-item"><a class="nav-link{{ request()->routeIs('home')?' active':'' }}" href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('info')?' active':'' }}" href="{{ route('info') }}">Информация</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('news.index')?' active':'' }}" href="{{ route('news.index') }}">Все новости</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('news.categories.categories')?' active':'' }}" href="{{ route('news.categories.categories') }}">Категории новостей</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.index')?' active':'' }}" href="{{ route('admin.index') }}">Admin</a></li>


