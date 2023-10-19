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

            .input {
                padding: 0px 10px;
                padding-left: 10px;
            }

            .input:focus {
                border: 2px solid red
            }
        </style>
    </x-slot>
    <ul class="list-group">


        <form class="m-0 p-0" method="POST"
            action="{{ route('admin.pfe_types.update', ['pfe_type' => $editable_type]) }}">
            @method('PATCH')
            @csrf
            <div class="item list-group-item align-items-center">
                <input name="type_name" autofocus class="form-control w-75" value="{{ $editable_type->type_name }}" />
                <div class="d-flex">
                    <button class="m-0 p-2 pt-1 pb-1 btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </form>




        @foreach ($pfe_types as $pfe_type)
            <div class="item list-group-item align-items-center pfe-types">
                <li class="text-capitalize">{{ $pfe_type->type_name }}</li>
            </div>
        @endforeach

    </ul>

    <div class="w-100 d-flex justify-content-center mt-3">
        <a href="{{ route('admin.pfe_types.index') }}">
            <button class="ms-auto me-auto btn btn-primary" type="submit">Annuler</button>
        </a>
    </div>



    {{-- <div class="p-3 ps-md-5 pe-md-5">
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
    </div> --}}

    {{-- <x-note>
        Si vous avez déjà ajouté des exemples de PFE, toute mise à jour ou
        suppression d'un type nécessite de vous rendre dans les exemples de PFE et de mettre à jour le filtre
        correspondant au type.
    </x-note> --}}

</x-admin-layout>
