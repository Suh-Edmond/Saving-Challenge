@component('mail::message')
# Introduction

Hello sir you haven't saving to your challenges this week.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent