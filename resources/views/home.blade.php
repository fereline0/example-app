<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            @foreach ($users as $user)
                <x-card>
                    <x-user-preview :name="$user->name" :description="$user->email" :href="route('users.show', $user->id)" />    
                </x-card>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>