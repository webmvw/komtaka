<div>
    <div class="container" style="padding:30px 0px">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="panel-title">Edit Category</div>
    						</div>
    						<div class="col-md-6">
    							<a href="{{route('admin.categories')}}" class="btn btn-success pull-right">View Category</a>
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
                                <form wire:submit.prevent="categoryUpdate">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <input type="text" id="category_name" class="form-control" wire:model="category_name" wire:keyup="generateSlug" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_slug">Category Slug</label>
                                        <input type="text" id="category_slug" class="form-control" wire:model="category_slug" required>
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div> 
                            <div class="col-md-2"></div>           
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
