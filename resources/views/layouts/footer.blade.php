<footer class="text-gray-400 font-sans dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">

        <hr class="border-gray-200 mb-8 dark:border-gray-700" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- App Store Links -->
            <div class="">
                <div class="">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white">Aglet <span class="text-[#FF2D20]">Movies</span></h2>
                </div>
                <div class="flex gap-4 hover:cursor-pointer">
                    <img src="https://www.svgrepo.com/show/303139/google-play-badge-logo.svg"
                        class="w-32 h-auto" alt="Google Play" />
                    <img src="https://www.svgrepo.com/show/303128/download-on-the-app-store-apple-logo.svg"
                        class="w-32 h-auto" alt="App Store" />
                </div>
            </div>

            <!-- Links Section -->
            <div class="grid grid-cols-2 gap-8">
                <!-- Quick Links -->
                <div>
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4">Quick Links</h3>
                    <div class="flex flex-col space-y-3">
                        <a href="{{ route('home') }}"
                            class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline">Home</a>
                        <a href="{{ route('contact.create') }}"
                            class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline">Contact</a>
                    </div>
                </div>

                <!-- Cool Genres -->
                <div>
                    <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-4">Cool Genres</h3>
                    <div class="flex flex-col space-y-3">
                        <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline">Action</a>
                        <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline">Drama</a>
                        <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline">Comedy</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <p class="text-sm md:text-base">© 2025 Aglet Movies Inc. All rights reserved.</p>
        </div>
    </div>
</footer>