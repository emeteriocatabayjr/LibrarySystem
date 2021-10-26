<?php include ('includes/connection.php');
session_start(); ?>
<?php include 'includes/header.php'?>
<?php include 'includes/navbar_user.php'?>
<div class="container p-3">
    <h3 class="text-center">List of your Returned Books</h3>
    <hr>
 
    <div id="result"></div>
</div>
<hr>
</body>
<?php include 'includes/footer.php';?>
</html>
<script type="text/javascript">
	
	   $(document).ready(function(){

        load_data();

        function load_data(query)
        {
            $.ajax({
                url:"returned_fetch.php",
                method:"POST",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }
    });

</script>