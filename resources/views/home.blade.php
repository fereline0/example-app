<x-app-layout>
    <x-slot name="header">
        <form method="GET" action="{{ route('home') }}" class="space-y-2">
            <x-text-input type="text" name="query" placeholder="Поиск" class="w-full" value="{{ request('query') }}" />

            <div class="flex flex-wrap gap-2">
                <x-text-input type="number" name="min_salary" placeholder="Минимальная зарплата" class="w-56"
                    step="0.01" value="{{ request('min_salary') }}" />
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

            <div class="grid grid-cols-[repeat(auto-fill,minmax(240px,1fr))] gap-2">
                @foreach ($vacancies as $vacancy)
                <x-card class="p-2">
                    <div class="shadow-none p-4 rounded-lg bg-black space-y-4">
                        <x-chip>
                            {{ $vacancy->updated_at->locale('ru')->diffForHumans() }}
                        </x-chip>
                        <div>
                            <a class="inline-flex items-center text-gray-200 hover:text-white focus:outline-none transition ease-in-out duration-150"
                                href="{{ route('users.show', $vacancy->user->id) }}">{{ $vacancy->user->name }}</a>
                            <h3 class="text-lg font-semibold">
                                <a class="inline-flex items-center text-gray-200 hover:text-white focus:outline-none transition ease-in-out duration-150"
                                    href="{{ route('vacancies.show', $vacancy->id) }}">{{ $vacancy->title }}</a>
                            </h3>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($vacancy->skills as $skill)
                            <x-chip>
                                {{ $skill->name }}
                            </x-chip>
                            @endforeach
                            <x-chip>+ {{ $vacancy->skills_count - 3 }}</x-chip>
                        </div>
                    </div>
                    <div class="p-4">
                        @if ($vacancy->salary)
                        <p class="dark:text-white font-semibold">{{ $vacancy->formattedSalary() }} ₽ в месяц</p>
                        @endif
                        <p class="dark:text-white">{{ $vacancy->city->name }}</p>
                    </div>
                </x-card>
                @endforeach
            </div>
            {{ $vacancies->links() }}
        </div>
    </div>
</x-app-layout>