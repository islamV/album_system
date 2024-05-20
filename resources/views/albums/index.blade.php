<x-app-layout>
    <x-slot name="header">Albums</x-slot>
    <div class="container p-4 mx-auto mt-6">
        <div class="w-full p-2 m-2">
            <a href="{{ route('albums.create') }}" class="p-2 m-2 font-semibold text-white bg-green-600 rounded-lg">Create</a>
        </div>
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50 dark:bg-gray-600 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">Id</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-gray-200">Title</th>
                                <th scope="col" class="relative px-6 py-3">Manage</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($albums as $album)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $album->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a class="font-semibold text-indigo-500 hover:text-indigo-700" href="{{ route('albums.show', $album->id) }}">
                                            {{ $album->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-right">
                                        <div class="flex justify-center">
                                            <a href="{{ route('albums.edit', $album->id) }}" class="px-4 py-2 mr-2 bg-green-500 rounded-lg hover:bg-green-700">Edit</a>
                                            <button onclick="showDeleteOptionsModal({{ $album->id }})" class="px-4 py-2 bg-red-500 rounded-lg hover:bg-red-700">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-2 m-2">Pagination</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Options Modal -->
    <div id="deleteOptionsModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-semibold">Choose an action</h2>
            <div class="flex justify-around">
                <form method="POST" action="{{ route('albums.destroy' ,['album'=>$album]) }}" id="deleteAllImagesForm">
                    @csrf
                    @method('DELETE')
                    <x-button class="bg-red-500 hover:bg-red-700">Delete All Images</x-button>
                </form>
                <form method="POST" action="" id="moveAllImagesForm">
                    @csrf
                     @method('GET')
                    <x-button class="bg-blue-500 hover:bg-blue-700">Move All Images</x-button>
                </form>
            </div>
            <button onclick="hideDeleteOptionsModal()" class="px-4 py-2 mt-4 text-white bg-gray-500 rounded hover:bg-gray-700">Cancel</button>
        </div>
    </div>

    <script>
        function showDeleteOptionsModal(albumId) {
            document.getElementById('deleteAllImagesForm').action = `/albums/${albumId}/`;
            document.getElementById('moveAllImagesForm').action = `/albums/${albumId}/move/`;
            document.getElementById('deleteOptionsModal').classList.remove('hidden');
        }

        function hideDeleteOptionsModal() {
            document.getElementById('deleteOptionsModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
