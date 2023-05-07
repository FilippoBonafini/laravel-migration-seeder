{{-- CREIAMO UNA CARD PER OGNI ELEMENTO NELLA LISTA CHE CI FORNISCE IL CONTROLLER  --}}
@foreach ($train_list as $train)
    {{-- CARD --}}
    <div class="card my-4">

        {{-- HEADER DELLA CARD  --}}
        <div class="card-header d-flex justify-content-between">

            {{-- LOGO, AZIENDA E N.VAGONI  --}}
            <div>
                {{ $train->n_vagoni }}

                @include('partials/svg.trainSvg')

                {{ $train->azienda }}
            </div>
            {{-- /LOGO, AZIENDA E N.VAGONI  --}}

            {{-- CODICE DEL TRENO  --}}
            <div>
                code: {{ $train->codice_treno }}
            </div>
            {{-- /CODICE DEL TRENO  --}}

        </div>
        {{-- /HEADER DELLA CARD  --}}

        {{-- ---------------------------------------------- --}}

        {{-- CORPO DELLA CARD  --}}
        <div class="card-body d-flex justify-content-between">

            {{-- INFORMAZIONI SULLE DESTINAZIONI E ORARI  --}}
            <div class="d-flex align-items-center gap-4">

                <div class="d-flex align-items-end gap-2">
                    <div class="fs-2">
                        {{ $train->stazione_partenza }}
                    </div>
                    <span>
                        {{-- ESTRAPOLO DALLA STRINGA SOLO I PRIMI 5 CARATTERI (L'ORA) --}}
                        {{ '(' . substr($train->orario_partenza, 11, 5) . ')' }}
                    </span>
                </div>

                <div>@include('partials/svg.arrowSvg')</div>

                <div class="d-flex align-items-end gap-2">
                    <div class="fs-2">
                        {{ $train->stazione_arrivo }}
                    </div>
                    <span>
                        {{-- ESTRAPOLO DALLA STRINGA SOLO I PRIMI 5 CARATTERI (L'ORA) --}}
                        {{ '(' . substr($train->orario_arrivo, 11, 5) . ')' }}
                    </span>
                </div>

                {{-- SE LA DATA CORRISPONDE A QUELLA ODIERNA NON MOSTRARE QUESTA INFO --}}
                {{-- UTILIZZO CARBON  --}}
                <div
                    class="{{ \Carbon\Carbon::parse($train->orario_partenza)->isToday('Europe/Rome') ? 'd-none' : '' }}">
                    data: {{ \Carbon\Carbon::parse($train->orario_partenza)->format('d-m') }}
                </div>

            </div>
            {{-- /INFORMAZIONI SULLE DESTINAZIONI E ORARI  --}}

            {{-- ---------------------------------------------- --}}

            {{-- INFORMAZIONI SU EVENTUALI DISAGI  --}}
            <div class=" mx-4 d-flex justify-content-center align-items-center">

                {{-- SE IL TRENO E' IN RITARDO MOSTRA QUESTO ELEMENTO ALTRIMENTI NO  --}}
                <div class="  {{ $train->ritardo_treno == '1' ? 'd-flex' : 'd-none' }}">
                    <span class="px-3">Lieve ritardo</span>
                    @include('partials/svg.lateSvg')
                </div>

                {{-- SE IL TRENO E' STATO CANCELLATO MOSTRA QUESTO ELEMENTO ALTRIMENTI NO  --}}
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
