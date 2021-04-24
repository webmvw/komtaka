<div>
    <div class="container" style="padding:30px 0px">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-default">
    				<div class="panel-heading">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="panel-title">Edit Product</div>
    						</div>
    						<div class="col-md-6">
    							<a href="{{route('admin.products')}}" class="btn btn-success pull-right">View Product</a>
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
                                <form wire:submit.prevent="productUpdate" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" id="product_name" class="form-control" wire:model="product_name" wire:keyup="generateSlug" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="product_slug">Product Slug</label>
                                        <input type="text" id="product_slug" class="form-control" wire:model="product_slug" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea class="form-control" wire:model="short_description" id="short_description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" wire:model="description" id="description" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="regular_price">Regular Price</label>
                                        <input type="number" wire:model="regular_price" id="regular_price" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sale_price">Sale Price</label>
                                        <input type="number" wire:model="sale_price" id="sale_price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="SKU">SKU</label>
                                        <input type="text" id="SKU" wire:model="SKU" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_status">Stock Status</label>
                                        <select id="stock_status" wire:model="stock_status" class="form-control">
                                            <option value="instock">instock</option>
                                            <option value="outofstock">outofstock</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="feature">Feature</label>
                                        <select id="feature" wire:model="feature" class="form-control">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="quantity">Quantity</label>
                                        <input type="number" wire:model="quantity" id="quantity" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select id="category" wire:model="category" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                                        <input type="file" id="image" wire:model="newImage" class="form-control">
                                        @if($newImage)
                                        <img src="{{$newImage->temporaryUrl()}}" style="width:120px">
                                        @elseif($image)
                                        <img src="{{asset('assets/images/products/'.$image)}}" style="width:120px">
                                        @endif
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
