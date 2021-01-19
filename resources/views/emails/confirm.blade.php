Hola {{$user->name}}

verifique su cuenta:
{{route('verify',$user->verification_token)}}