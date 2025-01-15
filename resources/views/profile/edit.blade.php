<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center space-y-6"> <!-- 中央揃えを追加 -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full max-w-3xl"> <!-- 幅を調整 -->
                    <div class="max-w-full">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full max-w-3xl"> <!-- 幅を調整 -->
                    <div class="max-w-full">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full max-w-3xl">
                    <div class="flex flex-col items-center space-y-4"> <!-- flex-colで縦並びに変更、余白を追加 -->
                        <h2 class="text-lg font-medium text-gray-900">
                            ログアウト
                        </h2>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-secondary-button>{{ __('ログアウト') }}</x-secondary-button>
                        </form>
                    </div>                    
                </div>
                
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg w-full max-w-3xl"> <!-- 幅を調整 -->
                    <div class="max-w-full">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
