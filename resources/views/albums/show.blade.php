<x-app-layout>
    <x-slot name="header">{{ $album->title }}</x-slot>
    <div class="container p-2 m-2 mx-auto bg-white rounded-lg shadow-md">
        <div class="w-1/2 mt-10 space-y-8 divide-y divide-gray-200">
        <form method="POST" action="{{ route('ablums.upload', $album->id) }}" enctype="multipart/form-data">
          @csrf
          <div class="sm:col-span-6">
            <label for="title" class="block text-sm font-medium text-gray-700"> Album Image </label>
            <div class="mt-1">
              <input type="file" id="image" name="image" class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5" />
            </div>
          </div>
          <div class="pt-5 sm:col-span-6">
            <x-button class="bg-green-500">Upload</x-button>
          </div>
        </form>
       </div>
       <div class="mt-4">
         <div class="grid grid-cols-2 gap-2 md:grid-cols-3 md:gap-4">
           @foreach ($photos as $photo)

           <div class="p-2 bg-gray-300">
             <a class="relative block h-56 overflow-hidden rounded">
                <img
                alt="gallery"
                class="block object-cover object-center w-full h-full"
                src="{{ $photo->getUrl() }}">
              </a>
              <div class="flex justify-between p-4 mt-4">
                <a class="p-2 m-2 bg-blue-500 rounded-lg hover:bg-blue-700" href="{{ route('album.image.movepage', [$album->id,$photo->id]) }}">move  image</a>
              <form method="POST" action="{{ route('album.image.destroy', [$album->id, $photo->id]) }}">
                @csrf
                @method('DELETE')
                <button class="p-2 m-2 bg-red-500 rounded-lg hover:bg-red-700">Delete</button>
              </form>
            </div>
            </div>
           @endforeach
         </div>
       </div>
    </div>
</x-app-layout>
