<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <x-card>
      <x-link href="{{ route('vacancies.index') }}">
        <h2 class="text-xl font-medium">{{ config('app.name', 'Laravel') }}</h2>
      </x-link>
      <p class="mt-2 text-gray-600 dark:text-gray-400">
        Добро пожаловать на нашу платформу — уникальное пространство, где работодатели и соискатели встречаются для создания успешных карьерных историй. Мы предлагаем интуитивно понятный интерфейс и мощные инструменты для поиска работы и подбора персонала, чтобы сделать этот процесс максимально простым и эффективным.
      </p>
      <p class="mt-2 text-gray-600 dark:text-gray-400">
        Присоединяйтесь к нам и откройте для себя мир возможностей, где каждая вакансия — это шаг к вашей мечте, а каждый кандидат — это шанс для бизнеса найти идеального сотрудника.
      </p>
      @if ($socialInfos)
          <div class="mt-4">
              <x-link href="{{ $socialInfos->vk }}">
                  Мы в ВКонтакте
              </x-link>
              <span class="mx-2">|</span>
              <x-link href="{{ $socialInfos->tg }}">
                  Мы в Телеграм
              </x-link>            
          </div>
      @endif
  </x-card>
  <div class="py-6 text-center text-gray-600 dark:text-gray-400 text-sm">
      <p>© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. Все права защищены.</p>
  </div>
</div>