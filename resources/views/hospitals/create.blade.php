<x-app-layout>
    <div class="flex-grow flex items-center justify-center" style="margin-top: 50px;">
        <div class="form-container bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center text-red-600">Hospital Registration Form</h1>

            <form action="{{ route('hospitals.store') }}" method="POST" class="space-y-4" autocomplete="off">
                @csrf
                <!-- Hospital Name -->
                <div>
                    <label for="hospital-name" class="block text-sm font-medium text-gray-700">Hospital Name</label>
                    <input type="text" id="hospital-name" name="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter hospital name" required>
                </div>

                <!-- Contact Number -->
                <div>
                    <label for="contact-no" class="block text-sm font-medium text-gray-700">Contact Number</label>
                    <input type="tel" id="contact-no" name="contact_no" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter contact number" required>
                </div>

                <!-- Location -->
                <div>
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="location" name="location" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter hospital location" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Enter hospital email" required>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Create a password" required>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm" placeholder="Confirm your password" required>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="w-full bg-red-500 text-white p-2 rounded-md shadow hover:bg-red-600 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>