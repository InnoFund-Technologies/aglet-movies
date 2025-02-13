<footer class="text-gray-400 font-sans dark:bg-gray-900">
    <div class="container px-6 py-12 mx-auto">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-y-10 lg:grid-cols-4">
            <div class="sm:col-span-2">
                <h1 class="max-w-lg text-xl font-semibold tracking-tight text-gray-800 xl:text-2xl dark:text-white">Subscribe to our newsletter for the latest movie updates.</h1>

                <div class="flex flex-col mx-auto mt-6 space-y-3 md:space-y-0 md:flex-row gap-4">
                    <x-text-input id="email" type="text" class="w-96" placeholder="Email Address" />
                    <x-primary-button>
                        Subscribe
                    </x-primary-button>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Quick Links</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    <a href="{{ route('home') }}" class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline hover:cursor-pointer">Home</a>
                    <a href="{{ route('contact.create') }}" class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline hover:cursor-pointer">Contact</a>
                </div>
            </div>

            <div>
                <p class="font-semibold text-gray-800 dark:text-white">Cool Genres</p>

                <div class="flex flex-col items-start mt-5 space-y-2">
                    <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline hover:cursor-pointer">Action</a>
                    <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline hover:cursor-pointer">Drama</a>
                    <a class="transition-colors duration-300 text-gray-300 hover:text-blue-400 hover:underline hover:cursor-pointer">Comedy</a>
                </div>
            </div>
        </div>

        <hr class="border-gray-200 md:my-6 dark:border-gray-700 h-2" />

        <div class="sm:flex sm:items-center sm:justify-between h-12">
            <div class="flex flex-1 gap-4 hover:cursor-pointer">
                <img src="https://www.svgrepo.com/show/303139/google-play-badge-logo.svg" width="130" height="110" alt="Google Play" />
                <img src="https://www.svgrepo.com/show/303128/download-on-the-app-store-apple-logo.svg" width="130" height="110" alt="App Store" />
            </div>

            <div class="flex justify-center space-x-4">
                <a href="#" class="hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                    </svg>
                </a>
                <a href="#" class="hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                        <rect width="4" height="12" x="2" y="9" />
                        <circle cx="4" cy="4" r="2" />
                    </svg>
                </a>
                <a href="#" class="hover:text-gray-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                    </svg>
                </a>
            </div>
        </div>
        <p class="font-sans text-start md:text-center md:text-lg md:p-4">© 2025 Aglet Movies Inc. All rights reserved.</p>
    </div>
</footer>