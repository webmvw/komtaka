
<div class="container" style="padding:30px 0px">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">Home Category List</div>
						</div>
						<div class="col-md-6">
							<a href="{{route('admin.add.homecategory')}}" class="btn btn-success pull-right">Add Home Category</a>
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
								<th>Product Item</th>
                                <th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($home_categoryies as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
								<td>{{$value->category->name}}</td>
								<td>{{$value->item_no}}</td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete it?')" wire:click.prevent="deleteHomeCategory({{$value->id}})">Delete<a>
                                </td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
