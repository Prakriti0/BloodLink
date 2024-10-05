<x-app-layout>
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-red-600">List of Registered Hospitals</h1>
        
       
        <div class="flex justify-center">
            <div class="w-full max-w-4xl">
                <table class="table-auto w-full bg-white rounded-lg shadow-lg">
                    <thead>
                        <tr class="bg-red-500 text-white">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Hospital Name</th>
                            <th class="px-4 py-2">Contact Number</th>
                            <th class="px-4 py-2">Location</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($hospitals as $hospital)
                        <tr class="text-center border-t">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $hospital->name }}</td>
                            <td class="border px-4 py-2">{{ $hospital->contact_no }}</td>
                            <td class="border px-4 py-2">{{ $hospital->location }}</td>
                            <td class="border px-4 py-2">{{ $hospital->user?->email }}</td>
                            <td class="border px-4 py-2">

                                               <!-- Edit Button -->
                                               <a href="{{route('hospitals.edit',$hospital->id)}}" class="text-white bg-blue-600 hover:bg-blue-700  font-small text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('hospitals.destroy', $hospital->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-400 hover:bg-red-700 font-medium text-sm px-5 py-2.5">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>