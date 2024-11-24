<x-app-layout>
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white p-4 dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
              <div class="flex flex-col gap-2">
                  <div>
                    <h2 class="text-xl font-semibold">{{ $user->name }}</h2>
                    @if ($user->detail_information)
                        <p class="text-gray-600">{{ $user->detail_information->about }}</p>
                    @endif
                    <p class="text-gray-600">{{ $user->email }}</p>
                  </div>
                  @if ($user->detail_information && $user->detail_information->images && count($user->detail_information->images) > 0)
                      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                          @foreach ($user->detail_information->images as $image)
                              <div class="bg-gray-200 rounded-lg overflow-hidden">
                                  <img src="{{ asset($image) }}" class="w-full h-auto">
                              </div>
                          @endforeach
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</x-app-layout>