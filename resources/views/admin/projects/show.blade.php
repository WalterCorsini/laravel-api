@extends('layouts.admin')

@section('content')
    {{--  title and button --}}
    <div class="d-flex gap-2 align-items-center justify-content-center m-5">
        <h1>Dettagli </h1>
        {{--  /title and button --}}

        {{-- button edit --}}
        <a class="btn btn-success" href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
            <i class="fa-solid fa-pen"></i>
        </a>
        {{-- /button edit --}}

        {{-- button delete --}}
        <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
        {{-- /button delete --}}

    </div>
    {{--  title and button --}}

    {{-- details record --}}
    <div class="container">
        <p>
            <strong>Titolo :</strong>
            {{ $project->title }}
        </p>

        {{-- description --}}
        @if (!empty($project->description))
            <p>
                <strong>Descrizione :</strong>
                {{ $project->description }}
            </p>
        @endif
        {{-- /description --}}

        {{-- type --}}
        @if (isset($project->type->name))
            <p>
                <strong>Tipologia:</strong> {{ $project->type->name }}
            </p>
        @endif
        {{-- type --}}

        {{-- technologies --}}
        <strong>Tecnologie:</strong>

        {{-- show technology id count > 0 --}}
        @if (count($project->technologies) > 0)
            <ol>
                @foreach ($project->technologies as $technology)
                    <li>
                        <strong>{{ $technology->name }}</strong>
                        <ul>
                            <li>
                                {{ $technology->description }}
                            </li>

                            {{-- show common technology if exists --}}
                            @if (count($technology->projects)>1)
                                <li>

                                    {{-- show count common project have the same technology --}}
                                    <strong>
                                        tecnologia in comune anche con questi progetti {{ count($technology->projects)-1 }} :
                                    </strong>
                                    {{-- /show count common project have the same technology --}}
                                </li>

                                <ul>
                                    <li>

                                        {{-- show common project without project->id  --}}
                                        @foreach ($technology->projects as $commonProject)
                                            @if ($commonProject->id != $project->id)
                                                <span>{{ $commonProject->title }} ,</span>
                                            @endif
                                        @endforeach
                                        {{-- /show common project without project->id  --}}

                                    </li>
                                </ul>
                            @endif
                            {{-- /show common technology if exists --}}
                    </li>
                @endforeach
            </ol>
        @else
            <span>nessuna tecnologia</span>
        @endif
        {{-- /technologies --}}

        <p>
            <strong>slug :</strong>
            {{ $project->slug }}
        </p>

        {{-- img --}}
        <div class="w-50">
            <img class="w-50" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
        </div>
        {{-- /img --}}

    </div>
    {{-- details record --}}


@endsection
