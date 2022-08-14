{{-- modal add bank group --}}
<div class="modal fade" id="bank_group_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="/bank-group" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add Bank Group
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>Long Name</label>
                        <input type="hidden" name="bank_group_id" id="bank_group_id">
                        <input id="bank_group_name" name="bank_group_name" class="form-control" type="text"
                            placeholder="Bank Indonesia">
                    </div>
                    <div class="form-group">
                        <label>Short Name</label>
                        <input id="bank_group_code" name="bank_group_code" class="form-control" type="BI">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input id="photo_path" name="photo_path" class="form-control" type="BI">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>