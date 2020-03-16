@component('mail::message')
# Welcome to cookBoss community

You like to cook?Or simply to eat? By joining us you will be part of something great and tasty

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }} team
@endcomponent
