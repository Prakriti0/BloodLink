<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Registration Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f8fafc;
            /* Light background for contrast */
        }

        .form-container {
            background-color: white;
            border: 2px solid #f87171;
            /* Light red border */
        }

        .blood-group {
            background-color: #f0f4ff;
            /* Light background for blood group selection */
        }
    </style>
</head>

<body class="flex justify-center items-center min-h-screen">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <div class="form-container p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-center text-red-600">Donor Registration Form</h1>

        <form action="{{ route('donors.update',$donor->id) }}" method="POST" class="space-y-4">
            @csrf()
            @method('PATCH')
            <!-- Donor Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Donor Name</label>
                <input type="text" id="name" name="name" value="{{$donor->name}}" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter your name" required>
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="address" value="{{$donor->address}}" name="address" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter your address" required>
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                <input type="tel" id="phone" value="{{$donor->phone_no}}" name="phone" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter your phone number" required>
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Gender</label>
                <div class="flex items-center mt-2">
                    <input type="radio" id="male" name="gender" value="male" class="mr-2" {{ $donor->gender == 'male' ? 'checked' : '' }}>

                    <label for="male" class="text-sm text-gray-600">Male</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="radio" id="female" name="gender" value="female" class="mr-2" {{ $donor->gender == 'female' ? 'checked' : '' }}>

                    <label for="female" class="text-sm text-gray-600">Female</label>
                </div>
                <div class="flex items-center mt-2">
                    <input type="radio" id="others" name="gender" value="others" class="mr-2" {{ $donor->gender == 'other' ? 'checked' : '' }}>

                    <label for="other" class="text-sm text-gray-600">Other</label>
                </div>
            </div>

            <!-- Blood Group -->
            <div>
                <label for="blood-group" class="block text-sm font-medium text-gray-700">Blood Group</label>
                <select id="blood-group" name="blood_group" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm blood-group" required>
                    <option value="" disabled {{ old('blood_group', $selected_blood_group ?? '') == '' ? 'selected' : '' }}>
                        Select your blood group
                    </option>
                    @foreach($blood_groups as $id => $blood_group)
                    <option value="{{ $id }}" {{ old('blood_group', $donor->blood_group_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $blood_group }}
                    </option>
                    @endforeach
                </select>

            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="w-full bg-red-500 text-white p-2 rounded-md shadow hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Register</button>
            </div>
        </form>
    </div>

</body>

</html>