<div wire:ignore.self class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="ModalLabel">
                    {{ $isView ? 'Detalle' : ($isEdit ? 'Actualizar' : 'Crear') }}
                    Aplicación</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($isView)
                    @include('apps.show')
                @else
                {{-- Form starts --}}
                <form wire:submit.prevent="save" autocomplete="off">
                    <div class="form-floating">
                        <input type="text" wire:model="title" class="form-control" placeholder="">
                        <label class="text-secondary">Título <span class="text-danger">*</span></label>

                    </div>
                    @error('title')
                        <small class="ps-3 text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-floating">
                        <input type="text" class="form-control" wire:model="url" placeholder="">
                        <label class="text-secondary">Url</label>
                    </div>
                    @error('url')
                        <small class="ps-3 text-danger">{{ $message }}</small>
                    @enderror

                    <div class="text-end">
                        <button type="button" wire:click="closeModal" data-bs-dismiss="modal"
                            class="btn btn-secondary">Cerrar</button>

                        {{-- If not view then only show the submit button --}}
                        @if (!$isEdit)
                            <button type="submit" class="btn btn-success">Guardar</button>
                        @else
                            <button type="submit" class="btn btn-success">Actualizar</button>
                        @endif
                    </div>

                </form>
                {{-- Form ends --}}
                @endif

            </div>
        </div>
    </div>
</div>
{{-- Modal ends --}}
