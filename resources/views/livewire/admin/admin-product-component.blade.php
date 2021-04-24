<div class="container" style="padding:30px 0px">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">All Product</div>
						</div>
						<div class="col-md-6">
							<a href="{{route('admin.add.product')}}" class="btn btn-success pull-right">Add Product</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>SL</th>
								<th>Image</th>
								<th>Name</th>
								<th>Stock</th>
								<th>Price</th>
								<th>Category</th>
								<th>Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($products as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>
									<img src="{{ asset('assets/images/products/'.$value->image)}}" alt="{{$value->name}}" width="60px">
								</td>
								<td>{{$value->name}}</td>
								<td>{{$value->stock_status}}</td>
								<td>${{$value->regular_price}}</td>
								<td>{{$value->category->name}}</td>
								<td>{{$value->created_at}}</td>
								<td>
									<a href="#" class="btn btn-sm btn-success">Edit</a>
									<a href="#" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$products->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
