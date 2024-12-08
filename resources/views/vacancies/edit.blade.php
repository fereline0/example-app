<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Редактировать вакансию') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-card>
                <form method="post" action="{{ route('vacancies.update', $vacancy->id) }}" class="space-y-6">
                    @csrf
                    @method('patch')

                    <div>
                        <x-input-label for="title" :value="__('Название')" />
                        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                            :value="old('title', $vacancy->title)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('title')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Описание')" />
                        <x-textarea id="description" name="description" required>{{ old('description',
                            $vacancy->description) }}</x-textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <x-input-label for="city_id" :value="__('Город')" />
                        <x-select id="city_id" name="city_id" class="mt-1 block w-full" required>
                            @foreach ($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id', $vacancy->city_id) == $city->id ?
                                'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
                    </div>

                    <div>
                        <x-input-label for="work_type_id" :value="__('Тип работы')" />
                        <x-select id="work_type_id" name="work_type_id" class="mt-1 block w-full" required>
                            @foreach ($workTypes as $workType)
                            <option value="{{ $workType->id }}" {{ old('work_type_id', $vacancy->work_type_id) ==
                                $workType->id ? 'selected' : '' }}>
                                {{ $workType->type }}
                            </option>
                            @endforeach
                        </x-select>
                        <x-input-error class="mt-2" :messages="$errors->get('work_type_id')" />
                    </div>

                    <div>
                        <x-input-label for="salary" :value="__('Зарплата в месяц (в рублях)')" />
                        <x-text-input id="salary" name="salary" type="number" class="mt-1 block w-full" step="0.01"
                            min="0" :value="old('salary', $vacancy->salary)" required />
                        <x-input-error class="mt-2" :messages="$errors->get('salary')" />
                    </div>

                    <div>
                        <x-input-label :value="__('Навыки')" />
                        <div class="mt-2 flex gap-4">
                            @foreach ($skills as $skill)
                            <x-checkbox id="skill_{{ $skill->id }}" name="skills[]" value="{{ $skill->id }}"
                                label="{{ $skill->name }}"
                                :checked="in_array($skill->id, old('skills', $vacancy->skills->pluck('id')->toArray()))" />
                            @endforeach
                        </div>
                        <x-input-error class="mt-2" :messages="$errors->get('skills')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>