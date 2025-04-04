@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-md">
    <h1 class="text-2xl font-bold mb-4">Add a Knife</h1>

    <form method="POST" action="{{ route('knives.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block">Name</label>
            <input type="text" name="name" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Description</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>

        <div class="mb-4">
            <label class="block">Price</label>
            <input type="number" name="price" class="w-full border rounded p-2" step="0.01" required>
        </div>

        <div class="mb-4">
            <label class="block">Image URL</label>
            <input type="url" name="image_url" class="w-full border rounded p-2">
        </div>

        <button type="submit" style="background-color: red; color: white;" class="px-4 py-2 rounded">
            Add Knife
        </button>
    </form>
</div>
@endsection
