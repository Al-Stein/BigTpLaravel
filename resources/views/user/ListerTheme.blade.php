@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h2>Liste des Thèmes</h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($themes as $theme)
                <tr>
                    <td>{{ $theme->titre }}</td>
                    <td>{{ $theme->description }}</td>
                    <td>
                        <img src="{{ asset($theme->photo) }}" alt="{{ $theme->titre }}" style="max-width: 100px; max-height: 100px;">
                    </td>
                    <td>
                        <form action="{{ route('delete.user', ['id' => $theme->idTheme]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                        {{-- <a href="/modifier-projet/{{ $theme->idP }}" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="/detailP/{{ $theme->idP }}" class="btn btn-success btn-sm">Détails</a> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
