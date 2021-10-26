<div id="addbook_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Book</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" id="addbook_form" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Book Title:</label>
                        <input type="text" name="booktitle" id="booktitle" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Category:</label>
                        <input type="text" name="category" id="category" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Author:</label>
                        <input type="text" name="author" id="author" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Publisher Name:</label>
                        <input type="text" name="publishername" id="publishername" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Date Published</label>
                        <input type="date" name="datepublished" id="datepublished" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Copies</label>
                        <input type="number" name="copies" id="copies" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Remaining</label>
                        <input type="number" name="remaining" id="remaining" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <button id="addbtn" class="btn btn-success btn-block mt-4">Add</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div id="editbook_modal" class="modal fade">
    <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h4 class="modal-title">Edit Book Details</h4>
               <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body" id="borrower_detail">

           </div>
           <div class="modal-footer">

           </div>
       </div>
   </div>
</div>

<div id="upload_modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Upload Book Cover Photo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="borrower_photo">

            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>