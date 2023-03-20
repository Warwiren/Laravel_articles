<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-800 leading-tight">
            {{ $articles->title }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="text-white">
            {{$articles->content}}
        </div>
    </div>
</x-app-layout>