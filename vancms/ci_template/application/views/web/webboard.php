<h1>Data List.</h1>
<table cellpadding="5" cellspacing="0" border="1">
<?php
if($q->num_rows() > 0){
	foreach($q->result() as $r){
		echo '<tr><td>'.$r->id.'</td><td>'.$r->title.'</td></tr>';
	}
}else{
	echo '<tr><td colspan="2">No data!</td></tr>';	
}
?>
</table>
