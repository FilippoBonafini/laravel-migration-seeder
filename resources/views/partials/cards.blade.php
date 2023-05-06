{{-- CREIAMO UNA CARD PER OGNI ELEMENTO NELLA LISTA CHE CI FORNISCE IL CONTROLLER  --}}
@foreach ($train_list as $train)
    {{-- CARD --}}
    <div class="card my-4">
        {{-- HEADER DELLA CARD  --}}
        <div class="card-header d-flex justify-content-between">
            <div>
                {{ $train->n_vagoni }}
                @include('partials/svg.trainSvg')
                {{ $train->azienda }}
            </div>
            <div>
                code: {{ $train->codice_treno }}
            </div>
        </div>
        {{-- /HEADER DELLA CARD  --}}

        {{-- CORPO DELLA CARD  --}}
        <div class="card-body d-flex justify-content-between">

            {{-- INFORMAZIONI SULLE DESTINAZIONI E ORARI  --}}
            <div class="d-flex align-items-center gap-4">
                <div class="fs-2">{{ $train->stazione_partenza }}</div>
                <div>@include('partials/svg.arrowSvg')</div>
                <div class="fs-2">{{ $train->stazione_arrivo }}</div>
                <div class="px-4">
                    ora: {{ substr($train->orario_partenza, 11, 5) }}
                </div>
                <div class="">
                    data: {{ date('m-d', strtotime($train->orario_partenza)) }}
                </div>
            </div>
            {{-- /INFORMAZIONI SULLE DESTINAZIONI E ORARI  --}}



            {{-- INFORMAZIONI SU EVENTUALI DISAGI  --}}
            <div class=" mx-4 d-flex justify-content-center align-items-center">
                <div class="  {{ $train->ritardo_treno == '1' ? 'd-flex' : 'd-none' }}">
                    <span class="px-3">Lieve ritardo</span>
                    @include('partials/svg.lateSvg')
                </div>
                <div class="{{ $train->cancellato_treno == '1' ? 'd-flex' : 'd-none' }}">
                    <span class="px-3">Treno cancellato</span>
                    @include('partials/svg.abortedSvg')
                </div>
            </div>
            {{-- /INFORMAZIONI SU EVENTUALI DISAGI  --}}

        </div>
        {{-- /CORPO DELLA CARD  --}}
    </div>
    {{-- CARD --}}
@endforeach
{{-- /CREIAMO UNA CARD PER OGNI ELEMENTO NELLA LISTA CHE CI FORNISCE IL CONTROLLER  --}}
