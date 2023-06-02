<?php
   include ('config/config.php');
   include ('config/db.php');

   $sql = "SELECT * FROM `person`";
   $result = mysqli_query($conn, $sql);
   $sql_query = mysqli_num_rows($result);
   if($sql_query > 0){

       # fetch the query of the sqldb
       while($person = mysqli_fetch_assoc($result)){
           $persons[] = $person;
       }
   }
?>

<?php include('inc/header.php'); ?>
	<div class="container">
    <br/>
		<h2>Person's Log</h2>
        
        <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Log Date and Time</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
		
			<div class="well">
                <tbody>
                <?php 
                
                foreach($persons as $person) :?>
                    <tr>
                    <th><?php echo $person['pid'] ?></th>
                    <td><?php echo $person['lastname']?></td>
                    <td><?php echo $person['firstname']?></td>
                    <td><?php echo $person['address'] ?></td>
                    <td><?php echo $person['logdt'] ?></td>
                    <td>
                        <a href="edit_guestbook-list.php?id=<?php echo $person['pid'] ?>" class="btn btn-success">Edit</a>
                        <a href="delete-list.php?id=<?php echo $person['pid'] ?>" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                <?php endforeach; 
                ?>   
        
                </tbody>
            </div>
        </table>
        <br/>

            <button type="button" class="btn btn-dark btn-sm" onclick="document.location='guestbook-login.php'">Logout</button>
</div>
<?php include('inc/footer.php'); ?>