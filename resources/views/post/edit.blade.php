<x-app-layout>

    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl text-gray-700 mb-4">
                Edit post: <strong>{{ $post->title }}</strong>
            </h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('PUT')

                    @if ($post->imageUrl())
                        <div>
                            <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full rounded-sm mb-8">
                        </div>
                    @endif

                    <!-- Image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                            :value="old('image')" autofocus />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>

                    <!-- Title -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                            :value="old('title', $post->title)" autofocus />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Category -->
                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Category')" />
                        <select id="category_id" name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                            <option value="">Select a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-textarea-input id="content" class="block mt-1 w-full" name="content"
                            >{{ old('content', $post->content) }}</x-textarea-input>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Published At -->
                    <div class="mt-4">
                        <x-input-label for="published_at" :value="__('Published At')" />
                        <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local" name="published_at"
                            :value="old('published_at', $post->published_at)" autofocus />
                        <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-4">
                        Submit
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
