@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<section>
    <div class="container my-5">

        <a href="{{ route('admin.project.create') }}" class="btn btn-info"><i class="fa-solid fa-plus"></i> Add New Project</a>

        <h1 class="my-4">Projects' List</h1>
        <table class="table table-primary table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Abstract</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>{{$project->title}}</td>
                    <td>{{$project->getAbstract(100)}}</td>
                    <td>{{$project->slug}}</td>
                    <td>
                        <a href="{{ route('admin.project.show', $project) }}" class="btn btn-primary my-1 px-5"><i class="fa-solid fa-eye"></i></a>
                        <a href="{{ route('admin.project.update', $project) }}" class="btn btn-warning my-1 px-5"><i class="fa-solid fa-pencil"></i></a>
                        <a href="{{ route('admin.project.destroy', $project) }}" class="btn btn-danger my-1 px-5"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="100%">Nessun Progetto trovato</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $projects->links('pagination::bootstrap-5') }}
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection

