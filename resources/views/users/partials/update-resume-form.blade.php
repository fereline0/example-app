<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Резюме') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Загрузите резюме, чтобы работодатели могли узнать о ваших навыках и опыте работе.') }}
        </p>
    </header>

    <form method="post" action="{{ route('users.resumes.update', $user->id) }}" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="resume" :value="__('Загрузить резюме (PDF, DOC, DOCX)')" />
            <input type="file" name="resume" id="resume" class="mt-1 block w-full dark:text-white"
                accept=".pdf,.doc,.docx" />
            <x-input-error class="mt-2" :messages="$errors->get('resume')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'resume-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Сохранено') }}</p>
            @endif
        </div>

        @if ($user->resume)
            <form class="mt-6" method="post" action="{{ route('users.resumes.destroy', $user->id) }}">
                @csrf
                @method('delete')
                <x-danger-button>{{ __('Удалить резюме') }}</x-danger-button>
            </form>
        @endif
    </form>
</section>
