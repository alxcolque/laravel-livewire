{{-- Delete Book Modal --}}
<div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="deleteModalLabel">ELIMINACIÓN</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            {{-- Form starts --}}
            <form wire:submit.prevent="destroy">
                <div class="modal-body">
                    <h5 class="ps-3">¿Seguro desea eliminar este registro?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm" id="">Confirmar</button>
                    <button type="button" wire:click="closeModal" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>


        </div>
    </div>
</div>
{{-- Delete Modal ends --}}
