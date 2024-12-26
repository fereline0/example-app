<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Детальная информация') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Обновите детальную информацию о данном пользователе.') }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('users.userDetailInformation.update', $user->id) }}" class="mt-6 space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="about" :value="__('О себе')" />
            <x-text-input id="about" name="about" type="text" class="mt-1 block w-full" :value="old('about', $user->detail_information->about)" />
            <x-input-error class="mt-2" :messages="$errors->get('about')" />
        </div>

        <div>
            <x-input-label for="gender" :value="__('Пол')" />
            <x-select id="gender" name="gender" class="mt-1 block w-full">
                <option value="none"
                    {{ old('gender', $user->detail_information->gender) === 'none' ? 'selected' : '' }}>
                    {{ __('Выберите пол') }}</option>
                <option value="male"
                    {{ old('gender', $user->detail_information->gender) === 'male' ? 'selected' : '' }}>
                    {{ __('Мужской') }}</option>
                <option value="female"
                    {{ old('gender', $user->detail_information->gender) === 'female' ? 'selected' : '' }}>
                    {{ __('Женский') }}</option>
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>

        <div>
            <x-input-label for="birthday" :value="__('Дата рождения')" />
            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->detail_information->birthday)" />
            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <div>
            <x-input-label for="phone_number" :value="__('Номер телефона')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                :value="old('phone_number', $user->detail_information->phone_number)" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <div>
            <x-input-label for="resume" :value="__('Загрузить резюме (PDF, DOC, DOCX)')" />
            <input type="file" name="resume" id="resume" class="mt-1 block w-full" accept=".pdf,.doc,.docx" />
            <x-input-error class="mt-2" :messages="$errors->get('resume')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'detail-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Сохранено.') }}</p>
            @endif
        </div>
    </form>
    @if ($user->detail_information && $user->detail_information->resume)
        <form class="mt-6" method="post"
            action="{{ route('users.userDetailInformation.deleteResume', $user->id) }}">
            @csrf
            @method('delete')
            <x-danger-button>{{ __('Удалить резюме') }}</x-danger-button>
        </form>
    @endif
</section>
