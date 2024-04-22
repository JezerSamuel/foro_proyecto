<div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Ingrese el folio del usuario:</span>
        <input type="text" class="form-control" wire:model="folio" wire:keydown.enter="search">
    </div>
    <label for="message" wire:model="message">{{$this->message}}</label>
</div>