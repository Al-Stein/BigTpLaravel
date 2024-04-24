@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin') }}</div>
                <div class="card-body">
                    <div class="row">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        @foreach ($user as $user)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nom : {{ $user->name }}</h5>
                                    <p class="card-text">Email : {{ $user->email }}</p>
                                    <p class="card-text">Role : {{ $user->role->nom }}</p>
                                    <p class="card-text">Validé : {{ $user->valide }}</p>
                                    <p class="card-text">Date de création : {{ $user->created_at->format('d/m/Y') }}</p>
                                    
                                    @if (!$user->valide)
                                    <form action="{{ route('valid.admin', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Valider le compte</button>
                                    </form>
                                    @endif
                                    @if ($user->valide)
                                    <form action="{{ route('devalid.admin', ['id' => $user->id]) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">DeValider le compte</button>
                                    </form>
                                    @endif
                                    <a href="{{ route('delete.admin', ['id' => $user->id]) }}" class="btn btn-danger btn-sm">Supprimer </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
