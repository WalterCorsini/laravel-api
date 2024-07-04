@extends('layouts.admin')

@section('content')
    <div class="container m-auto mt-5">
        <h1>Messaggi : </h1>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome &DownArrow; Detail</th>
                <th scope="col">Cognome</th>
                <th scope="col">Email</th>
                <th scope="col">Created_at</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>
                        <a  class="text-black" href="{{ route('admin.leads.show', ['lead' => $lead->id]) }}">
                            {{ $lead->name }}
                        </a>
                    </td>

                    <td>{{ $lead->lastname }}</td>
                    <td>{{ $lead->email }}</td>
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
                            {{ $lead->created_at }}
                        </form>
                    </td>
                </tr>

                </form>
            @endforeach
        </tbody>
    </table>
@endsection
