<x-admin-layout>
    <x-slot name="style">
        <style>
            .pfe-types:hover {
                z-index: 2;
                color: #fff;
                background-color: #0d6efd;
                border-color: #0d6efd;
                border-radius: 3px;
            }

            .item {
                display: flex;
                justify-content: space-between
            }

            .item>li {
                list-style: none;
            }

            .item i {
                font-size: 20px;
                padding: 0 5px
            }

            .item .delete i {
                color: #dc3545;
            }

            .delete {
                background-color: inherit;
            }

            .list-group-item:hover a i {
                color: #fff;
            }

            .edit {
                cursor: pointer;
                padding-left: 5px;
            }
        </style>
    </x-slot>
    <ul class="list-group">
        @foreach ($pfe_types as $pfe_type)
            <div class="item list-group-item align-items-center pfe-types">
                <li class="text-capitalize">{{ $pfe_type->type_name }}</li>

                <div class="d-flex">
                    <a href="{{ route('admin.pfe_types.edit', ['pfe_type' => $pfe_type]) }}"><i
                            class="bi bi-pencil-square edit"></i>
                    </a>

                    <form onsubmit="confirmDelete(this , event)" class="m-0 p-0" method="POST"
                        action="{{ route('admin.pfe_types.destroy', ['pfe_type' => $pfe_type]) }}">
                        @method('DELETE')
                        @csrf
                        <button class="m-0 p-0 delete" type="submit"><i class="bi bi-trash-fill"></i></button>
                    </form>
                    {{-- <a href=""><i class="bi bi-pencil-square"></i></a> --}}
                </div>

            </div>
        @endforeach
    </ul>
    <div class="p-3 ps-md-5 pe-md-5">
        <form method="POST" class="d-flex justify-content-center align-items-center"
            action="{{ route('admin.pfe_types.store') }}">
            @csrf
            <div class="form-outline flex-fill">
                <label class="form-label" for="form2">Nouveau type de PFE</label>
                <input name="type_name" placeholder="Write here..." type="text" id="form2" class="form-control"
                    required />
                <x-input-error :messages="$errors->get('type_name')" />
            </div>
            <button type="submit" class="btn btn-primary ms-2 align-self-end">Ajouter</button>
        </form>
    </div>

    <x-note>
        Lorsque vous supprimez un type, il disparaîtra de l'existence du PFE qui avait déjà ce type supprimé
    </x-note>

</x-admin-layout>
