
<html>
   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h4><?php echo $_SESSION['order']; ?></h4>
      <h2><a href = "<?php echo e(route('logout')); ?>">Sign Out</a></h2>
   </body>
</html>
<?php /**PATH C:\Users\aio\my_project_name\example-app\resources\views/welcome.blade.php ENDPATH**/ ?>