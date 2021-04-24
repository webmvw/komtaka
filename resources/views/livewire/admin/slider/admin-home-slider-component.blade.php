
<div class="container" style="padding:30px 0px">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">All Home Slider</div>
						</div>
						<div class="col-md-6">
							<a href="{{route('admin.add.homeslider')}}" class="btn btn-success pull-right">Add Home Slider</a>
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
                                <th>Image</th>
								<th>Title</th>
								<th>Subtitle</th>
                                <th>Price</th>
                                <th>Link</th>
                                <th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($homeSliders as $key=>$value)
							<tr>
								<td>{{$key+1}}</td>
                                <td>
                                    <img src="{{asset('assets/images/homeslider/'.$value->image)}}" alt="{{$value->title}}" style="width:120px">
                                </td>
								<td>{{$value->title}}</td>
								<td>{{$value->subtitle}}</td>
                                <td>{{$value->price}}</td>
                                <td>{{$value->link}}</td>
                                <td>
                                    @if($value->status == '1')
                                    Active
                                    @else
                                    Inactive
                                    @endif
                                </td>
								<td>
									<a href="{{route('admin.edit.homeslider', $value->id)}}" class="btn btn-sm btn-success">Edit</a>
									<a href="#" onclick="return confirm('Are you sure to delete it?')" wire:click.prevent="deleteHomeSlider({{$value->id}})" class="btn btn-sm btn-danger">Delete</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$homeSliders->links()}}
				</div>
			</div>
		</div>
	</div>
</div>
