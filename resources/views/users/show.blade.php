<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Пользователь') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <x-card>
                    <div class="flex justify-between gap-4">
                        <div>
                            <h3 class="text-lg dark:text-white font-semibold">{{ $user->name }}</h3>
                            @if ($user->detail_information)
                                <p class="text-gray-800 dark:text-gray-200">{{ $user->detail_information->about }}</p>

                                @if ($user->detail_information->birthday)
                                    <p class="text-gray-800 dark:text-gray-200">
                                        {{ \Carbon\Carbon::parse($user->detail_information->birthday)->locale('ru')->translatedFormat('j
                                                                                                                                                                                                                                        F Y') }}
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

                                @if ($user->resume)
                                    <div>
                                        <x-link :href="Storage::url($user->resume->file_path)" download="{{ basename($user->resume->file_path) }}">
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

                @auth
                    @if ($user->id !== auth()->id())
                        <x-card>
                            <form action="{{ route('users.reviews.store', $user->id) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('post')

                                <div>
                                    <x-textarea id="value" name="value" placeholder="Отзыв" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('value')" />
                                </div>

                                <x-primary-button>
                                    Опубликовать
                                </x-primary-button>
                            </form>
                        </x-card>
                    @endif
                @endauth
                @foreach ($reviews as $review)
                    <x-card class="space-y-2">
                        <div class="flex justify-between gap-4">
                            <x-user-preview :name="$review->author->name" :description="$review->author->email" :href="route('users.show', $review->author->id)" />
                            @can('edit', $review->author)
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <x-primary-button>{{ __('Действия') }}</x-primary-button>
                                    </x-slot>

                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('reviews.edit', $review->id)">
                                            {{ __('Редактировать') }}
                                        </x-dropdown-link>
                                        <x-dropdown-link
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-review-deletion-{{ $review->id }}')">
                                            {{ __('Удалить') }}
                                        </x-dropdown-link>
                                    </x-slot>
                                </x-dropdown>

                                <x-modal name="confirm-review-deletion-{{ $review->id }}" focusable>
                                    <form method="post" action="{{ route('reviews.destroy', $review->id) }}"
                                        class="p-6">
                                        @csrf
                                        @method('delete')

                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                            {{ __('Вы уверены, что хотите удалить этот отзыв?') }}
                                        </h2>

                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('После удаления отзыва он будет безвозвратно удален. Пожалуйста, подтвердите,
                                                                                                                                                                                                                                                                что вы хотите удалить этот отзыв.') }}
                                        </p>

                                        <div class="mt-6 flex justify-end">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Отменить') }}
                                            </x-secondary-button>

                                            <x-danger-button class="ms-3">
                                                {{ __('Удалить отзыв') }}
                                            </x-danger-button>
                                        </div>
                                    </form>
                                </x-modal>
                            @endcan
                        </div>
                        <div>
                            <p>{{ $review->value }}</p>
                        </div>
                    </x-card>
                @endforeach
                {{ $reviews->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
