<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">{{ $title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    @if($render)
        {!! $data->$column !!}
    @else
        {{ $data->$column }}
    @endif
  </div>