<div>
    <div class="container" style="padding:30px 0px">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="panel-title">Categories</div>
    						</div>
    						<div class="col-md-6">
    							<a href="{{route('admin.add.category')}}" class="btn btn-success pull-right">Add Category</a>
    						</div>
    					</div>
    				</div>
    				<div class="panel-body">
                        @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('success')}}
                        </div>
                        @endif
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
    									<a href="{{route('admin.edit.category', $value->slug)}}" class="btn btn-sm btn-success">Edit</a>
    									<a href="#" onclick="return confirm('Are you sure to delete it?')" wire:click.prevent="deleteCategory({{$value->id}})" class="btn btn-sm btn-danger">Delete</a>
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
