@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Edit Knife</h1>

    <form method="POST" action="{{ route('knives.update', $knife) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2"
                   value="{{ old('name', $knife->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description', $knife->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block">Price</label>
            <input type="number" step="0.01" name="price" class="w-full border rounded p-2"
                   value="{{ old('price', $knife->price) }}" required>
        </div>

        <div class="mb-4">
            <label class="block">Image URL</label>
            <input type="url" name="image_url" class="w-full border rounded p-2"
                   value="{{ old('image_url', $knife->image_url) }}">
        </div>

        <button type="submit" style="background-color: red; color: white;" class="px-4 py-2 rounded">
            Update Knife
        </button>
    </form>
</div>
@endsection
