<html>
<head>
	<title>Mini Project Fiche produits - PHP PDO Ajax CRUD Bootstrap Modals</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>
		body
		{
			margin:0;
			padding:0;
			background-color:#f1f1f1;
		}
		.box
		{
			width:1270px;
			padding:20px;
			background-color:#fff;
			border:1px solid #ccc;
			border-radius:5px;
			margin-top:25px;
		}
	</style>
</head>
<body>
<div class="container box">
	<h1 align="center">Mini Project @Hamdi - Gestion commandes</h1>
	<div class="table-responsive">
		<br />
		<div align="right">
			<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">+ ajouter commande</button>
		</div>
		<br />
		<table id="user_data" class="table table-bordered table-striped">
			<thead>
			<tr>
				<th width="10%">Photo</th>
				<th width="10%">Préom</th>
				<th width="10%">Nom</th>
				<th width="10%">Email</th>
				<th width="10%">Tel</th>
				<th width="10%">Adresse</th>
				<th width="5%">Ville</th>
				<th width="5%">Code postal</th>
				<th width="10%">Produit</th>
				<th width="10%">Modifier</th>
				<th width="10%">Supprimer</th>
			</tr>
			</thead>
		</table>
	
	</div>
</div>
</body>
</html>

<!-- Modal commande -->
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter commande</h4>
				</div>
				
				<div class="modal-body">
					
					<div class="form-row">
						<h5>Client : </h5>
						<div class="form-group col-md-6">
							<label for="first_name">Prénom</label>
							<input type="text" name="first_name" id="first_name" placeholder="Prénom" class="form-control" required="true"/>
						</div>
						<div class="form-group col-md-6">
							<label for="last_name">Nom</label>
							<input type="text" name="last_name" id="last_name" placeholder="Nom" class="form-control" required="true"/>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email" required="true"/>
						</div>
						
						<div class="form-group col-md-6">
							<label for="tel">Téléphobe</label>
							<input type="text" class="form-control" id="tel" placeholder="+33 7 69 75 15 69" required="true"/>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label for="produit">Liste produit :</label>
							<select class="form-control" id="produit">
								<option value="PROD_1">PROD_1</option>
								<option value="PROD_2">PROD_2</option>
								<option value="PROD_3">PROD_3</option>
								<option value="PROD_4">PROD_4</option>
							</select>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<h5>Adresse livraison :</h5>
							<label for="adresse">Adresse</label>
							<input type="text" class="form-control" id="adresse" placeholder="rue, avenue, bd, ..."/>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="ville">Ville</label>
							<input type="text" class="form-control" id="ville" placeholder="Paris"/>
						</div>
						<div class="form-group col-md-6">
							<label for="cp">Code postal</label>
							<input type="text" class="form-control" id="cp" placeholder="75019"/>
						</div>
					</div>
					
					<div class="form-row">
						<div class="form-group col-md-12">
							<label>Selectionner une image</label>
							<input type="file" name="user_image" id="user_image" />
							<span id="user_uploaded_image"></span>
						</div>
					</div>
				
				
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Addr" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Quitter</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!-- End modal -->

<script type="text/javascript" language="javascript" >
	$(document).ready(function(){
		$('#add_button').click(function(){
			$('#user_form')[0].reset();
			$('.modal-title').text("Ajouter une commande");
			$('#action').val("Add");
			$('#operation').val("Add");
			$('#user_uploaded_image').html('');
		});
		
		var dataTable = $('#user_data').DataTable({
			"processing":true,
			"serverSide":true,
			"order":[],
			"ajax":{
				url:"fetch.php",
				type:"POST"
			},
			"columnDefs":[
				{
					"targets":[0, 3, 4],
					"orderable":false,
				},
			],
			
		});
		
		$(document).on('submit', '#user_form', function(event){
			event.preventDefault();
			
			var firstName = $('#first_name').val();
			var lastName = $('#last_name').val();
			var email = $('#email').val();
			var tel = $('#tel').val();
			var produit = $('#produit').val();
			var adresse = $('#adresse').val();
			var ville = $('#ville').val();
			var cp = $('#cp').val();
			var extension = $('#user_image').val().split('.').pop().toLowerCase();
			
			if(extension != '') {
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
				{
					alert("Invalid Image File");
					$('#user_image').val('');
					return false;
				}
			}
			
			if(firstName != '' && lastName != '' && tel != '' && email != '') {
				$.ajax({
					url:"insert.php",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert(data);
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				alert("Fields are Required");
			}
		});
		
		$(document).on('click', '.update', function(){
			var user_id = $(this).attr("id");
			$.ajax({
				url:"fetch_single.php",
				method:"POST",
				data:{user_id:user_id},
				dataType:"json",
				success:function(data)
				{
					$('#userModal').modal('show');
					$('#first_name').val(data.first_name);
					$('#last_name').val(data.last_name);
					$('#email').val(data.email);
					$('#tel').val(data.tel);
					$('#produit').val(data.produit);
					$('#adresse').val(data.adresse);
					$('#ville').val(data.ville);
					$('#cp').val(data.cp);
					$('.modal-title').text("Edit User");
					$('#user_id').val(user_id);
					$('#user_uploaded_image').html(data.user_image);
					$('#action').val("Edit");
					$('#operation').val("Edit");
				}
			})
		});
		
		$(document).on('click', '.delete', function(){
			var user_id = $(this).attr("id");
			if(confirm("Are you sure you want to delete this?"))
			{
				$.ajax({
					url:"delete.php",
					method:"POST",
					data:{user_id:user_id},
					success:function(data)
					{
						alert(data);
						dataTable.ajax.reload();
					}
				});
			}
			else
			{
				return false;
			}
		});
		
		
	});
</script>