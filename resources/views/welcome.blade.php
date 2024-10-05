 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>BloodLink - Blood Management System</title>
     <script src="https://cdn.tailwindcss.com"></script>
     <style>
         body {
             background-image: url('{{ asset("Image/bl.jpg") }}');
            background-repeat: no-repeat;
         }
     </style>
 </head>

 <body class="bg-white text-gray-900">
     <!-- Navbar -->
     <nav class="bg-red-700 text-white py-4">
         <div class="container mx-auto flex justify-between items-center">
             <h1 class="text-3xl font-bold">BloodLink</h1>
             <ul class="flex space-x-6">
                 <li><a href="#" class="hover:text-red-300">Home</a></li>
                 <li><a href="#" class="hover:text-red-300">About</a></li>
                 <li><a href="#" class="hover:text-red-300">Contact</a></li>
                 <li><a href="{{route('donors.create')}}" class="hover:text-red-300">Donate</a></li>
                 <li> @if (Route::has('login'))

                     @auth
                     <a
                         href="{{ url('/dashboard') }}"
                         class="hover:text-red-300">
                         Dashboard
                     </a>
                     @else
                     <a
                         href="{{ route('login') }}"
                         class="hover:text-red-300">
                         Log in
                     </a>
                 </li>


                 @endauth

                 @endif
             </ul>
         </div>
     </nav>

     <!-- Hero Section -->
     <header class="relative h-screen bg-cover bg-center" style="background-image: url('/img/b4.jpg'); background-repeat: no-repeat; background-size: cover;">
         <div class="relative z-10 flex items-center justify-center h-full">
             <div class="text-center text-white">
                 <h2 class="text-5xl font-bold mb-4 text-black">Welcome to BloodLink</h2>
                 <p class="text-2xl mb-6 text-black">Connecting lifesavers with those in need. Manage blood donations, requests, and inventory with ease.</p>
                 <a href="#info" class="bg-white text-red-700 hover:bg-gray-100 font-semibold py-3 px-6 rounded-lg transition-all">Learn More</a>
             </div>
         </div>
     </header>



     <!-- Info Section -->
     <section id="info" class="py-16 bg-gray-50">
         <div class="container mx-auto text-center mb-12">
             <h2 class="text-4xl font-bold text-red-700 mb-4">Why Blood Donation Matters</h2>
             <p class="text-lg text-gray-600">Your donation can save lives! Learn more about the benefits, eligibility, and impact of blood donation below.</p>
         </div>

         <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
             <!-- Card 1 -->
             <div class="bg-white p-6 rounded-lg shadow-lg">
                 <img src="{{ asset("Image/donor.webp") }}" alt="Who can donate" class="rounded-t-lg mb-4 w-full h-40 object-cover">
                 <h3 class="text-xl font-semibold text-red-700 mb-3">Who Can Donate?</h3>
                 <p class="text-gray-700">Most healthy people aged 18-65 and weighing at least 50kg can donate blood. Ensure you meet all necessary criteria before donating.</p>
             </div>
             <!-- Card 2 -->
             <div class="bg-white p-6 rounded-lg shadow-lg">
                 <img src="{{ asset("Image/donate.webp") }}" alt="How often can you donate?" class="rounded-t-lg mb-4 w-full h-40 object-cover">
                 <h3 class="text-xl font-semibold text-red-700 mb-3">How Often Can You Donate?</h3>
                 <p class="text-gray-700">You can donate whole blood every 56 days. Platelet donors can donate every 7 days. Consult with your local blood bank for further details.</p>
             </div>
             <!-- Card 3 -->
             <div class="bg-white p-6 rounded-lg shadow-lg">
                 <img src="{{ asset("Image/why.png") }}"alt="Why donate blood" class="rounded-t-lg mb-4 w-full h-40 object-cover">
                 <h3 class="text-xl font-semibold text-red-700 mb-3">Why Donate Blood?</h3>
                 <p class="text-gray-700">Blood donation helps patients suffering from trauma, surgeries, and diseases like cancer. A single donation can save multiple lives.</p>
             </div>
         </div>
     </section>

     <!-- Call to Action Section -->
     <section class="bg-red-700 py-16">
         <div class="container mx-auto text-center">
             <h2 class="text-4xl font-bold text-white mb-6">Ready to Make a Difference?</h2>
             <p class="text-lg text-white mb-8">Sign up to donate blood and help save lives in your community. Every drop counts!</p>
             <a href="{{route('donors.create')}}" class="bg-white text-red-700 hover:bg-gray-100 font-semibold py-3 px-6 rounded-lg transition-all">Donate Now</a>
         </div>
     </section>

     <!-- Footer -->
     <footer class="bg-gray-900 text-white py-8">
         <div class="container mx-auto text-center">
             <p>&copy; 2024 BloodLink. All Rights Reserved.</p>
         </div>
     </footer>
 </body>

 </html>