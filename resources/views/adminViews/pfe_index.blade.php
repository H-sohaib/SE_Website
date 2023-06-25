<x-admin-layout>
    <x-slot name="style">
        <style>
            .portfolio {
                /* margin-top: 50px !important; */
            }

            section {
                padding: 0;
                margin: 0;
                /* overflow: auto !important; */
            }

            .portfolio .portfolio-item .portfolio-info button:hover {
                color: red !important;
            }

            .portfolio .portfolio-item .portfolio-info button {
                background-color: inherit;
            }

            .add-button {
                position: relative;
                left: 50%;
                transform: translateX(-50%)
            }

            button {
                background-color: inherit;
            }

            small {
                font-size: 10px
            }
        </style>
    </x-slot>
    <!-- ======= PFE Exemple Section ======= -->
    <section id="pfe" class="portfolio">
        <div class="container position-relative" data-aos="fade-up">

            <div class="section-title pb-0">
                <h3 class="mt-0">Quelques réalisation <span>PFE</span></h3>
                <p></p>
            </div>

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Tout</li>
                        @foreach ($pfe_types as $pfe_type)
                            <li data-filter=".filter-{{ $pfe_type->type_name }}">{{ $pfe_type->type_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                @foreach ($pfe_exemples as $pfe_exemple)
                    @include('components.portfolio-card', ['pfe_exemple' => $pfe_exemple])
                @endforeach
            </div>
        </div>


        <a href="{{ route('admin.pfe_exemples.create') }}" class="btn btn-primary add-button">Ajouter un nouveau
            PFE</a>
    </section>




    <x-slot name="script">
        <!-- Template Main JS File -->
        <script src="{{ asset('assets/js/admin_filter.js') }}"></script>



        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script src="{{ asset('assets/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    </x-slot>
</x-admin-layout>
