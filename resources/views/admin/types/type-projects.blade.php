@extends('layouts.admin')

@section('content')

<h2 class="text-white">Elenco Tipi/Progetto</h2>

<table class="table">
    <thead>
      <tr>
        <th scope="col" class="bg-success-subtle">Tipo</th>
        <th scope="col" class="bg-success-subtle">Progetti</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($types as $type)
        <tr>
          <td class="w-25">{{ $type->name }}</td>
          <td>
            <ul class="list-group">
                @foreach ( $type->projects as $project)
                <li class="list-group-item">
                    <a href="{{ route('admin.projects.show', $project) }}">
                        {{ $project->id }} - {{ $project->title }}
                    </a>
                </li>
                @endforeach
            </ul>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>

@endsection
