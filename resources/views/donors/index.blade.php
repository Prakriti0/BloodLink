<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6 text-center">List of Donors</h1>

        <!-- Search Form -->
        <form action="{{ route('donors.index') }}" method="GET" class="mb-6">
            <div class="flex items-center">
                <label for="blood_group" class="mr-4 font-medium text-gray-700">Search by Blood Group:</label>
                <select name="blood_group" id="blood_group" class="p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                    <option value="">All Blood Groups</option>
                    @foreach($blood_groups as $blood_group)
                    <option value="{{ $blood_group->id }}" {{ request()->get('blood_group') == $blood_group->id ? 'selected' : '' }}>
                        {{ $blood_group->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="ml-4 bg-red-500 text-white p-2 rounded-md shadow hover:bg-red-600">Search</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-md rounded-lg">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Address</th>
                        <th class="py-3 px-6 text-left">Phone</th>
                        <th class="py-3 px-6 text-left">Blood Group</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @foreach($donors as $donor)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{ $donor->name }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-left">{{ $donor->address }}</td>
                        <td class="py-3 px-6 text-left">{{ $donor->phone_no }}</td>
                        <td class="py-3 px-6 text-left">{{ $donor->blood_group->name }}</td>
                        <td class="py-3 px-6 text-center">
                            @if(auth()->user()->role !== 'hospital') <!-- Change 'hospital' to your actual role name -->
                            <a href="{{ route('donors.edit', $donor->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 font-small text-sm px-5 py-2.5">
                                <!-- Edit Button Icon -->
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('donors.destroy', $donor->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-white bg-red-400 hover:bg-red-700 font-medium text-sm px-5 py-2.5">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                            @else
                            <a href="#" class="text-white bg-blue-600 hover:bg-blue-700 font-small text-sm px-5 py-2.5">
                                <!-- request Button Icon -->
                                <i class="fa-solid fa-message"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>