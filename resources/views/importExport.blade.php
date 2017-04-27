<html lang="en">

<head>

	<title>Import - Export</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

</head>


<body style="padding-top:60px;">
@include('shared.head_nav')

<br/>

<br/>

	<div class="container">		

		<div class="panel panel-primary">

		  <div class="panel-heading">

		    <h3 class="panel-title" style="padding:12px 0px;font-size:25px;"><strong>import & export file into database</strong></h3>

		  </div>

		  <div class="panel-body">


		  		@if ($message = Session::get('success'))

					<div class="alert alert-success" role="alert">

						{{ Session::get('success') }}

					</div>

				@endif


				@if ($message = Session::get('error'))

					<div class="alert alert-danger" role="alert">

						{{ Session::get('error') }}

					</div>

				@endif


				<h3>Export File Form:</h3>

				<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 20px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">


					<input type="file" name="import_file" />

					{{ csrf_field() }}

					<br/>


					<button class="btn btn-primary">Import ods or Excel File</button>


				</form>


		  </div>

		</div>

	</div>


</body>


</html>