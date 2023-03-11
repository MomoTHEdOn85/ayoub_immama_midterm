<div id="content" class="row">
<?php

echo 
			'<div class="col-12 med-col-2"><img id="empImage" alt="Employee Photo" src="images/'.$employees[0]->image.'"></div>
			<div id="empDetails" class=" "> <span class="centerDetails"><span class="label">Name:</span> '.$employees[0]->lname.', '.$employees[0]->fname.'<br>
			<div id="empDetails" class=" "> <span class="centerDetails"><span class="label">Position:</span> '.$employees[0]->job.'<br>
			<div id="empDetails" class=" "> <span class="centerDetails"><span class="label">Username:</span> '.$employees[0]->username.'<br>
			<div id="empDetails" class=" "> <span class="centerDetails"><span class="label">Password:</span> '.$employees[0]->password.'<br>
			<span class="label">Employee ID:</span> '.$employees[0]->id.'<br>
			<span class="label">Employee ID:</span> '.$employees[0]->id.'<br>'
		;
?>
<br><br>
<div id="content" class="row">
<?php	
echo '<a href="http://localhost:8888/pdo_employees/index.php?task=delete&id='.$employees[0]->id.'">delete employee</a><br>';
echo '<a href="http://localhost:8888/pdo_employees/index.php?task=update&id='.$employees[0]->id.'">update employee</a>';
?>
</div>