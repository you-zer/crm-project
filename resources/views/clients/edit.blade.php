{{-- resources/views/clients/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Client</h1>

    <form action="{{ route('clients.update', $client) }}" method="POST">
        @method('PUT')
        @include('clients.form', [
            'client'    => $client,
            'statuses'  => \App\Models\Status::all(),
            'users'     => \App\Models\User::all(),
            'buttonText'=> 'Save'
        ])
    </form>
</div>
@endsection
