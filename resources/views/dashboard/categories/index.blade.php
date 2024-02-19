@extends('layouts.app')
@section('content')
@livewire('categories.index')
@endsection
@push('js')
<script src="{{ asset('assets/js/script.js') }}"></script>
@endpush