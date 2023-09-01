<div class="modal fade" id="addExpense{{$id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Harcama Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="expenseType{{$id}}" class="form-label">Masraf Türü</label>
                    <input type="text" class="form-control" id="expenseType{{$id}}" placeholder="Noter, Tamir, Evrak...">
                </div>
                <div class="mb-3">
                    <label for="expenseAmount{{$id}}" class="form-label">Masraf Tutarı</label>
                    <input type="text" class="form-control" id="expenseAmount{{$id}}" placeholder="₺0.00"
                           data-inputmask="'alias': 'currency', 'prefix':'₺'" style="text-align: right;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary saveExpense" id="{{$id}}" advert-id="{{$id}}"> Kaydet</button>
            </div>
        </div>
    </div>
</div>
