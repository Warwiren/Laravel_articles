<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Article') }}
        </h2>
    </x-slot>


    {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input id="title" name="title" />
            <textarea id="content" name="content"></textarea>

            <select name="category" id="category" class="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button style="display: block !important" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Créer mon article</button>
        </form>
    </div> --}}

    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title" required>
        </div>
        <div class="mb-6">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
            <input id="content" name="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-6">
            <select name="category" id="category" class="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
            {{-- <button style="display: block !important" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Créer mon article</button> --}}
            <button style="display: block !important" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Créer mon article</button>
    </form>

    {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach

        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <x-label for="title" value="Titre de l article" />
            <input id="title" name="title" />

            <label for="content" value="Contenu de l article" />
            <textarea id="content" name="content"></textarea>

            <label for="category" value="Categorie de l article" />
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <button style="display: block !important" class="mt-10">Créer mon article</button>
        </form>
    </div> --}}
</x-app-layout>