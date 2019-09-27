<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
body{
    background-image:url(<?php echo base_url().'/back.jpg';?>);
	background-size:cover;
	background-repeat:no-repeat;
}

</style>
</head>
<body>
<center>
<div class="container-fluid">
 
    <h1>Myeksas database</h1><b id="logout"><a href="<?php echo base_url().'index.php/control/lo'; ?>">Log Out?</a></b><br>
<p>Click the button to display the array values after the split.</p><br>
enter:<input type='text' id='tt'>
      <input type='button' id='b1' value='convert' class="btn btn-primary">
	  <br><br>
  <div class="container-fluid">
    <!-- Control the column width, and how they should appear on different devices -->
    <div class="row">
      <div class="col-sm">
          <form id='form1' method='POST' action="<?php echo base_url().'index.php/control/create'; ?>">
<input type='hidden' id='ss' name='email' >
<textarea placeholder='emails will appear here after conversion' id='ta' rows='10' cols='30'></textarea>
<br>
<button class="btn btn-outline-secondary" id='copy'>Copy to clipboard</button>
&nbsp;<input type='submit' value='submit to db' class="btn btn-primary"/> 
<input type='hidden' value='1' name='v'>
</form>
	<br>

	  </div>
	  
	  
      <div class="col-sm">

	
	  <textarea id='ta2' placeholder='emails will appear here after conversion' rows='10' cols='30'>
  
  <?php if(!empty($users)){ 
                             foreach( $users as $user)
                                 {
                                 
                             echo $user["email"].",";
   
                                 
                                 }}
                            else{ echo "0 results in database";}
?>
</textarea>
<!--
test<select id='yy'> &nbsp;&nbsp;&nbsp;
<?php
        if(!empty($users)){ 
                             foreach( $users as $user)
                                 {
                                 
                             echo "  <option value='".$user["email"]."'>".$user["email"]."</option>";
   
                                 
                                 }}
                            else{ echo "0 results in database";}
    
	
?>
</select >

-->    



<br>
<button class="btn btn-success" id='copy2'>Copy to clipboard</button>
	
	  </div>
    </div>
    <br>
    

   <!-- Footer -->
        <footer class="page-footer font-small blue" style='background-color:white'>

          <!-- Copyright -->
          <div class="footer-copyright text-center py-3">© 2019 Copyright:
           made by <a href="https://rupeshcodes.online"> Rupesh bhogle</a>
          </div>
          <!-- Copyright -->

        </footer>
        <!-- Footer -->
  </div>
</div>

</center>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>

$('#b1').click(function(){
	var str=$('#tt').val();

	if(str!=='')
	{
		var res=str.split(" ");
		$('#ss').val(res);
		$('#ta').val(res);
    }
	else{
	alert('please enter text first');
	}
	
});

$('#copy').click(function(){
	document.getElementById('ta').select();
	document.execCommand("copy");
	alert("Copied the text");


});

$('#copy2').click(function(){
	document.getElementById('ta2').select();
	document.execCommand("copy");
	alert("Copied the text");


});


$('#form1').submit(function(){
	
	if($('#ss').val()==='')
	{ alert("can't submit no emails converted");return false;}
	 else
	 {return true; }
});

</script>
<br><br>

</body>
</html>

