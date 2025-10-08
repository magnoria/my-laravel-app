<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('게시글 보기') }}: {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1 class="text-2xl font-bold mb-4">{{ $post->title }}</h1>
                    
                    <p class="text-sm text-gray-500 mb-6">
                        작성자: {{ $post->author ?? '익명' }} | 작성일: {{ $post->created_at->format('Y-m-d H:i') }}
                    </p>
                    
                    <div class="border-t pt-4 mb-6">
                        {!! nl2br(e($post->content)) !!} 
                    </div>

                    <hr class="my-4">

                    <div class="flex items-center space-x-4">
                        <a href="{{ route('posts.index') }}" class="text-blue-500 hover:text-blue-700">
                            목록으로 돌아가기
                        </a> 
                        
                        <a href="{{ route('posts.edit', $post) }}" class="text-green-500 hover:text-green-700">
                            수정하기
                        </a>
                        
                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" 
                                class="text-red-500 hover:text-red-700 underline" 
                                onclick="return confirm('정말로 이 글을 삭제하시겠습니까?');">
                                삭제하기
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>