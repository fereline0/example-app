<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Отклики') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                @foreach ($applys as $apply)
                    <x-card>
                        <x-link href="{{ route('users.show', $apply->id) }}">
                            <h3 class="text-lg font-semibold">{{ $apply->name }}</h3>
                        </x-link>
                        <p class="text-gray-600 dark:text-gray-400">{{ $apply->email }}</p>
                    </x-card>
                @endforeach
                {{ $applys->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
