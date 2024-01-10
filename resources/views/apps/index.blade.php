@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h1>Aplicaciones</h1>
                @livewire('app-livewire')
            </div>
        </div>
    </div>
</div>
@endsection

