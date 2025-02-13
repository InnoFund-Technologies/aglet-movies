<x-app-layout>
    <div>
        <div class="max-w-screen-xl mx-auto text-gray-600 md:px-8">
            <div class="mt-12 max-w-lg mx-auto bg-gray-800 py-4 px-6 rounded-lg">
                <h2 class="text-gray-200 text-center text-2xl font-bold mb-8">Get in touch</h2>
                @if (session('status'))
                <div class="bg-green-100 text-green-600 px-6 py-3 rounded-lg">
                    {{ session('status') }}
                </div>
                @endif
                <form method="POST" action="{{ route('contact.store') }}" class="space-y-5 ">
                    @csrf
                    <div>
                        <div>
                            <x-input-label class="font-medium">
                                Full name
                            </x-input-label>
                            <x-text-input type="text" name="name" value="{{ old('name') }}" required />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>
                    <div>
                        <x-input-label class="font-medium">
                            Email
                        </x-input-label>
                        <x-text-input type="email" name="email" value="{{ old('email') }}" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label>
                            Phone number
                        </x-input-label>
                        <x-text-input type="number" name="phone_number" value="{{ old('phone_number') }}" required />
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div>
                        <x-input-label class="font-medium">
                            Social media links
                        </x-input-label>
                        <span class="text-gray-400 text-sm block mb-2">Enter your comma (,) separated social media links</span>
                        <textarea
                            required
                            name="message" 
                            class="px-4 py-2.5 text-gray-100 placeholder:text-gray-100 rounded-lg bg-gray-700 border-gray-600 focus:border-blue-400 focus:outline-none focus:ring focus:ring-opacity-40 focus:ring-blue-300 w-full">
                        {{ old('message') }}
                        </textarea>
                        <x-input-error :messages="$errors->get('message')" class="mt-2" />
                    </div>
                    <div class="text-center">
                        <x-primary-button type="submit" class="w-2/4">
                            Submit
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>