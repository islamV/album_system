<x-app-layout>
    <x-slot name="header">
        Move Images
    </x-slot>

    <div class="container p-4 m-4 mx-auto bg-white rounded-lg shadow-md">
        <div class="w-1/2 mt-10 space-y-8 divide-y divide-gray-200">
            <form method="POST" action="{{ route('album.image.move' ,['album'=>$album]) }}">
                @csrf

                <div class="mt-5 sm:col-span-6">
                    <label for="album" class="block text-sm font-medium text-gray-700">Select Album</label>
                    <div class="mt-1">
                        <select id="album" name="newAlbum" class="block w-full px-3 py-2 text-base leading-normal transition duration-150 ease-in-out bg-white border border-gray-400 rounded-md appearance-none sm:text-sm sm:leading-5">
                            <option value="" disabled selected>Select an album</option>
                           @foreach($albums as $album1)
                           <option value="{{ $album1->id }}"  >{{ $album1->title }}</option>
                           @endforeach
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>


                <div class="pt-5 sm:col-span-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        Move Images
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
