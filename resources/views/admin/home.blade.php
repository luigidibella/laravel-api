@php
    use App\Functions\Helper;
@endphp

@extends('layouts.admin')

@section('content')

<h1 class="text-white">Home della dashboard</h1>

<h2 class="mb-3">Sono presenti <span class="text-white">{{ $count_projects}}</span> progetti</h2>

<div class="card w-50">
    <div class="card-header bg-success-subtle">
        Ultimo progetto: {{Helper::formatDate($last_project->updated_at)}}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{ $last_project->title }}</h5>
      <p class="card-text">{{ $last_project->text }}</p>
      <a href="{{ route('admin.projects.show', $last_project) }}" class="btn btn-success">Vai al progetto</a>
    </div>
</div>

@endsection
