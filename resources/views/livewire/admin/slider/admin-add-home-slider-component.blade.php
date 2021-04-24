
<div class="container" style="padding:30px 0px">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<div class="panel-title">Add Home Slider</div>
						</div>
						<div class="col-md-6">
							<a href="{{route('admin.homesliders')}}" class="btn btn-success pull-right">View Home Slider</a>
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
                            <form wire:submit.prevent="homesliderStore" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="slider_title">Slider Title</label>
                                    <input type="text" id="slider_title" class="form-control" wire:model="slider_title" required>
                                </div>
                                <div class="form-group">
                                    <label for="slider_subtitle">Slider Subtitle</label>
                                    <input type="text" id="slider_subtitle" class="form-control" wire:model="slider_subtitle" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control" wire:model="price" required>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" id="link" class="form-control" wire:model="link" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select id="status" class="form-control" wire:model="status" required>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" wire:model="image" required>
                                    @if($image)
                                    <img src="{{$image->temporaryUrl()}}" style="width:120px;">
                                    @endif
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
