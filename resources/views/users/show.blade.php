<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="space-y-6">
            <x-card>
              <h3 class="text-lg text-black dark:text-white font-semibold">{{ $user->name }}</h3>
                  @if ($user->detail_information)
                      <p class="text-gray-800 dark:text-gray-200">{{ $user->detail_information->about }}</p>
                  @endif
              <p class="text-gray-800 dark:text-gray-200">{{ $user->email }}</p>
            </x-card>
            @if ($works)
              @foreach ($works as $work)
                <x-card>
                  <img src="{{ asset($work->image) }}">
                </x-card>
              @endforeach
            @endif
            {{ $works->links() }}
          </div>
      </div>
  </div>
</x-app-layout>