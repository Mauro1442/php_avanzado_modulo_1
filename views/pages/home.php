<?php


if(!isset($_SESSION["validateLogin"])){

	echo '<script>window.location = "index.php?route=login";</script>';

	return;

}else{

	if($_SESSION["validateLogin"] != "ok"){

		echo '<script>window.location = "index.php?route=login";</script>';

		return;
	}
	
}

$users = FormController::ctrSelectUser(null, null);


?>



<table class="table">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Email</th>
			<th>Created</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>

	<?php foreach ($users as $key => $value): ?>

		<tr>
			<td><?php echo ($key+1); ?></td>
			<td><?php echo $value["name"]; ?></td>
			<td><?php echo $value["email"]; ?></td>
			<td><?php echo $value["created"]; ?></td>
			<td>

			<div>		
				<a href="index.php?route=edit&id=<?php echo $value["id"]; ?>" class="">Edit</a>

				<form method="post">

					<input type="hidden" value="<?php echo $value["id"]; ?>" name="deleteUser">
					
					<button type="submit" class="">Delete</button>

					<?php

						$delete = new FormController();
						$eliminar -> ctrDeleteUser();

					?> 

				</form>			

			</div>
				

			</td>
		</tr>
		
	<?php endforeach ?>	
	
	</tbody>
</table>