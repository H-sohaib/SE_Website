<div
    class="col-lg-4 col-md-6 portfolio-item @foreach (explode('|', $pfe_exemple->filter_type) as $key => $value){{ 'filter-' . $value }} @endforeach">
    <img src="{{ asset('storage/' . str_replace('public/', '', $pfe_exemple->image_path)) }}" class="img-fluid"
        alt="">
    <div class="card-body">
        <h5 class="card-title">{{ $pfe_exemple->name }}</h5>
        <p class="card-text">
            {{ $pfe_exemple->description }}
        </p>
        <p class="card-text mb-0">
            <strong>Type de PFE : </strong>
            {{ $pfe_exemple->filter_type }}
        </p>
        <small class="d-flex justify-content-center">
            <p class="m-0">Date de création : {{ $pfe_exemple->created_at }}</p>
            <p class="m-0">
                Date de mise à jour : {{ $pfe_exemple->updated_at }}</p>
        </small>
        <div class="card-text d-flex align-items-center">
            <div class="text-danger m-0 p-0">
                <form method="post" style="border: none" class="m-0 p-0"
                    action="{{ route('admin.pfe_exemples.destroy', ['pfe_exemple' => $pfe_exemple]) }}">
                    @csrf
                    @method('delete')
                    <button type="submit" class="preview-link text-danger p-0" title="{{ $pfe_exemple->name }}"><i
                            class="bi bi-trash-fill"></i> Delete</button>
                </form>
            </div>
            <a href="{{ route('view_pdf', ['pfe_exemple' => $pfe_exemple]) }}" class="details-link preview-link ms-2"
                title="View Rapport"><i class="bi bi-eye-fill"></i> Voir le rapport</a>
            <a href="{{ route('admin.pfe_exemples.edit', ['pfe_exemple' => $pfe_exemple]) }}" class="ms-2"><i
                    class="bi bi-pencil-square"></i>
                Edit</a>

        </div>
    </div>
</div>
