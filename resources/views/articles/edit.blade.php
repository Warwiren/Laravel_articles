<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un Article') }}
        </h2>
    </x-slot>


    {{-- <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500">{{ $error }}</span>
        @endforeach

        <form action="{{ route('articles.update', $articles) }}" method="post" enctype="multipart/form-data">

            @method('put')
            @csrf
            <label for="title" value="Titre de l article" />
            <input id="title" name="title" value="{{$articles->title}}"/>

            <label for="content" value="Contenu de l article" />
            <textarea id="content" name="content" value="{{$articles->content}}"></textarea>

            <label for="category" value="Categorie de l article" />
            <select name="category" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{$articles->category_id == $category->id ? 'selected' :''}}>{{ $category->name }}</option>
                @endforeach
            </select>

            <button style="display: block !important" class="mt-10">Modifier mon article</button>
        </form>
    </div> --}}

    <form action="{{ url('articles/'.$articles->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titre</label>
            <input id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$articles->title}}" value="{{$articles->title}}" required>
        </div>
        <div class="mb-6">
            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contenu</label>
            <input id="content" name="content" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{$articles->content}}" value="{{$articles->content}}" required>
        </div>
        <div class="mb-6">
            <select name="category" id="category" class="">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
            <button style="display: block !important" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Modifier mon article</button>
    </form>
</x-app-layout>