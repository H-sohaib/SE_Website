<x-admin-layout>
    <x-slot name="style">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            thead th {
                color: black;
            }

            .add-button {
                position: relative;
                left: 50%;
                transform: translateX(-50%)
            }
        </style>
    </x-slot>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Email vérifié</th>
                <th scope="col">Créé le</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <th scope="row">{{ $admin->id }}</th>
                    <td> {{ $admin->name }} </td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->email_verified_at ? 'Oui' : 'Non' }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>
                        <section class="p-0">
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion-{{ $admin->id }}')">
                                {{ __('Supprimer le compte') }}
                            </x-danger-button>

                            <x-modal name="confirm-user-deletion-{{ $admin->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                <form method="post" action="{{ route('profile.destroy') }}" class="p-9 mt-10">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                        {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer votre compte de manière permanente.') }}
                                    </p>

                                    <div class="mt-6">
                                        <x-input-label for="password" value="{{ __('Mot de passe') }}"
                                            class="sr-only" />

                                        <x-text-input id="password" name="password" type="password"
                                            class="mt-1 block w-3/4" placeholder="{{ __('Password') }}" />

                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Annuler') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ml-3">
                                            {{ __('Supprimer le compte') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </section>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <a href="{{ route('admin.admin_management.create') }}" class="btn btn-primary add-button">
        Ajouter nouvel admin</a>


    <x-slot name="script">
    </x-slot>
</x-admin-layout>
