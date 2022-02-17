
<html>
   <head>
      <title>Login Page</title>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
   </head>
   <body bgcolor = "#FFFFFF">
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">
               <form method = "post" action = "{{ route('login') }}">
                  <label>Application  :</label><input type = "text" name = "app" class = "box" value="demoapp"/><br/><br />
                  <label>UserName  :</label><input type = "text" name = "user" class = "box" value="Admin"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "pass" class = "box" value="123"/><br/><br />
                  <label>Language  :</label><input type = "text" name = "lang" class = "box" value="bg"/><br/><br />
                  <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                  <input type = "submit" value = " Submit " name = "btn"/><br />
                  @if ($errors->any())
                    <div class="alert alert-danger">
                     <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                    </div>
                  @endif
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
