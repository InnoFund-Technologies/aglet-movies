<x-layout>
    <div class="h-screen flex items-center justify-center mx-auto">
        <div class="w-full max-w-3xl mx-auto font-[sans-serif] p-6 bg-gray-800 rounded-3xl">
            <div class="text-center mb-12 sm:mb-16">
            <h2 class="text-gray-200 text-center text-2xl font-bold">Sign up into your account</h2></h2> 
            </div>

            <form>
                <div class="grid sm:grid-cols-2 gap-6">
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">First Name</label>
                        <x-text-input name="name" type="text" placeholder="Enter name" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Last Name</label>
                        <x-text-input name="lname" type="text" placeholder="Enter last name" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Email Id</label>
                        <x-text-input name="email" type="text" placeholder="Enter email" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Mobile No.</label>
                        <x-text-input name="number" type="number" placeholder="Enter mobile number" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Password</label>
                        <x-text-input name="password" type="password" placeholder="Enter password" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Confirm Password</label>
                        <x-text-input name="cpassword" type="password" placeholder="Enter confirm password" />
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <x-primary-button class="w-1/4">
                        Sign up
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-layout>