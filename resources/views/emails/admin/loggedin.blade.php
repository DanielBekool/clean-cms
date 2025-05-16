<x-mail::message>
    # Admin User Logged In

    A user has logged into the admin panel.

    **User Details:**
    - **Name:** {{ $userName }}
    - **Email:** {{ $userEmail }}
    - **Login Time:** {{ $loginTime }}

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
