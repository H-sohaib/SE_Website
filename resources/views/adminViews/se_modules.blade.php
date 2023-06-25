<x-admin-layout>
    <x-slot name="style">
        <style>
            .edit {
                cursor: pointer;
                color: blue
            }

            td>span:focus {
                padding: 5px;
                outline: none;
                border: 2px solid blue;
                border-radius: 3px;
            }

            .submit {
                /* position: relative;
                left: 50%;
                transform: translateX(-50%) */
            }

            a[role="button"] {
                position: relative;
                left: 0;
            }

            .delete {
                color: red;
                cursor: pointer;
            }
        </style>
    </x-slot>
    {{-- ======= organisation-modulaire ============     --}}
    <div class="alert d-none" role="alert">
    </div>

    <section id="organisation-modulaire" class="section-bg mt-0 p-0">
        <div class="container">
            <div class="section-title pb-1">
                <h2>Organisation modulaire</h2>
                <h3><span></span></h3>
                <p></p>
            </div>

            <div class="row justify-content-center">
                <div class="overflow-auto col-12">
                    <table class="table mb-0">
                        <thead style="background-color: #002d72;">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">N°</th>
                                <th scope="col">Intitulé</th>
                                <th scope="col">Élément(s) de module</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semestres as $semestre)
                                {{-- calc the N° of module with no matieres --}}
                                @php
                                    $module_with_no_matiere = 0;
                                @endphp
                                @foreach ($semestre->modules as $module)
                                    @if ($module->matieres->isEmpty())
                                        @php
                                            $module_with_no_matiere++;
                                        @endphp
                                    @endif
                                @endforeach
                                <div>
                                    <tr>
                                        <td class="text-capitalize"
                                            rowspan="{{ count($semestre->matieres) + $module_with_no_matiere + 1 }}">
                                            {{ $semestre->semestre_name }}
                                        </td>
                                    </tr>
                                    @foreach ($semestre->modules as $module)
                                        {{-- loop over the modules --}}
                                        @php $first = true ; @endphp {{--   --}}
                                        @if ($module->matieres->count() > 0)
                                            {{-- if module has a matieres loop over it  --}}
                                            @foreach ($module->matieres as $matiere)
                                                {{-- loop over matieres in each module --}}
                                                @if ($first)
                                                    {{-- check if it's the first row in the module cuz has a deffirent struc --}}
                                                    <tr>
                                                        {{-- Module number --}}
                                                        <td rowspan="{{ count($module->matieres) }}">
                                                            <span class="module-num"
                                                                data-moduleNum="{{ $module->id }}">M{{ $module->module_num }}</span>
                                                            <i class="bi bi-pencil-square edit"></i>
                                                        </td>
                                                        {{-- Module name --}}
                                                        <td rowspan="{{ count($module->matieres) }}">
                                                            <span
                                                                data-module="{{ $module->id }}">{{ $module->module_name }}</span>
                                                            <i class="bi bi-pencil-square edit"></i>
                                                            <x-delete-form
                                                                route="{{ route('admin.organisation_modulaire.destroy', ['organisation_modulaire' => $module]) }}"
                                                                value="module">
                                                            </x-delete-form>
                                                        </td>
                                                        {{-- name of first matiere in the module --}}
                                                        <td>
                                                            <span
                                                                data-matiere="{{ $matiere->id }}">{{ $matiere->matiere_name }}</span>
                                                            <i class="bi bi-pencil-square edit"></i>
                                                            <x-delete-form
                                                                route="{{ route('admin.organisation_modulaire.destroy', ['organisation_modulaire' => $matiere]) }}"
                                                                value="matiere">
                                                            </x-delete-form>
                                                        </td>
                                                    </tr>
                                                    @php $first = false ; @endphp
                                                @else
                                                    {{-- show the rest of the matieres --}}
                                                    <tr>
                                                        <td>
                                                            <span
                                                                data-matiere="{{ $matiere->id }}">{{ $matiere->matiere_name }}</span>
                                                            <i class="bi bi-pencil-square edit"></i>
                                                            <x-delete-form
                                                                route="{{ route('admin.organisation_modulaire.destroy', ['organisation_modulaire' => $matiere]) }}"
                                                                value="matiere">
                                                            </x-delete-form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @else
                                            {{-- if module has no matiere   --}}
                                            <tr>
                                                <td class="module-num" data-moduleNum="{{ $module->id }}">
                                                    <span>M{{ $module->module_num }}</span>
                                                    <i class="bi bi-pencil-square edit"></i>
                                                </td>

                                                <td>
                                                    <span data-module="{{ $module->id }}">{{ $module->module_name }}
                                                    </span><i class="bi bi-pencil-square edit"></i>
                                                    <x-delete-form
                                                        route="{{ route('admin.organisation_modulaire.destroy', ['organisation_modulaire' => $module]) }}"
                                                        value="module">
                                                    </x-delete-form>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mt-3">
                <button class="submit btn btn-primary">
                    Mettre à jour</button>
                <a class="btn btn-primary" href="{{ route('admin.organisation_modulaire.create') }}" role="button">
                    Ajouter un nouveau</a>
            </div>
        </div>
    </section>
    <x-note>
        Si vous ajoutez un nouveau module dans le S1, S2 ou S3, le numéro du module aura l'air désordonné. Pour corriger
        cela, vous devrez mettre à jour manuellement le numéro du module
    </x-note>

    <x-slot name="script">
        <script src="{{ asset('assets/js/update_se_modules.js') }}"></script>
        <script src="{{ asset('assets/js/jQuery-3.7.1.min.js') }}"></script>
    </x-slot>
</x-admin-layout>
