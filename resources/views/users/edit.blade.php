<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактировать пользователя') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card>
                <div class="max-w-xl">
                    @include('users.partials.update-user-information-form')
                </div>
            </x-card>

            <x-card>
                <div class="max-w-xl">
                    @include('users.partials.update-user-detail-information-form')
                </div>
            </x-card>

            <x-card>
                <div class="max-w-xl">
                    @include('users.partials.update-password-form')
                </div>
            </x-card>

            <x-card>
                <div class="max-w-xl">
                    @include('users.partials.delete-user-form')
                </div>
            </x-card>
        </div>
    </div>
</x-app-layout>