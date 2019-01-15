<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">Group Deletion!!!!</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure to Delete the group {{$group->name}}?</p>
        </div>
        <div class="modal-footer">
            {!! Form::open(['url'=> '/api/groups/'.$group->id,'method'=> 'DELETE']) !!}
            <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline">Yes</button>
            {!! Form::close() !!}
        </div>
    </div>
    <!-- /.modal-content -->
</div>