<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создать вакансию') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form method="post" action="{{ route('vacancies.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="title" :value="__('Название')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Описание')" />
                        <x-textarea id="description" name="description" required></x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="city_id" :value="__('Город')" />
                        <x-select id="city_id" name="city_id" class="mt-1 block w-full" required>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
                    </div>

                    <div>
                        <x-input-label for="work_type_id" :value="__('Тип работы')" />
                        <x-select id="work_type_id" name="work_type_id" class="mt-1 block w-full" required>
                            @foreach ($workTypes as $workType)
                                <option value="{{ $workType->id }}">{{ $workType->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('work_type_id')" />
                    </div>

                    <div>
                        <x-input-label for="salary" :value="__('Зарплата в месяц (в рублях)')" />
                        <x-text-input id="salary" name="salary" type="number" class="mt-1 block w-full"
                            step="0.01" min="0" required />
                        <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                    </div>

                    <div>
                        <x-input-label for="work_schedule_id" :value="__('Расписание работы')" />
                        <x-select id="work_schedule_id" name="work_schedule_id" class="mt-1 block w-full" required>
                            @foreach ($workSchedules as $workSchedule)
                                <option value="{{ $workSchedule->id }}">{{ $workSchedule->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('work_schedule_id')" />
                    </div>

                    <div>
                        <x-input-label for="experience_id" :value="__('Опыт работы')" />
                        <x-select id="experience_id" name="experience_id" class="mt-1 block w-full" required>
                            @foreach ($experiences as $experience)
                                <option value="{{ $experience->id }}">{{ $experience->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('experience_id')" />
                    </div>

                    <div>
                        <x-input-label for="education_id" :value="__('Образование')" />
                        <x-select id="education_id" name="education_id" class="mt-1 block w-full" required>
                            @foreach ($education as $e)
                                <option value="{{ $e->id }}">{{ $e->name }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('education_id')" />
                    </div>

                    <div>
                        <x-input-label :value="__('Навыки')" />
                        <div class="mt-2 flex flex-wrap gap-4">
                            @foreach ($skills as $skill)
                                <x-checkbox id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}"
                                    label="{{ $skill->name }}" />
                            @endforeach
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('skills')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Создать') }}</x-primary-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
