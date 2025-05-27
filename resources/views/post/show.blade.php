<x-app-layout>
    <div class="py-4">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <h1 class="text-2xl mb-4">{{ $post->title }}</h1>

                <!-- User Avatar -->
                <div class="flex gap-4">
                    <x-user-avatar :user="$post->user" />

                    <div>
                        <x-follow-ctr :user="$post->user" class="flex gap-2">
                            <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">
                                {{ $post->user->name }}
                            </a>
                            @if(auth()->user() && auth()->user()->id !== $post->user->id)
                                &middot;
                                <button x-text="following ? 'Unfollow' :'Follow'"
                                :class="following ? 'text-red-600' : 'text-emerald-600'" @click="follow()"></button>
                            @endif
                            
                            @if(auth()->user() && auth()->user()->id === $post->user->id)
                                &middot;
                                <button disabled class="text-emerald-700">Author</button>
                            @endif
                        </x-follow-ctr>
                        
                        <div class="flex gap-2 text-sm text-gray-500">
                            {{ $post->readTime() }} min read
                            &middot;
                            {{ $post->getPublishedAt() }}
                        </div>
                    </div>

                </div>
                <!-- User Avatar -->

                <!-- Updel Section -->
                @if ($post->user_id === Auth::id())
                    <div class="py-4 mt-8 border-t border-b berder-gray-200">
                        <x-primary-button href="{{ route('post.edit', $post->slug) }}">
                            Edit Post
                        </x-primary-button>
                        <form class="inline-block" action="{{ route('post.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                Delete Post
                            </x-danger-button>
                        </form>
                    </div>
                @endif
                <!-- End Updel Section -->

                <!-- Clap Section -->
                <x-clap-button :post="$post"/>
                <!-- Clap Section -->

                <!-- Content Section -->
                <div class="mt-8">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full">

                    <div class="mt-4">
                        {{ $post->content }}
                    </div>
                </div>

                <div class="mt-8">
                    <span class="px-4 py-2 bg-gray-200 rounded-2xl">
                        {{ $post->category->name }}
                    </span>
                </div>

                <!-- Clap Section -->
                <x-clap-button :post="$post"/>
                <!-- Clap Section -->
            </div>
        </div>
    </div>
</x-app-layout>
