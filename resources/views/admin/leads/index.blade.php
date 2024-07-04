@extends('layouts.admin')

@section('content')
    <div class="container m-auto mt-5">
        <h1>Messaggi : </h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Created_at</th>
                <th scope="col">Status</th>
                <th scope="col">Dettagli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>
                        {{ $lead->name }}
                    </td>

                    <td>{{ $lead->lastname }}</td>
                    <td>{{ $lead->created_at }}</td>
                    <td>
                        <form action="{{ route('admin.leads.update', ['lead' => $lead->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" id="status">
                                <option @selected($lead->status === 'pending') value="pending">
                                    open
                                </option>
                                <option @selected($lead->status === 'response') value="response">
                                    close
                                </option>
                            </select>
                            <button type="submit" class="btn btn-success">&check;</button>
                        </form>
                    </td>
                    <td>
                        <a class="text-black btn btn-info" href="{{ route('admin.leads.show', ['lead' => $lead->id]) }}">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                    </td>
                </tr>

                </form>
            @endforeach
        </tbody>
    </table>
@endsection
