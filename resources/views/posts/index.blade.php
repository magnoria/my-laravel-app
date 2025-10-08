<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시글 목록') }}
        </h2>
    </x-slot>    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('posts.create') }}" class="text-blue-500 hover:text-blue-700 font-bold">
                        ➡️ 새 글 작성
                    </a>
                    <hr class="my-4">

                    @if (session('success'))
                        <div style="color: green; margin-bottom: 1rem; border: 1px solid green; padding: 10px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="mb-4 p-4 border-b">
                            <h3 class="text-lg font-bold">
                                <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="text-sm text-gray-500">
                                작성자: {{ $post->author ?? '익명' }} | 작성일: {{ $post->created_at->format('Y-m-d') }}
                            </p>
                            <p class="mt-2">{{ Str::limit($post->content, 100) }}</p>
                        </div>
                    @endforeach

                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>