@extends ('main')

@section('content')
	<div class="col-sm-8">
		<h1>Create a Post</h1>
		@include ('partials.errors')
		<form method="POST" action="/posts">
			{{csrf_field()}}
			<div class="form-group">
				<label for="postTitle">Title:</label>
			    <input type="text" class="form-control" id="postTitle" name="postTitle">
			</div>
			<div class="form-group">
				<label for="postBody">Body:</label>
			    <textarea class="form-control" id="postBody" name="postBody"></textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn">Submit</button>
			</div>
		</form>
	</div>
@endsection