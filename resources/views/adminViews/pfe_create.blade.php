<x-admin-layout>
    <div class="section-title pb-0">
        <h3 class="mt-0"> Ajouter réalisation <span>PFE</span></h3>
        <p class="m-0"></p>
    </div>


    <div class="container d-flex justify-content-center">
        <form method="POST" action="{{ route('admin.pfe_exemples.store') }}" enctype="multipart/form-data"
            class="row g-3 m-0 w-75">
            @csrf
            {{-- name  --}}
            <div class="col-12">
                <label for="inputAddress" class="form-label">Titre de PFE</label>
                <input name="name" type="text" class="form-control" required>
                <x-input-error :messages="$errors->get('name')" />
            </div>
            {{-- description --}}
            <div class="col-12">
                <div class="form-outline">
                    <label class="form-label" for="textAreaExample">Description</label>
                    <textarea name="description" class="form-control" id="textAreaExample1" rows="4"></textarea>
                    <x-input-error :messages="$errors->get('description')" />
                </div>
            </div>
            {{-- image uplaod --}}
            <div class="col-6">
                <label class="form-label" for="customFile">Image de PFE</label>
                <input name="image" type="file" class="form-control" required />
                <x-input-error :messages="$errors->get('image')" />
            </div>
            {{-- pdf uplaod --}}
            <div class="col-6">
                <label class="form-label" for="customFile">Rapport de PFE</label>
                <input name="pdf" type="file" class="form-control" id="customFile" />
                <x-input-error :messages="$errors->get('pdf')" />
            </div>
            {{-- filter type  --}}
            <div class="col-7">
                <label for="inputState" class="form-label">Type de PFE <span class="text-muted">(Vous pouvez
                        sélectionner plusieurs types)</span></label>
                @foreach ($pfe_types as $pfe_type)
                    <div class="form-check">
                        <input name="{{ $pfe_type->type_name }}" value="{{ $pfe_type->type_name }}"
                            class="form-check-input" type="checkbox" id="flexCheckDefault" />
                        <label class="form-check-label" for="flexCheckDefault">{{ $pfe_type->type_name }}</label>
                    </div>
                @endforeach
            </div>



            {{-- 
            <div class="col-6">
                <label for="inputState" class="form-label">Type de PFE</label>
                <select name="filter_type" class="form-select" required>
                    <option value="" selected>choisir...</option>
                    @foreach ($pfe_types as $pfe_type)
                        <option value="{{ $pfe_type->type_name }}">{{ $pfe_type->type_name }}</option>
                    @endforeach
                </select>
            </div> --}}

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Créer</button>
            </div>

        </form>
    </div>
</x-admin-layout>
