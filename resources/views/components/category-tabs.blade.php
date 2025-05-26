<ul class="flex flex-wrap text-sm font-medium text-center text-gray-400 justify-center">

    <li class="me-2">
        <a href="{{ route('dashboard') }}"
            class="{{ request('category')
                ? 'inline-block px-4 py-2 rounded-lg hover:bg-gray-800 hover:text-white'
                : 'inline-block px-4 py-2 text-white bg-gray-800 rounded-lg active' }}"
            aria-current="page">All</a>
    </li>

    @foreach ($categories as $category)
        <li class="me-2">
            <a href="{{ route('post.byCategory', $category) }}"
                class="{{ Route::currentRouteNamed('post.byCategory') && request('category')->id == $category->id
                    ? 'inline-block px-4 py-2 text-white bg-gray-800 rounded-lg active'
                    : 'inline-block px-4 py-2 rounded-lg hover:bg-gray-800 hover:text-white' }}">{{ $category->name }}</a>
        </li>
    @endforeach

</ul>
