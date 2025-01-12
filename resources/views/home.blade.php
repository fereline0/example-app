<x-app-layout>
    <div class="py-12 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="space-y-4 text-center my-12 lg:my-24 xl:my-48">
                <div class="space-y-2">
                    <h1 class="text-3xl font-bold text-gray-800 dark:text-gray-200">Добро пожаловать на
                        <x-link :href="route('vacancies.index')">{{ config('app.name', 'Laravel') }}</x-link>
                    </h1>
                    <p class="text-lg text-gray-600 dark:text-gray-400">
                        Платформу, которая соединяет работодателей и соискателей, предоставляя удобный и эффективный
                        способ
                        поиска работы и подбора персонала.
                    </p>
                </div>
                <div>
                    <x-link :href="route('vacancies.index')"><x-primary-button>Начать искать работу мечты</x-primary-button></x-link>
                </div>
            </div>

            <div class="space-y-4">
                <x-card class="space-y-2">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">О нас</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Наша цель - помочь людям найти работу своей мечты и работодателям - найти лучших специалистов.
                        Мы
                        предлагаем широкий выбор вакансий в различных отраслях и регионах.
                    </p>
                </x-card>

                <x-card class="space-y-2">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Преимущества</h2>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                        <li>Широкий выбор вакансий</li>
                        <li>Удобный интерфейс для поиска и фильтрации</li>
                        <li>Возможность загрузки резюме и откликов на вакансии</li>
                        <li>Поддержка пользователей через чат и электронную почту</li>
                    </ul>
                </x-card>

                <x-card class="space-y-2">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Как пользоваться сайтом</h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Чтобы начать, достаточно просто <x-link :href="route('register')">зарегистрироваться</x-link> на нашем
                        сайте, загрузить резюме и
                        начать <x-link :href="route('vacancies.index')">поиск</x-link> интересующей вас вакансии. Вы можете фильтровать
                        их по различным критериям,
                        таким как
                        зарплата, график и опыт
                        работы.
                    </p>
                </x-card>

                @if (count($reviews) > 0)
                    <x-card class="space-y-2">
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Огромное колличесвто
                            работодателей уже с нами</h2>
                        <div>
                            <p class="text-gray-600 dark:text-gray-400">
                                И уже есть отзывы о них
                            </p>
                        </div>
                    </x-card>

                    <div class="swiper-container">
                        <div class="swiper-wrapper" data-swiper-virtual>
                            @foreach ($reviews as $review)
                                <div class="swiper-slide">
                                    <x-card class="space-y-2">
                                        <div>
                                            <x-link href="{{ route('users.show', $review->author->id) }}">
                                                <h3 class="text-lg font-semibold">{{ $review->author->name }}</h3>
                                            </x-link>
                                            <p class="text-gray-600 dark:text-gray-400">
                                                Посвятил отзыв касаемо опыта работы на
                                                <x-link
                                                    href="{{ route('users.show', $review->user->id) }}">{{ $review->user->name }}</x-link>
                                            </p>
                                        </div>
                                        <div x-data="{ open: false }">
                                            <p class="text-gray-600 dark:text-gray-400">
                                                @if (strlen($review->value) <= 100)
                                                    {{ $review->value }}
                                                @else
                                                    <span
                                                        x-show="!open">{{ Str::limit($review->value, 100, '...') }}</span>
                                                    <span x-show="open">{{ $review->value }}</span>
                                                @endif
                                            </p>
                                            @if (strlen($review->value) > 100)
                                                <button @click="open = !open"
                                                    class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                                                    <span x-show="!open">Еще...</span>
                                                    <span x-show="open">Скрыть</span>
                                                </button>
                                            @endif
                                        </div>
                                    </x-card>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <x-card class="space-y-2">
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Контакты</h2>
                    <div>
                        <p class="text-gray-600 dark:text-gray-400">
                            Если у вас есть вопросы, вы можете связаться с нами:
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">Email: <x-link
                                href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</x-link></p>
                        <p class="text-gray-600 dark:text-gray-400">Телефон: <x-link
                                href="tel:{{ $contactInfo->phone }}">{{ $contactInfo->phone }}</x-link></p>
                    </div>
                </x-card>
            </div>
        </div>
    </div>
</x-app-layout>
