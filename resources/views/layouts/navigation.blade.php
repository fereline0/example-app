<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-between h-16">
            <div class="shrink-0 flex items-center">
                <x-link href="{{ route('vacancies.index') }}">
                    <h2 class="text-xl font-medium">{{ config('app.name', 'Laravel') }}</h2>
                </x-link>
            </div>

            <div class="flex gap-4 flex-wrap items-center">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('users.show', Auth::user()->id)">
                                {{ __('Мой профиль') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('users.edit', Auth::user()->id)">
                                {{ __('Редактировать') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link href="#"
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-logout')">
                                    {{ __('Выйти') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex gap-4">
                        <x-link href="{{ route('login') }}">
                            {{ __('Войти') }}
                        </x-link>
                        <x-link href="{{ route('register') }}">
                            {{ __('Регистрация') }}
                        </x-link>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<x-modal name="confirm-logout" :show="false" focusable>
    <form method="POST" action="{{ route('logout') }}" class="p-6">
        @csrf

        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Вы уверены, что хотите выйти?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Вы будете выведены из своей учетной записи. Вы уверены, что хотите продолжить?') }}
        </p>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Отменить') }}
            </x-secondary-button>

            <x-danger-button class="ms-3" type="submit">
                {{ __('Выйти') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>
