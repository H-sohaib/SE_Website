<x-base-layout>

    <div class="container d-flex justify-content-center">
        <form method="POST" action="{{ route('admin.pfe_exemples.store') }}" enctype="multipart/form-data"
            class="row g-3 m-0 mt-5 w-50">
            @csrf
            {{-- name  --}}
            <div class="col-12">
                <label for="inputAddress" class="form-label">Titre d'exemple réalisation PFE</label>
                <input name="name" type="text" class="form-control" required>
            </div>
            {{-- description --}}
            <div class="col-12">
                <div class="form-outline">
                    <label class="form-label" for="textAreaExample">Description</label>
                    <textarea name="description" class="form-control" id="textAreaExample1" rows="4"></textarea>
                </div>
            </div>
            {{-- image uplaod --}}
            <div class="col-6">
                <label class="form-label" for="customFile">Image de PFE</label>
                <input name="image" type="file" class="form-control" required />
            </div>
            {{-- pdf uplaod --}}
            <div class="col-6">
                <label class="form-label" for="customFile">Rapport de PFE</label>
                <input name="pdf" type="file" class="form-control" id="customFile" />
            </div>
            {{-- filter type  --}}
            <div class="col-6">
                <label for="inputState" class="form-label">Type de PFE</label>
                <select name="filter_type" class="form-select" required>
                    <option value="" selected>Choose...</option>
                    <option value="filter-arduino">Arduino</option>
                    <option value="filter-web">Web</option>
                    <option value="filter-ai">Ai</option>
                </select>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>

        </form>
    </div>
</x-base-layout>
