@extends('layout/main')

@section('title', 'Laravel 5.8 | Todolists')

@section('container')
<div class="container">
	<div class="row">
		<div class="col-10">
			<h1 class="mt-3">Todo Lists</h1>
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<form method="post" action="">
				@csrf
				<div class="input-group mb-3">
					<input type="text" class="form-control @error('todo') is-invalid @enderror" placeholder="Add todo...." name="todo" autofocus required>
					<div class="input-group-append">
						<button class="btn btn-outline-secondary" type="submit">Add</button>
					</div>
				</div>
			</form>
			<table class="table text-center">
				<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Todo</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php $count = 1; ?>
					@foreach($list as $tl)
					<tr>
						<th scope="row">{{$list->perPage()*($list->currentPage()-1)+$count}}</th>
						<?php $count++; ?>
						<td>{{$tl->todo}}</td>
						<td>
							<form action="{{$tl->id}}" method="post" id="form_update">
								@method('patch')
								@csrf
								<button type="submit" class="badge badge-success button">Done</button>
							</form>
							<form action="{{$tl->id}}" method="post" id="form_delete">
								@method('delete')
								@csrf
								<button type="submit" class="badge badge-danger button">Remove</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $list->links() }}
		</div>
	</div>
</div>
@endsection