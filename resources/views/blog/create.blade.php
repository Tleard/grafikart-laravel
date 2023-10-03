@extends('base')

@section('title', 'Crée un article')

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="title" value="Article de démonstration">
        <input type="text" name="content" value="Contenue de démonstration">
        <button>Enregistrer</button>
    </form>
@endsection
