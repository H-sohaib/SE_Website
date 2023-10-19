<x-admin-layout>
    <x-slot name="style">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <link rel="stylesheet" href="{{ asset('build/assets/app-a46e077c.css') }}">
        <script src="{{ asset('build/assets/app-da59565c.js') }}" defer></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

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
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->email_verified_at ? 'Oui' : 'Non' }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td>
                        <section class="p-0">
                            <x-danger-button data-modal-target="confirm-user-deletion-{{ $admin->id }}"
                                data-modal-toggle="confirm-user-deletion-{{ $admin->id }}">
                                {{ __('Supprimer le compte') }}
                            </x-danger-button>

                            <x-admin-model
                                modelTitle="Êtes-vous sûr de vouloir supprimer votre compte ? Saisir votre mode
                            passe :"
                                modelId="confirm-user-deletion-{{ $admin->id }}">

                                <form method="post" action="{{ route('profile.destroy') }}" class="p-0 m-0">
                                    @csrf
                                    @method('delete')
                                    <div>
                                        <x-input-label for="password" value="{{ __('Mot de passe') }}"
                                            class="sr-only" />

                                        <x-text-input name="password" type="password" class="mt-1 mb-2 w-full"
                                            placeholder="{{ __('Password') }}" />
                                        <input type="hidden" name="id" value='{{ $admin->id }}'>
                                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                    </div>

                                    <button type="submit"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Supprimer le compte
                                    </button>
                                </form>

                            </x-admin-model>
                            {{-- <div id="confirm-user-deletion-{{ $admin->id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-hide="confirm-user-deletion-{{ $admin->id }}">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>

                                        <div class="p-6 text-center">
                                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <h3 class="mb-1 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                Êtes-vous sûr de vouloir supprimer votre compte ? Saisir votre mode
                                                passe :
                                            </h3>

                                            <form method="post" action="{{ route('profile.destroy') }}"
                                                class="p-0 m-0">
                                                @csrf
                                                @method('delete')
                                                <div>
                                                    <x-input-label for="password" value="{{ __('Mot de passe') }}"
                                                        class="sr-only" />

                                                    <x-text-input name="password" type="password"
                                                        class="mt-1 mb-2 w-full" placeholder="{{ __('Password') }}" />
                                                    <input type="hidden" name="id" value='{{ $admin->id }}'>
                                                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                                                </div>



                                                <button type="submit"
                                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                    Supprimer le compte
                                                </button>
                                                <button data-modal-hide="confirm-user-deletion-{{ $admin->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                    Annuler
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}


                            {{-- <x-modal name="confirm-user-deletion-{{ $admin->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
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

                                        <x-text-input name="password" type="password" class="mt-1 block w-3/4"
                                            placeholder="{{ __('Password') }}" />
                                        <input type="hidden" name="id" value='{{ $admin->id }}'>
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
                            </x-modal> --}}
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
