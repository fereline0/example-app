<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                <x-card>
                    <h3 class="text-lg text-black dark:text-white font-semibold">{{ $user->name }}</h3>
                    @if ($user->detail_information)
                        <p class="text-gray-800 dark:text-gray-200">{{ $user->detail_information->about }}</p>
                        
                        @if ($user->detail_information->birthday)
                            <p class="text-gray-800 dark:text-gray-200">
                                {{ \Carbon\Carbon::parse($user->detail_information->birthday)->translatedFormat('j F Y') }}
                            </p>
                        @endif

                        @if ($user->detail_information->gender)
                            <p class="text-gray-800 dark:text-gray-200">
                                {{ $user->get_gender_display_attribute() }}
                            </p>
                        @endif
                    @endif
                    <p class="text-gray-800 dark:text-gray-200">{{ $user->email }}</p>
                    @can('edit', $user)
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <x-primary-button class="mt-6">Actions</x-primary-button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('users.edit', $user->id)">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endcan
                </x-card>

                @can('edit', $user)
                    <x-card>
                        <form method="post" action="{{ route('users.works.store', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="space-y-1">
                                    <x-input-label for="title" :value="__('Title')" />
                                    <x-text-input id="title" name="title" type="text" class="block w-full" required />
                                    <x-input-error :messages="$errors->get('title')" />

                                    <x-input-label for="description" :value="__('Description')" class="block w-full" />
                                    <x-text-input id="description" name="description" type="text" class="block w-full" />
                                    <x-input-error :messages="$errors->get('description')" />

                                    <x-input-label for="image" :value="__('Image')" class="block w-full" />
                                    <x-text-input id="image" name="image" type="file" class="block w-full" required />
                                    <x-input-error :messages="$errors->get('image')" />
                                </div>
                                <x-primary-button class="mt-4">{{ __('Create') }}</x-primary-button>
                            </div>
                        </form>
                    </x-card>
                @endcan

                @if ($works)
                    @foreach ($works as $work)
                    <x-card>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-lg text-black dark:text-white font-semibold">{{ $work->title }}</h3>
                                @if ($work->description)
                                    <p class="text-gray-800 dark:text-gray-200">{{ $work->description }}</p>
                                @endif
                            </div>
                            <img src="{{ asset('storage/' . $work->image) }}">
                            @can('edit', $user)
                                <x-dropdown align="left" width="48">
                                    <x-slot name="trigger">
                                        <x-primary-button>Actions</x-primary-button>
                                    </x-slot>
            
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('works.edit', $work->id)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link @click="$dispatch('open-modal', 'confirm-delete-{{ $work->id }}')">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>

                                <x-modal name="confirm-delete-{{ $work->id }}" :show="false" focusable>
                                    <form method="post" action="{{ route('works.destroy', $work->id) }}" class="p-6">
                                        @csrf
                                        @method('delete')
            
                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Are you sure you want to delete this work?') }}
                                        </h2>
            
                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('This action cannot be undone.') }}
                                        </p>
            
                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>
                                            <x-danger-button class="ms-3" type="submit">
                                                {{ __('Delete') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endcan
                        </div>
                    </x-card>
                    @endforeach
                @endif
                {{ $works->links() }}
            </div>
        </div>
    </div>
</x-app-layout>