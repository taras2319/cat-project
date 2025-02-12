<section class="space-y-6">
    <div>
        <h2 class="fw-bold text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Видалити Акаунт*(') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Після видалення вашого облікового запису всі його ресурси та дані буде остаточно видалено. Перш ніж видаляти свій обліковий запис, завантажте будь-які дані чи інформацію, які ви хочете зберегти') }}
        </p>
    </div>

    <x-danger-button
        class="btn btn-danger btn-sm"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Видалити') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Не покидай нас...') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Якщо ти впевнений, тоді прощавай...') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Пароль') }}" class="sr-only fw-bold" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Відмінити)') }}
                </x-secondary-button>

                <x-danger-button class="btn btn-danger btn-sm ms-3">
                    {{ __('Видалити:(') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
