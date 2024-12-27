<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Удалить аккаунт') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('После удаления данного аккаунта все его ресурсы и данные будут безвозвратно удалены.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Удалить
                                                аккаунт') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('users.destroy', $user->id) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Вы уверены, что хотите удалить данный аккаунт?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Обратите внимание, что удаление аккаунта является необратимым процессом. Все данные, включая личную информацию и настройки, будут безвозвратно потеряны. Пожалуйста, убедитесь, что решение о продолжении удаления принято осознанно.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Отменить') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Удалить аккаунт') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
