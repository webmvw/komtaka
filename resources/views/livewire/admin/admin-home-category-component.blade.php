
<div class="container" style="padding:30px 0px">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">Add Home Category</div>
						</div>
						<div class="col-md-6">
							<a href="{{route('admin.show.homecategory')}}" class="btn btn-success pull-right">Home Category List</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">{{Session::get('success')}}</div>
                            @endif
                            @if(Session::has('error'))
                            <div class="alert alert-danger" role="alert">{{Session::get('error')}}</div>
                            @endif
                            <form wire:submit.prevent="homeCategoryStore">
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <select id="category" class="form-control" wire:model="category" required>
                                    	<option value="">Select Category</option>
                                    	@foreach($categories as $key=>$value)
                                    	<option value="{{$value->id}}">{{$value->name}}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item_no">Number Of Product Item</label>
                                    <input type="number" id="item_no" class="form-control" wire:model="item_no" required>
                                </div>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div> 
                        <div class="col-md-2"></div>           
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
