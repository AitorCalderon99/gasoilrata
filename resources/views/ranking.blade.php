
@extends('layouts.app')

@section('title', 'Ranking')


<!--Para subir lo estilos al header y asi que se muestren bien-->
@push('head')
    <!-- Styles -->
    <style>
        html * {
            letter-spacing: 0.06rem;
        }
    </style>
    <link href="{{ asset('css/ranking.css') }}" rel="stylesheet"/>
    <!-- Scripts -->
    <script src="{{ asset('js/ranking.js') }}"></script>
@endpush

@section('content')
        <main>
            <Ranking></Ranking>
        </main>
@endsection
