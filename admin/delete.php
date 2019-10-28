<form class="" action="<?php echo $_GET['url']; ?>" method="post">
    <input type="hidden" name="getDate" value="<?php echo $_GET['date']; ?>">
    <input type="hidden" name="key" value="<?php echo $_GET['key']; ?>">

    <div class="modal-body">
        Are you sure you want to delete?
    </div>
    <div class="modal-footer">
        <button type="submit" name="delete" class="btn btn-danger">
            <i class="fa fa-trash"></i>
        </button>
    </div>
</form>
