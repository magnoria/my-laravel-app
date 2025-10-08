<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('새 게시글 작성') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <a href="{{ route('posts.index') }}" class="text-gray-500 hover:text-gray-700">
                        ⬅️ 목록으로 돌아가기
                    </a>
                    <hr class="my-4">

                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf 

                        <div class="mb-4">
                            <label for="title" class="block font-medium text-sm text-gray-700">제목:</label>
                            <input type="text" id="title" name="title" required 
                                value="{{ old('title') }}" 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="author" class="block font-medium text-sm text-gray-700">작성자 (선택 사항):</label>
                            <input type="text" id="author" name="author" 
                                value="{{ old('author') }}" 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            @error('author') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                        
                        <div class="mb-6">
                            <label for="content" class="block font-medium text-sm text-gray-700">내용:</label>
                            <textarea id="content" name="content" rows="10" required 
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">{{ old('content') }}</textarea>
                            @error('content') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            저장
                        </button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>