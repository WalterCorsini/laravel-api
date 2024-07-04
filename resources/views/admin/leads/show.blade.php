@extends('layouts.admin')

@section('content')
<dt>
    <strong>Mittente:</strong>
</dt>
<dd>
    {{$lead->name}} {{$lead->lastname}}
</dd>

<dt>
    <strong>Email:</strong>
</dt>
<dd>
    {{$lead->email}}
</dd>

<dt>
    <strong>Telefono: </strong>
</dt>
<dd>
    {{$lead->phone_number}}
</dd>

<dt>
    <strong>Messaggio: </strong>
</dt>
<dd>
    {{$lead->message}}
</dd>

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

@endsection
