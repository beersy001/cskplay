<h1>members</h1>
<table>
	<tr>
		<th>username</th>
		<th>number of games played</th>
		<th>gameballs played</th>
		<th>current position</th>
		<th>average distance</th>
	</tr>
<?php

//sizeof($user['User']['games'][date(ym)]['choices'])

foreach ($members as $id => $user) {
	echo '<tr>';
	echo '<td>' . $user['User']['username'] . '</td>';
	echo '<td>' . '0' . '</td>';
	echo '<td>0</td>';
	echo '<td>0</td>';
	echo '<td>0</td>';
	echo '</tr>';
}
?>
</table>