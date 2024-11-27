<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Edit') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-card>
              <form method="post" action="{{ route('works.update', $work->id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <div class="space-y-1">
                      <div>
                          <x-input-label for="title" :value="__('Title')" />
                          <x-text-input id="title" name="title" type="text" class="block w-full" value="{{ old('title', $work->title) }}" required />
                          <x-input-error :messages="$errors->get('title')" />
                      </div>

                      <div>
                          <x-input-label for="description" :value="__('Description')" />
                          <x-text-input id="description" name="description" type="text" class="block w-full" value="{{ old('description', $work->description) }}" />
                          <x-input-error :messages="$errors->get('description')" />
                      </div>

                      <div>
                          <x-input-label for="image" :value="__('Image')" />
                          <x-text-input id="image" name="image" type="file" class="block w-full" />
                          <img src="{{ asset('storage/' . $work->image) }}" class="mt-2 w-32 h-auto" />
                          <x-input-error :messages="$errors->get('image')" />
                      </div>
                  </div>
                  <x-primary-button class="mt-4">{{ __('Update') }}</x-primary-button>
              </form>
          </x-card>
      </div>
  </div>
</x-app-layout>