{{-- resources/views/clients/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">New Client</h1>

    <form action="{{ route('clients.store') }}" method="POST">
        @include('clients.form', [
            'client'    => null,
            'statuses'  => \App\Models\Status::all(),
            'users'     => \App\Models\User::all(),
            'buttonText'=> 'Create'
        ])
    </form>
</div>
@endsection
