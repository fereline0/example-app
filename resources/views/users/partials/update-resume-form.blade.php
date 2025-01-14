<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Резюме') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Здесь вы можете обновить свое резюме, чтобы работодатели могли лучше понять ваши ожидания, навыки и опыт работы.') }}
        </p>
    </header>

    <form method="post" action="{{ route('users.resumes.update', $user->id) }}" class="space-y-6"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="city_id" :value="__('Город')" />
            <x-select id="city_id" name="city_id" class="mt-1 block w-full">
                <option value="">{{ __('Не имеет значения') }}</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}"
                        {{ isset($user->resume) && $user->resume->city_id == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
        </div>

        <div>
            <x-input-label for="work_schedule_id" :value="__('Расписание работы')" />
            <x-select id="work_schedule_id" name="work_schedule_id" class="mt-1 block w-full">
                <option value="">{{ __('Не имеет значения') }}</option>
                @foreach ($workSchedules as $workSchedule)
                    <option value="{{ $workSchedule->id }}"
                        {{ isset($user->resume) && $user->resume->work_schedule_id == $workSchedule->id ? 'selected' : '' }}>
                        {{ $workSchedule->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('work_schedule_id')" />
        </div>

        <div>
            <x-input-label for="work_type_id" :value="__('Тип работы')" />
            <x-select id="work_type_id" name="work_type_id" class="mt-1 block w-full">
                <option value="">{{ __('Не имеет значения') }}</option>
                @foreach ($workTypes as $workType)
                    <option value="{{ $workType->id }}"
                        {{ isset($user->resume) && $user->resume->work_type_id == $workType->id ? 'selected' : '' }}>
                        {{ $workType->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('work_type_id')" />
        </div>

        <div>
            <x-input-label for="salary" :value="__('Зарплата в месяц (в рублях)')" />
            <x-text-input id="salary" name="salary" type="number" class="mt-1 block w-full" step="0.01"
                min="0" value="{{ old('salary', isset($user->resume) ? $user->resume->salary : '') }}" />
            <x-input-error class="mt-2" :messages="$errors->get('salary')" />
        </div>

        <div>
            <x-input-label for="experience_id" :value="__('Опыт работы')" />
            <x-select id="experience_id" name="experience_id" class="mt-1 block w-full">
                @foreach ($experiences as $experience)
                    <option value="{{ $experience->id }}"
                        {{ isset($user->resume) && $user->resume->experience_id == $experience->id ? 'selected' : '' }}>
                        {{ $experience->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('experience_id')" />
        </div>

        <div>
            <x-input-label for="detail_experience" :value="__('Подробный опыт работы')" />
            <x-textarea id="detail_experience" name="detail_experience" class="mt-1 block w-full">
                {{ old('detail_experience', optional($user->resume)->detail_experience) }}
            </x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('detail_experience')" />
        </div>

        <div>
            <x-input-label for="background_id" :value="__('Образование')" />
            <x-select id="background_id" name="background_id" class="mt-1 block w-full">
                @foreach ($backgrounds as $background)
                    <option value="{{ $background->id }}"
                        {{ isset($user->resume) && $user->resume->background_id == $background->id ? 'selected' : '' }}>
                        {{ $background->name }}
                    </option>
                @endforeach
            </x-select>
            <x-input-error class="mt-2" :messages="$errors->get('background_id')" />
        </div>

        <div>
            <x-input-label for="detail_background" :value="__('Подробная информация об образовании')" />
            <x-textarea id="detail_background" name="detail_background" class="mt-1 block w-full">
                {{ old('detail_background', optional($user->resume)->detail_background) }}
            </x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('detail_background')" />
        </div>

        <div>
            <x-input-label :value="__('Навыки')" />
            <div class="mt-2 flex flex-wrap gap-4">
                @foreach ($skills as $skill)
                    <x-checkbox id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}"
                        label="{{ $skill->name }}" :checked="isset($user->resume) && $user->resume->skills->contains($skill->id)" />
                @endforeach
            </div>
            <x-input-error class="mt-2" :messages="$errors->get('skills')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Сохранить') }}</x-primary-button>

            @if (session('status') === 'resume-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Сохранено') }}</p>
            @endif
        </div>
    </form>
</section>
