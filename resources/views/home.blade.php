<x-app-layout>
    <x-slot name="header">
        <form method="GET" action="{{ route('home') }}" class="space-y-2">
            <x-text-input type="text" name="query" placeholder="Поиск" class="w-full" value="{{ request('query') }}" />

            <x-text-input type="number" name="min_salary" placeholder="Минимальная зарплата" class="w-full" step="0.01"
                value="{{ request('min_salary') }}" />

            <div class="flex flex-wrap gap-2">
                <x-select name="sort_by">
                    <option value="updated_at" {{ request('sort_by')=='updated_at' ? 'selected' : '' }}>Дата обновления
                    </option>
                    <option value="title" {{ request('sort_by')=='title' ? 'selected' : '' }}>Название</option>
                    <option value="salary" {{ request('sort_by')=='salary' ? 'selected' : '' }}>Зарплата</option>
                </x-select>
                <x-select name="sort_order">
                    <option value="desc" {{ request('sort_order')=='desc' ? 'selected' : '' }}>По убыванию</option>
                    <option value="asc" {{ request('sort_order')=='asc' ? 'selected' : '' }}>По возрастанию</option>
                </x-select>
            </div>

            <x-primary-button type="submit">Поиск</x-primary-button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @auth
            <div class="flex justify-end">
                <x-link href="{{ route('vacancies.create') }}">
                    Создать вакансию
                </x-link>
            </div>
            @endauth

            @foreach ($vacancies as $vacancy)
            <x-card>
                <h3 class="text-lg font-semibold">
                    <x-link href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->title }}</x-link>
                </h3>
                @if ($vacancy->salary)
                <h3 class="text-lg dark:text-white font-semibold">{{ number_format($vacancy->salary, 2) }} ₽
                    в месяц</h3>
                @endif
                <div class="flex items-center flex-wrap gap-2">
                    <x-link href="{{ route('users.show', $vacancy->user->id) }}">{{ $vacancy->user->name }}</x-link>
                    <x-text-separator />
                    <p class="dark:text-white">{{ $vacancy->city->name }}</p>
                    <x-text-separator />
                    <p class="dark:text-white">{{ $vacancy->workType->type }}</p>
                    <x-text-separator />
                    <p class="dark:text-white">{{ $vacancy->updated_at->locale('ru')->diffForHumans() }}</p>
                </div>
            </x-card>
            @endforeach
            {{ $vacancies->links() }}
        </div>
    </div>
</x-app-layout>