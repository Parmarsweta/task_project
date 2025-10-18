@component('mail::message')
# Hello {{ $first_name }},

Thank you for registering!

Your email verification code is:

# **{{ $verificationCode }}**

Please use this code to verify your email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
