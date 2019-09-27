<!DOCTYPE html>
<html>
<head>
    	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<style>
input[type=submit] {

    background: red; color: white; font-size: 1em;
	height:30px;width:30px;
}
body{
    background-image:url(<?php echo base_url().'/back.jpg';?>);
}

</style>
</head>
<body>
<center>
<h1>Myeksas database</h1>
<textarea id='ta2' placeholder='emails will appear here after conversion' rows='10' cols='30'>
  <?php if(!empty($users)){ 
                             foreach( $users as $user)
                                 {
                                 
                             echo $user["email"].",";
   
                                 
                                 }}
                            else{ echo "0 results in database";}
?>
</textarea>>
<br>
<button class='btn btn-primary' onclick='document.getElementById("ta").select();document.execCommand("copy");alert("Copied the text: " + document.getElementById("ta").value);'>Copy to clipboard</button>
<button class='btn btn-primary' onclick='window.location.href="<?php echo base_url().'index.php/control/home'?>"'>back</button>
<b class="logout"><a href="<?php echo base_url().'index.php/control/lo'; ?>">Log Out?</a></b>


<br>
<?php $msg = $this->session->userdata('msg'); 
                                                            if(!empty($msg)){
                                                                echo  "<div role='alert' class='alert alert-primary'>".$msg."</div>";
                                                            }
                                                            ?><br>
<table border='yes' style='table-layout: fixed;left-margin:2%;right-margin:2%;' class='table table-striped'>
 
  <?php 
  
  if(!empty($users)){ 
                             foreach( $users as $user)
                                 {
                                 
                            echo "<tr><td width=10%>".$user["id"]."</td><td style='overflow: hidden; width:50%; text-align: left; valign: top; whitespace: wrap;  word-break: break-all;'>".$user["email"]."</td><td width=10%><form method='POST' action='".base_url()."index.php/control/delete/".$user["id"]."'><input type='submit' value='x' class='rounded-circle'></form></td></tr>";

   
                                 
                                 }}
                            else{ echo "0 results in database";}
?>


</table>
</center>
</body>
</html>