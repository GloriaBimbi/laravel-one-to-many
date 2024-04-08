@extends('layouts.app')

@section('title', 'Show Project')

@section('content')
<section>
    <div class="container">
        <a class="btn btn-primary mt-5" href="{{ route('admin.project.index') }}">Go back to Projects' List</a>

        
        <h1 class="mt-5">{{ $project->title }}</h1>
        <div class="mb-5"><b>Slug:</b> {{ $project->slug }}</div>

        <p>{{ $project->content }}</p>

        <div class="d-flex gap-5 mt-5">
            <a class="btn btn-warning" href="{{ route('admin.project.edit', $project) }}"><i class="fa-solid fa-pencil"></i> Edit <i>"{{ $project->title }}"</i> Project </a>
            <a class="btn btn-danger" href="{{ route('admin.project.destroy', $project) }}"><i class="fa-solid fa-trash"></i> Delete <i>"{{ $project->title }}"</i> Project </a>
        </div>
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection