@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
<section>
    <div class="container">
        <a href="{{ route('admin.project.index') }}" class="btn btn-primary my-5">Go back to Projects' List</a>

        <h1>Edit Project</h1>
        <form action="{{ route('admin.project.update', $project) }}" method="POST" class="my-5 row g-3">
            @csrf
            @method('PATCH')
            <div class="mb-3 col-10">
              <label for="title" class="form-label">Title</label>
              <input type="text" class="form-control" id="title"  name="title" value={{ $project->title }}>
            </div>
            <div class="mb-3 col-12">
              <label for="content" class="form-label">Content</label>
              <br>
              <textarea name="content" id="content" cols="105" rows="10">{{ $project->content }}</textarea>
            </div>
            <div class="mb-3 col-4">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk me-1"></i>Edit</button>
            </div>
        </form>
        
    </div>
</section>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
@endsection