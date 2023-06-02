<x-base-layout>
    <x-slot name="style">
        <style>
            .portfolio .portfolio-item .portfolio-info button:hover {
                color: red !important;
            }
        </style>


        {{-- {{ __('Dashboard') }} --}}
    </x-slot>
    <a href="{{ route('admin.pfe_exemples.create') }}" class="btn btn-primary">Ajouter nouvelle PFE Exemple</a>
    <!-- ======= PFE Exemple Section ======= -->
    <section id="pfe" class="portfolio">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>PFE</h2>
                <h3>Quelques réalisation <span>PFE</span></h3>
                <p></p>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($pfe_exemples as $pfe_exemple)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $pfe_exemple->filter_type }}">
                        <img src="{{ asset('storage/' . str_replace('public/', '', $pfe_exemple->image_path)) }}"
                            class="img-fluid" alt="">
                        <div class="portfolio-info ">
                            <h4>{{ $pfe_exemple->name }}</h4>
                            <p> {{ $pfe_exemple->description }} </p>
                            <form method="post" style="border: none"
                                action="{{ route('admin.pfe_exemples.destroy', ['pfe_exemple' => $pfe_exemple]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class=" preview-link" title="{{ $pfe_exemple->name }}"><i
                                        class="bi bi-trash-fill"></i></button>
                            </form>
                            <a href="portfolio-details.html" class="details-link" title="More Details"><i
                                    class="bi bi-arrow-down"></i></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</x-base-layout>
