{{-- @component('mail::message')
# Hello ,
 --}}
<div>

    Request for Approval: Discount Percentage Above 10% . <br/>
Please click the link below to Approve or  Reject the discount
</div>

<a    href="{{ $link }}">  {{ $link }} </a>

<br>
{{ config('app.name') }}
{{-- @endcomponent --}}
