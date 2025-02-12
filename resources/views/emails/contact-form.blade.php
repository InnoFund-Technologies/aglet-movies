@component('mail::message')
# New Contact Form Submission

**Name:** {{ $contact->name }}
**Email:** {{ $contact->email }}
**Subject:** {{ $contact->subject }}

**Message:**
{{ $contact->message }}

@component('mail::button', ['url' => route('admin.contacts.show', $contact->id)])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent