<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Пользователь') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <x-card>
                    <div class="flex justify-between gap-4">
                        <div>
                            <h3 class="text-lg dark:text-white font-semibold">{{ $user->name }}</h3>
                            @if ($user->detail_information)
                            <p class="text-gray-800 dark:text-gray-200">{{ $user->detail_information->about }}</p>

                            @if ($user->detail_information->birthday)
                            <p class="text-gray-800 dark:text-gray-200">
                                {{
                                \Carbon\Carbon::parse($user->detail_information->birthday)->locale('ru')->translatedFormat('j
                                F Y')
                                }}
                            </p>
                            @endif

                            @if ($user->detail_information->gender)
                            <p class="text-gray-800 dark:text-gray-200">
                                {{ $user->get_gender_display_attribute() }}
                            </p>
                            @endif

                            @if ($user->detail_information->phone_number)
                            <div>
                                <x-link :href="'tel:' . $user->detail_information->phone_number">
                                    {{ $user->detail_information->phone_number }}
                                </x-link>
                            </div>
                            @endif

                            @if ($user->email)
                            <div>
                                <x-link :href="'mailto:' . $user->email">
                                    {{ $user->email }}
                                </x-link>
                            </div>
                            @endif

                            @if ($user->detail_information->resume)
                            <div>
                                <x-link :href="Storage::url($user->detail_information->resume)"
                                    download="{{ basename($user->detail_information->resume) }}">
                                    {{ __('Скачать резюме') }}
                                </x-link>
                            </div>
                            @endif
                            @endif
                        </div>
                        <div>
                            @can('edit', $user)
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <x-primary-button>{{ __('Действия') }}</x-primary-button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('users.edit', $user->id)">
                                        {{ __('Редактировать') }}
                                    </x-dropdown-link>
                                </x-slot>
                            </x-dropdown>
                            @endcan
                        </div>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>