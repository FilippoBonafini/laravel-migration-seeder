{{-- ESTENDIAMO IL LAYOUT --}}
@extends('layouts.app')

{{-- SEZIONE TITOLO DEL LAYOUT --}}
@section('page.title')
    Home page
@endsection
{{-- /SEZIONE TITOLO DEL LAYOUT --}}

{{-- CORPO DELLA PAGINA --}}
@section('page.main')
    @include('partials.cards') {{-- INCLUDIAMO IL FILE CARDS --}}
@endsection
{{-- /CORPO DELLA PAGINA --}}
