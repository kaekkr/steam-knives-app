@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <a href="{{ route('knives.create') }}" class="text-blue-600 underline mb-4 inline-block">+ Add Knife</a>

    <h1 class="text-2xl font-bold mb-4">Knives Catalog</h1>

    <form method="GET" action="{{ route('knives.index') }}" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search knives..."
           class="border rounded p-2 w-full md:w-1/3">
    </form>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($knives as $knife)
            <div class="border rounded-lg p-4">
                <h2 class="text-lg font-semibold">{{ $knife->name }}</h2>
                <p class="text-sm">{{ $knife->description }}</p>
                <p class="mt-2 font-bold">${{ $knife->price }}</p>
            </div>
            <div class="mt-2 flex gap-2">
                <a href="{{ route('knives.edit', $knife) }}" class="text-blue-600 underline">Edit</a>

                <form action="{{ route('knives.destroy', $knife) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 underline">Delete</button>
                </form>
            </div>
        @empty
            <p>No knives found.</p>
        @endforelse
    </div>
</div>
@endsection
