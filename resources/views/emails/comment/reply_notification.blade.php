@component('mail::message')
# Hi {{ $parentCommentAuthorName }},

**{{ $replyAuthorName }}** has replied to your comment on **"{{ $commentableTitle }}"**.

**Their reply (posted on {{ $replyDate }} GMT+7):**
@component('mail::panel')
{{ $replyContent }}
@endcomponent

@if($commentableUrl !== '#')
@component('mail::button', ['url' => $commentableUrl])
View the conversation
@endcomponent
@else
You can view this conversation on the website.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent