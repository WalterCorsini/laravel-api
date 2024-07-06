@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ __('Login -> Ok') }}</strong>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Bentornato') }}
                        {{ $user->name }} !!
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <strong>{{ __('Riepilogo dati utente') }}</strong>
                    </div>

                    <div class="card-body">
                        <dt>
                            Nome :
                        </dt>
                        <dd>
                            {{$user->name}}
                        </dd>

                        <dt>
                            Email :
                        </dt>
                        <dd>
                            {{$user->email}}
                        </dd>

                        <dt>
                            Creazione Profilo :
                        </dt>
                        <dd>
                            {{$user->created_at}}
                        </dd>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
