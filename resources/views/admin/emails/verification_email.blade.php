@component('mail::message')
# {{ $mailData['title'] }}
  
Verify your account 
  
@component('mail::button', ['url' => $mailData['url']])
Verify Account
@endcomponent
  
Thanks,

Fresh store
@endcomponent