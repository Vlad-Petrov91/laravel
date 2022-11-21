<li class="nav-item"><a class="nav-link{{ request()->routeIs('home')?' active':'' }}" href="{{ route('home') }}">Главная</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.create')?' active':'' }}" href="{{ route('admin.create') }}">Добавить новость</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.downloadImage')?' active':'' }}" href="{{ route('admin.downloadImage') }}">Скачать изображение</a></li>
<li class="nav-item"><a class="nav-link{{ request()->routeIs('admin.downloadText')?' active':'' }}" href="{{ route('admin.downloadText') }}">Скачать текст</a></li>
