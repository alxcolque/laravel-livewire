<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Título
        <span class="text-secondary">{{$app->title}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Url
        <span>{{$url}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Fecha de creación
        <span class="text-secondary">{{$app->created_at}}</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Fecha de actualización
        <span class="text-secondary">{{$app->updated_at}}</span>
    </li>
</ul>
<div class="text-end">
    <button type="button" wire:click="closeModal" data-bs-dismiss="modal"
        class="btn btn-secondary">Cerrar</button>

    <button type="button" wire:click="edit({{ $app->id }})" class="btn btn-success">Editar</button>

</div>
