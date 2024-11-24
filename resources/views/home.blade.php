<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-2">
            @foreach ($users as $user)
                <x-user-preview :name="$user->name" :description="$user->email" :href="route('users.show', $user->id)" />    
            @endforeach
        </div>
    </div>
</x-app-layout>