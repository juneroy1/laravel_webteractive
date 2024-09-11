<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('JQ DEV') }}
        </h2>
        <div class="mb-10">
            <a href="{{ route('blog.create') }}" class="btn btn-primary mb-5">Create New Post</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <livewire:blog-index/>
            </div>
        </div>
    </div>
</x-app-layout>
