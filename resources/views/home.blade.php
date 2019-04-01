</!DOCTYPE html>
<html>
<head>
	<title>WEB APP</title>
	<link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ url('js/jquery-3.1.0.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/bootstrap.js') }}"></script>
</head>
<body>
	<div class="container">
		<!-- nav bar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="{{  url('/')}}">Web Application</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor03">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="{{  url('/')}}">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="{{  url('/create')}}">Create</a>
		      </li>
		    </ul>
		  </div>
		</nav>
		<!-- end nav bar -->

		   @if(session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
        @endif
		<div class="row">
			<!-- table -->
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Name</th>
			      <th scope="col">Phone</th>
			      <th scope="col">Email</th>
			      <th scope="col">Created_at</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			   @if(count($users) > 0)
			   		@foreach($users -> all() as $user)
			    <tr>
			      <td>{{ $user ->id }}</td>
			      <td>{{ $user ->name }}</td>
			      <td>{{ $user ->phone }}</td>
			      <td>{{ $user ->email }}</td>
			      <td>{{ $user ->created_at }}</td>
			      <td>
			      	<a href='{{ url("/update/{$user ->id }") }}' class="btn btn-outline-primary btn-sm">Update</a>
			      	<a href='{{ url("/delete/{$user -> id}") }}' class="btn btn-outline-danger btn-sm">Delete</a>
			      </td>
			    </tr>
			    	@endforeach
			   @endif
			  </tbody>
			</table> 
		</div>
	</div>

	<!-- session message timer -->
			<script>
          $('div.alert').delay(1500).slideUp(300);
        </script>
        <!-- end -->
</body>
</html>