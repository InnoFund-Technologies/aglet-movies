<x-layout>
    <div class="max-w-6xl max-lg:max-w-3xl mx-auto rounded-lg pt-10 flex items-center">
        <div class="grid lg:grid-cols-2 items-center gap-14 sm:p-8 p-4 font-[sans-serif]">
            <div>
                <h1 class="text-4xl font-bold text-gray-100">Get in Touch</h1>
                <p class="text-sm text-gray-400 mt-4 leading-relaxed">
                    Have a question about our movies? Want to suggest a film? We'd love to hear from you! Drop us a message and our team will get back to you within 24 hours. Your feedback helps us improve our movie collection and services.
                </p>

                <ul class="mt-12 space-y-8">
                    <li class="flex items-center text-gray-400 hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                            <rect width="20" height="16" x="2" y="4" rx="2" />
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                        </svg>
                        <a href="#" class="text-sm ml-4">
                            info@aglemovies.com
                        </a>
                    </li>
                    <li class="flex items-center text-gray-400 hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                        </svg>
                        <a href="#" class="text-sm ml-4">
                            +158 996 888
                        </a>
                    </li>
                    <li class="flex items-center text-gray-400 hover:text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0" />
                            <circle cx="12" cy="10" r="3" />
                        </svg>
                        <a href="#" class="text-sm ml-4">
                            123 Street 256 House
                        </a>
                    </li>
                </ul>

                <ul class="flex mt-12 space-x-4">
                    <li class="bg-[#FF2D20] hover:bg-[#FF2D20e2] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                            </svg>
                        </a>
                    </li>
                    <li class="bg-[#FF2D20] hover:bg-[#FF2D20e2] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z" />
                                <rect width="4" height="12" x="2" y="9" />
                                <circle cx="4" cy="4" r="2" />
                            </svg>
                        </a>
                    </li>
                    <li class="bg-[#FF2D20] hover:bg-[#FF2D20e2] h-10 w-10 rounded-full flex items-center justify-center shrink-0">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5" />
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                                <line x1="17.5" x2="17.51" y1="6.5" y2="6.5" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bg-gray-800 p-6 rounded-3xl">
                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="text-gray-400 text-sm mb-2 block">Name</label>
                        <x-text-input type="text" name="name" id="name" value="{{ old('name') }}"
                            required>
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="text-gray-400 text-sm mb-2 block">Email</label>
                        <x-text-input type="email" name="email" id="email" value="{{ old('email') }}"
                            required>
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="text-gray-400 text-sm mb-2 block">Subject</label>
                        <x-text-input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                            required>
                            @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="text-gray-400 text-sm mb-2 block">Message</label>
                        <textarea name="message" id="message" rows="5"
                            class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]"
                            required>{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-primary-button type="submit">
                        Send Message
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-layout>