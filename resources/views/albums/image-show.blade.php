<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="container flex justify-between p-2 m-2 mx-auto bg-white rounded-lg shadow-md">
        <div class="p-2 m-2">
            <img src="{{ $image->getUrl() }}">
        </div>
        <div class="p-2 m-2">
            <ul>
                <li>Collection Name: {{ $image->collection_name }}</li>
                <li>Name: {{ $image->name }}</li>
                <li>Mime type: {{ $image->mime_type }}</li>
                <li>Size: {{ $image->human_readable_size }}</li>
            </ul>
        </div>
    </div>
</x-app-layout>
