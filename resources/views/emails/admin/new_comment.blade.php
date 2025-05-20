@component('mail::message')
# New Comment Posted on "{{ $commentableTitle }}"

A new comment has been posted on the {{ $commentableType }} titled **"{{ $commentableTitle }}"**.

**Comment Details:**
- **Author:** {{ $commentAuthorName }} ({{ $commentAuthorEmail }})
- **Posted At:** {{ $postedAt }} GMT+7
- **Content:**
@component('mail::panel')
{{ $commentContent }}
@endcomponent

@if($commentUrl !== '#')
@component('mail::button', ['url' => $commentUrl])
View Comment in Admin
@endcomponent
@else
You can view this comment in the admin panel.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent