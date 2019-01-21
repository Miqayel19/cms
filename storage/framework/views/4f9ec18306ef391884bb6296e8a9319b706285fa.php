<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title">Ticket Deletion!!!!</h4>
        </div>
        <div class="modal-body">
            <p>Are you sure to Delete the ticket <?php echo e($ticket->name); ?>?</p>
        </div>
        <div class="modal-footer">
            <?php echo Form::open(['url'=> '/admin/tickets/'.$ticket->id,'method'=> 'DELETE']); ?>

            <button type="button" class="btn btn-outline" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline">Yes</button>
            <?php echo Form::close(); ?>

        </div>
    </div>
    <!-- /.modal-content -->
</div>