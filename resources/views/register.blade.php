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
                        <input name="name" type="text" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter name" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Last Name</label>
                        <input name="lname" type="text" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter last name" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Email Id</label>
                        <input name="email" type="text" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter email" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Mobile No.</label>
                        <input name="number" type="number" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter mobile number" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Password</label>
                        <input name="password" type="password" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter password" />
                    </div>
                    <div>
                        <label class="text-gray-400 text-sm mb-2 block font-medium">Confirm Password</label>
                        <input name="cpassword" type="password" class="w-full rounded-lg py-3 px-4 bg-gray-600 text-gray-100 border-none outline-0 text-sm inset ring-1 ring-gray-600 focus:ring-[#FF2D20] hover:ring-[#FF2D20]" placeholder="Enter confirm password" />
                    </div>
                </div>

                <div class="mt-8">
                    <button type="button" class="block w-44 mx-auto py-3 px-4 text-sm tracking-wide rounded-lg text-white bg-[#FF2D20] hover:bg-[#FF2D20] focus:outline-none">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>