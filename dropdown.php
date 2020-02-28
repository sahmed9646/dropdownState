
<html>
<head>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
</head><?php include "connectdb.php"; ?>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'countryid='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}

function showMsg()
{

	$("#msgC").html($("#country-list option:selected").text());
	$("#msgS").html($("#state-list option:selected").text());
	return false;
}
</script>
<body >
	<form>
	<label style="font-size:20px" >Country:</label>
		<select name="country" id="country-list" class="demoInputBox"  onChange="getState(this.value);">
		<option value="">Select Country</option>
		<?php
		$sql1="SELECT * FROM country";
         $results=$dbhandle->query($sql1); 
		while($rs=$results->fetch_assoc()) { 
		?>
		<option value="<?php echo $rs["countryid"]; ?>"><?php echo $rs["countryname"]; ?></option>
		<?php
		}
		?>
		</select>
        
	
		<label style="font-size:20px" >State:</label>
		<select id="state-list" name="state"  >
		<option value="">Select State</option>
		</select>
		<button value="submit" onclick="return showMsg()">Submit</button>
	</form>

		Selected Country: <span id="msgC"></span><br>
		Selected State:  <span id="msgS"></span>
</body>
</html>