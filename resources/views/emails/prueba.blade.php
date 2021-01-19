@component('mail::message')
# Introduction
Hola {{$user->name}}

Verifique su cuenta:
@component('mail::button', ['url' => route('verify',$user->verification_token)])
Confirmar mi cuenta
@endcomponent

Thanks,<br>
{{ config('ApiRestful') }}
@endcomponent
