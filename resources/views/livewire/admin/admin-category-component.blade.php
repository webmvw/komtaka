<div>
    <div class="container" style="padding:30px 0px">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					Categories
    				</div>
    				<div class="panel-body">
    					<table class="table table-striped">
    						<thead>
    							<tr>
    								<th>SL</th>
    								<th>Category Name</th>
    								<th>Category Slug</th>
    								<th>Action</th>
    							</tr>
    						</thead>
    						<tbody>
    							@foreach($categories as $key=>$value)
    							<tr>
    								<td>{{$key+1}}</td>
    								<td>{{$value->name}}</td>
    								<td>{{$value->slug}}</td>
    								<td>
    									<a href="#" class="btn btn-sm btn-success">Edit</a>
    									<a href="#" class="btn btn-sm btn-danger">Delete</a>
    								</td>
    							</tr>
    							@endforeach
    						</tbody>
    					</table>
    					{{$categories->links()}}
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
