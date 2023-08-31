<div class="modal fade" id="changeStatusModal{{$id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Durumu Değiştir</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <select class="form-control new_status" advert-id="{{$id}}">
                    @foreach($statuses as $status)
                        @if(!$status->sold)
                            @if($status->id == $advertStatusId)
                                <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                            @else
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>

            </div>
        </div>
    </div>
</div>
