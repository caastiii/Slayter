<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Kontua ezabatu') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Zure kontua ezabatzen denean, bere baliabide eta datu guztiak betiko ezabatuko dira. Kontua ezabatu aurretik, deskargatu gorde nahi duzun edozein datu edo informazio.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Ezabatu kontua') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Ziur zaude zure kontua ezabatu nahi duzula?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Zure kontua ezabatzen denean, bere baliabide eta datu guztiak betiko ezabatuko dira. Sartu zure pasahitza zure kontua betiko ezabatu nahi duzula berresteko.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Pasahitza') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Pasahitza') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Utzi') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Ezabatu kontua') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>