<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Вакансия') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-6">
                <x-card>
                    <div class="space-y-2">
                        <div class="flex flex-col sm:flex-row justify-between gap-2">
                            <div>
                                <h3 class="text-lg dark:text-white font-semibold">{{ $vacancy->title }}</h3>
                                @if ($vacancy->salary)
                                    <h3 class="text-lg dark:text-white font-semibold">
                                        {{ number_format($vacancy->salary) }} ₽
                                        в месяц</h3>
                                @endif
                                @if (count($vacancy->skills) > 0)
                                    @auth
                                        <p class="text-lg dark:text-white font-semibold">
                                            Подходит вам на {{ number_format($percentage) }}% согласно вашим навыкам в
                                            резюме
                                        </p>
                                    @endauth
                                @endif

                            </div>
                            @auth
                                <div class="flex gap-2">
                                    @if (!$vacancy->users()->where('user_id', Auth::id())->exists())
                                        <form action="{{ route('vacancies.applys.store', $vacancy->id) }}" method="POST">
                                            @csrf
                                            @method('post')
                                            <x-primary-button type="submit">Откликнуться</x-primary-button>
                                        </form>
                                    @else
                                        <form action="{{ route('vacancies.applys.destroy', $vacancy->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button type="submit">Отменить</x-danger-button>
                                        </form>
                                    @endif

                                    @can('edit', $vacancy->user)
                                        <x-dropdown align="right" width="48">
                                            <x-slot name="trigger">
                                                <x-primary-button>Действия</x-primary-button>
                                            </x-slot>

                                            <x-slot name="content">
                                                <x-dropdown-link :href="route('vacancies.applys.show', $vacancy->id)">
                                                    {{ __('Отклики') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link :href="route('vacancies.edit', $vacancy->id)">
                                                    {{ __('Редактировать') }}
                                                </x-dropdown-link>
                                                <x-dropdown-link
                                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-vacancy-deletion')">
                                                    {{ __('Удалить') }}
                                                </x-dropdown-link>
                                            </x-slot>
                                        </x-dropdown>
                                    @endcan

                                    <x-modal name="confirm-vacancy-deletion" focusable>
                                        <form method="post" action="{{ route('vacancies.destroy', $vacancy->id) }}"
                                            class="p-6">
                                            @csrf
                                            @method('delete')

                                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                {{ __('Вы уверены, что хотите удалить эту вакансию?') }}
                                            </h2>

                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('После удаления вакансии все её ресурсы и данные будут
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            безвозвратно удалены. Пожалуйста, подтвердите, что вы хотите безвозвратно
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            удалить
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            эту вакансию.') }}
                                            </p>

                                            <div class="mt-6 flex justify-end">
                                                <x-secondary-button x-on:click="$dispatch('close')">
                                                    {{ __('Отменить') }}
                                                </x-secondary-button>

                                                <x-danger-button class="ms-3">
                                                    {{ __('Удалить вакансию') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                    </x-modal>
                                </div>
                            @endauth
                        </div>
                        <div class="grid sm:grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-2">
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Работодатель</p>
                                <x-link class="font-medium"
                                    href="{{ route('users.show', $vacancy->user->id) }}">{{ $vacancy->user->name }}</x-link>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Город</p>
                                <p class="dark:text-gray-200 font-medium">{{ $vacancy->city->name }}</p>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Тип работы</p>
                                <p class="dark:text-gray-200 font-medium">{{ $vacancy->workType->name }}</p>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Расписание работы</p>
                                <p class="dark:text-gray-200 font-medium">{{ $vacancy->workSchedule->name }}</p>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Опыт работы</p>
                                <p class="dark:text-gray-200 font-medium">{{ $vacancy->experience->name }}</p>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Образование</p>
                                <p class="dark:text-gray-200 font-medium">{{ $vacancy->background->name }}</p>
                            </div>

                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">Обновлено</p>
                                <p class="dark:text-gray-200 font-medium">
                                    {{ $vacancy->updated_at->locale('ru')->diffForHumans() }}</p>
                            </div>
                        </div>

                        @if (count($vacancy->skills) > 0)
                            <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                <p class="text-gray-500 dark:text-gray-300">{{ __('Навыки') }}</p>
                                <div class="flex flex-wrap py-2 gap-2">
                                    @foreach ($vacancy->skills as $skill)
                                        <x-chip>{{ $skill->name }}</x-chip>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </x-card>
                <x-card>
                    <p class="dark:text-white">{{ $vacancy->description }}</p>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
