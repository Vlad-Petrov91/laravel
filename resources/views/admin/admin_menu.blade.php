<li class="nav-item"><a class="nav-link{{ request()->routeIs('home')?' active':'' }}" href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.news.index')?' active':'' }}" href="{{route('admin.news.index')}}">Правка новостей</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.categories.index')?' active':'' }}" href="{{ route('admin.categories.index') }}">Правка категорий</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.changePermissions')?' active':'' }}" href="{{ route('admin.changePermissions') }}">Права пользователей</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.downloadText')?' active':'' }}" href="{{ route('admin.downloadText') }}">Скачать текст</a></li>
