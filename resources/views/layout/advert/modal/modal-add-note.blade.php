<div class="modal fade" id="addNote{{$id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Not Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <textarea class="form-control" id="note{{$id}}" cols="30" rows="10" placeholder="Notunuzu girin..."></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveNote" advert-id="{{$id}}">Kaydet</button>
            </div>
        </div>
    </div>
</div>
