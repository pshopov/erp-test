
<html>
   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h4><?php echo $_SESSION['order']; ?></h4>
      <h2><a href = "{{route('logout')}}">Sign Out</a></h2>
   </body>
</html>
