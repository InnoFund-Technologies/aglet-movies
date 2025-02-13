<x-layout>
    <div class="font-[sans-serif]">
        <div class="flex flex-col items-center justify-center pb-6 pt-14 px-4">
            <div class="max-w-md w-full">
                <div class="p-8 rounded-3xl bg-gray-800 shadow">
                    <h2 class="text-gray-200 text-center text-2xl font-bold">Sign in</h2>
                    <form class="mt-8 space-y-6">
                        <div>
                            <label for="email" class="text-gray-400 text-sm mb-2 block">Email</label>
                            <div class="relative flex items-center">
                                <x-text-input name="email" id="email" type="text" required placeholder="Enter email" />
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-gray-300 absolute right-4 cursor-pointer">
                                    <circle cx="12" cy="8" r="5" />
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                </svg>
                            </div>
                        </div>

                        <div>
                            <label for="password" class="text-gray-400 text-sm mb-2 block">Password</label>
                            <div class="relative flex items-center">
                                <x-text-input name="password" id="password" type="password" required placeholder="Enter password" />
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-gray-300 absolute right-4 cursor-pointer">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0" />
                                    <circle cx="12" cy="12" r="3" />
                                </svg>
                            </div>
                        </div>

                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div class="flex items-center">
                                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-red-500 focus:ring-red-500 border-gray-300 rounded" />
                                <label for="remember-me" class="ml-3 block text-sm text-gray-400">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-gray-400 hover:underline font-medium text-sm/6">
                                Forgot your password?
                            </a>
                        </div>

                        <div class="mt-8 text-center">
                            <x-primary-button class="w-2/4">
                                Log in
                            </x-primary-button>
                        </div>
                        <p class="text-gray-400 text-sm !mt-8 text-center">Don't have an account? <a href="/register" class="text-red-500 hover:underline ml-1 whitespace-nowrap font-medium">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
