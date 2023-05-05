@extends('layouts.app')
@section('page.title')
    Home page
@endsection

@section('page.main')
    @foreach ($train_list as $train)
        <div>
            <h2>{{ $train->stazione_partenza }}
                <span class="fs-5">{{ '(' . $train->orario_partenza . ')' }}</span>
                ->
                {{ $train->stazione_arrivo }}
                <span class="fs-5"> {{ '(' . $train->orario_arrivo . ')' }} </span>
            </h2>
        </div>
    @endforeach
@endsection
