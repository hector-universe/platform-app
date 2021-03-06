@extends('layouts.app')
@section('content')
    <div class="jumbotron jumbotron-fluid settings-bar">
        <div class="container">
            <h1 class="display-3">Twoje paczki modyfikacji</h1>
            <p class="lead">W tym miejscu znajdują się wszystkie twoje paczki modyfikacji, które umieściłeś na {{env("APP_NAME")}}.</p>
        </div>
    </div>
    <div class="container" style="margin-top: -55px;">
        <div class="row">
            @include('user.layouts.menu')
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Paczki modyfikacji</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        Poniżej wyświetlono wszystkie paczki modyfikacji, które zostały ci przyznane.
                            <table class="table table-sm table-striped table-responsive-3">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Twórca</th>
                                    <th>Nazwa</th>
                                    <th>Oficjalny</th>
                                    <th>Serwerowy</th>
                                    <th>Minecraft</th>
                                    <th><i class="fa fa-download" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-star" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-play-circle-o" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($myModpacks as $modpack)
                                    <tr>
                                        <td>{{ $modpack->id }}</td>
                                        <td>{{ App\User::where('id',$modpack->owner)->value('name') }}</td>
                                        <td>{{ $modpack->name }}</td>
                                        @if($modpack->isOfficial == 1)
                                            <td>Tak</td>
                                        @else
                                            <td>Nie</td>
                                        @endif
                                        @if($modpack->isServer == 1)
                                            <td>Tak</td>
                                        @else
                                            <td>Nie</td>
                                        @endif
                                        <td>{{ $modpack->minecraft }}</td>
                                        <td>{{ $modpack->downloads }}</td>
                                        <td>{{ $modpack->ratings }}</td>
                                        <td>{{ $modpack->runs }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection