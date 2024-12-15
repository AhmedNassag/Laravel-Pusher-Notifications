<!-- start addCreateNotificationModal -->
<div class="modal" id="addCreateNotificationModal">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">Create Notification</h6>
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <!-- Form -->
                <form method="POST" action="{{ route('createNotification.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- content -->
                        <div class="col-12">
                            <label for="content" class="mr-sm-2">Content</label>
                            <textarea id="content" type="text" class="form-control mb-3" name="content" cols="7" rows="7">{{ old('content') }}</textarea>
                        </div>
                        <!-- photo -->
                        <div class="col-12">
                            <label for="photo" class="mr-sm-2">Photo</label>
                            <input type="file" name="photo" class="form-control mb-3" accept="image/*" data-height="70" />
                        </div>

                        <!-- Start select
                        <div class="col-12">
                            <label for="user" class="mr-sm-2">Choose</label>
                            <select class="form-control mb-3" name="user">
                                <option label="Choose one"></option>
                                <option value="">Name</option>
                            </select>
                        </div>
                        <!-- End select -->
                    </div>

                    <div class="modal-footer mt-3">
                        <button type="submit" class="btn btn-success ripple">Confirm</button>
                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end add modal -->
