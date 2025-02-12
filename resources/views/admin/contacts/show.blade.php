<x-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white shadow-sm rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Contact Message Details</h2>

            <div class="space-y-4">
                <div>
                    <h3 class="text-gray-600 font-semibold">From</h3>
                    <p class="text-gray-800">{{ $contact->name }} ({{ $contact->email }})</p>
                </div>

                <div>
                    <h3 class="text-gray-600 font-semibold">Subject</h3>
                    <p class="text-gray-800">{{ $contact->subject }}</p>
                </div>

                <div>
                    <h3 class="text-gray-600 font-semibold">Message</h3>
                    <p class="text-gray-800 whitespace-pre-line">{{ $contact->message }}</p>
                </div>

                <div>
                    <h3 class="text-gray-600 font-semibold">Received</h3>
                    <p class="text-gray-800">{{ $contact->created_at->format('F j, Y g:i A') }}</p>
                </div>

                <div>
                    <h3 class="text-gray-600 font-semibold">Status</h3>
                    <p class="text-gray-800">{{ ucfirst($contact->status) }}</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>