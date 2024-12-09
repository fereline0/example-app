<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Редактировать отзыв') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <x-card>
        <form method="post" action="{{ route('reviews.update', $review->id) }}" class="space-y-6">
          @csrf
          @method('patch')

          <div>
            <x-input-label for="value" :value="__('Текст отзыва')" />
            <x-textarea id="value" name="value" required>{{ old('value', $review->value) }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('value')" />
          </div>

          <x-primary-button>{{ __('Сохранить') }}</x-primary-button>
        </form>
      </x-card>
    </div>
  </div>
</x-app-layout>