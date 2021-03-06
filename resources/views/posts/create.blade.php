@extends ('main')

@section('content')
	<div class="col-sm-8">
		<h1>Create a Post</h1>
		@include ('partials.errors')
		<form method="POST" action="/posts">
			{{csrf_field()}}
			<div class="form-group">
				<label for="title">Title:</label>
			    <input type="text" class="form-control" id="title" name="title" required>
			</div>
			<div class="form-group">
				<label for="body">Body:</label>
			    <textarea class="form-control" id="body" name="body" required></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn">Submit</button>
			</div>
		</form>
	</div>
@endsection