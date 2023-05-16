@component('mail::message')
# Freshshop {{ $mailData['title'] }}

Reset your account Freshshop password

@component('mail::button', ['url' => $mailData['url']])
Create new password
@endcomponent

Thanks,
Freshshop
@endcomponent
