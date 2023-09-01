<div class="modal fade" id="sell{{$id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Satış Yap</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <label for="amount{{$id}}" class="mb-2">Satış Tutarı:</label>
                <input type="text" class="form-control" id="amount{{$id}}" placeholder="₺0.00"
                       data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveSell" advert-id="{{$id}}">Satışı Onayla</button>
            </div>
        </div>
    </div>
</div>
