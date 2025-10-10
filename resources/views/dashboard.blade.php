<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {!! __("1. db는 mysql 사용중 나중에 mssql , mongodb등 연결할것<br>
                            2. 라라벨 구조 확인하고 각 연습 방식 notion에 정리할것<br>
                            3. 각 로그인 기능등 php 훑어볼것<br>
                            4. 채팅기능 구현화 목표<br>
                            5. 결제시스템등 구현<br>
                        ") !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
