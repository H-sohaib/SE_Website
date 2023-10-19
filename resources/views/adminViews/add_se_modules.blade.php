<x-admin-layout>

    <div class="section-title pb-0">
        <h3 class="mt-0"> Ajouter nouveau <span>module</span>/<span>matiere</span> </h3>
        <p class="m-0"></p>
    </div>


    <div class="container d-flex justify-content-center">
        <form method="POST" action="{{ route('admin.organisation_modulaire.store') }}" class="row g-3 m-0 w-75">
            @csrf
            {{-- chose what add (module / matiere)  --}}
            <div class="col-8">
                <label for="inputState" class="form-label">Que voulez-vous ajouter?</label>
                <select name="add_what" class="form-select add-what" required>
                    <option value="" selected>choisir...</option>
                    <option value="module">Module</option>
                    <option value="matiere">Matière</option>
                </select>
            </div>
            {{-- Choisissez le semestre où vous souhaitez ajouter le module  --}}
            <div class="col-6">
                <label for="inputState" class="form-label">Choisissez le semestre où vous souhaitez ajouter le
                    module</label>
                <select name="semestre" class="form-select module-field" required disabled>
                    <option value="" selected>choisir...</option>
                    @foreach ($semestres as $semestre)
                        <option class="text-capitalize" value="{{ $semestre->id }}">{{ $semestre->semestre_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{-- Choisissez le module où vous souhaitez ajouter la matière --}}
            <div class="col-6">
                <label for="inputState" class="form-label">Choisissez le module où vous souhaitez ajouter la
                    matière</label>
                <select name="module" class="form-select matiere-field" required disabled>
                    <option value="" selected>choisir...</option>
                    @foreach ($modules as $module)
                        <option value="{{ $module->id }}">{{ $module->module_name }}</option>
                    @endforeach
                </select>
            </div>
            {{-- type mpdule number & module name --}}
            <div class="col-12">
                <label for="inputAddress" class="form-label">Tapez le nom du nouveau module</label>
                <input name="new_module" type="text" class="form-control module-field" required disabled>
                <x-input-error :messages="$errors->get('new_module')" />
            </div>
            {{-- type mpdule number & module name --}}
            <div class="col-12">
                <label for="inputAddress" class="form-label">Tapez le nom du nouveau matiere</label>
                <input name="new_matiere" type="text" class="form-control matiere-field" required disabled>
                <x-input-error :messages="$errors->get('new_matiere')" />
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>

        </form>
    </div>


    <x-slot name="script">
        <script src="{{ asset('assets/js/create_se_modules.js') }}"></script>
    </x-slot>
</x-admin-layout>
