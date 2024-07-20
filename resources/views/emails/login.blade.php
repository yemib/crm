<div  style="background-color: rgb(163, 160, 160) ; ">
    <br/>
    <h3 align="center"> {{  config('app.name') }} </h3>
<div  style="background-color: white ; margin: 30px">
    <p  style="padding: 20px">
Dear   {{  $mailData['name'] }},
<br/>
We hope this message finds you well.  Here are your login details :
<br/>
Username: {{  $mailData['email'] }}
    <br/>
Password: {{   $mailData['password'] }}
<br/>

Please log in at   <a  href="{{  config('app.url') }}"> {{  config('app.url') }}    </a> and change your password immediately for security reasons.
<br/>
 <a   href="{{  config('app.url') }}">
    <button  style="background:green; color:white">   Website  </button>
  </a>
  <br/>
If you have any questions or concerns, feel free to contact the support.
<br/>

    </p>

</div>

</div>
