@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent


<h2>Nombre: {{ $name }}</h2>
<h2>Mensaje: {{ $msg }}</h2>