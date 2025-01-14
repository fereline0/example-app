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
                                        {{ \Carbon\Carbon::parse($user->detail_information->birthday)->locale('ru')->translatedFormat('j F Y') }}
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

                @if ($user->resume)
                    <x-card>
                        <div class="space-y-2">
                            <header>
                                <h2 class="text-lg font-medium text-gray-800 dark:text-gray-200">
                                    {{ __('Резюме') }}
                                </h2>
                            </header>
                            <div class="grid sm:grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-2">
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Город') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->city->name ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Тип работы') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->workType->name ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Расписание работы') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->workSchedule->name ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Опыт работы') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->experience->name ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Образование') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->background->name ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Подробности об образовании') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->detail_background ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Подробности об опыте работы') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->detail_experience ?? 'Не указано' }}</p>
                                </div>

                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Зарплата') }}</p>
                                    <p class="dark:text-white font-medium">
                                        {{ $user->resume->salary ? number_format($user->resume->salary) . ' рублей в месяц' : 'Не указано' }}
                                    </p>
                                </div>
                            </div>

                            @if (count($user->resume->skills) > 0)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                    <p class="text-gray-500">{{ __('Навыки') }}</p>
                                    <div class="flex flex-wrap py-2 gap-2">
                                        @foreach ($user->resume->skills as $skill)
                                            <x-chip>{{ $skill->name }}</x-chip>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    </x-card>
                @endif

                @auth
                    @if ($user->id !== auth()->id())
                        <x-card>
                            <form action="{{ route('users.reviews.store', $user->id) }}" method="POST" class="space-y-6">
                                @csrf
                                @method('post')

                                <div>
                                    <x-textarea id="value" name="value" placeholder="Оставьте ваш отзыв" required />
                                    <x-input-error class="mt-2" :messages="$errors->get('value')" />
                                </div>

                                <div class="flex items-center">
                                    <x-checkbox id="anonymity" name="anonymity" value="1" />
                                    <x-input-label for="anonymity" :value="__('Оставить анонимный отзыв')" />
                                </div>

                                <x-primary-button>
                                    Опубликовать
                                </x-primary-button>
                            </form>
                        </x-card>
                    @endif
                @endauth

                @if (count($reviews) > 0)
                    @foreach ($reviews as $review)
                        <x-card class="space-y-2">
                            <div class="flex justify-between gap-4">
                                <div>
                                    @if ($review->anonymity)
                                        <h3 class="text-lg font-semibold text-gray-600 dark:text-gray-400">Предпочел
                                            остаться анонимным</h3>
                                    @else
                                        <x-link href="{{ route('users.show', $review->author->id) }}">
                                            <h3 class="text-lg font-semibold">{{ $review->author->name }}</h3>
                                        </x-link>
                                        <p class="text-gray-600 dark:text-gray-400">{{ $review->author->email }}
                                        </p>
                                    @endif
                                </div>
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
                                                {{ __('После удаления отзыва он будет безвозвратно удален. Пожалуйста, подтвердите, что вы хотите удалить этот отзыв.') }}
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
                                <p class="text-gray-600 dark:text-gray-400">{{ $review->value }}</p>
                            </div>
                        </x-card>
                    @endforeach
                    {{ $reviews->links() }}
                @else
                    <x-card>
                        <div class="text-center">
                            <p class="text-lg text-gray-800 dark:text-gray-200">
                                Список отзывов пуст
                            </p>
                        </div>
                    </x-card>

                @endif
            </div>
        </div>
    </div>
</x-app-layout>
