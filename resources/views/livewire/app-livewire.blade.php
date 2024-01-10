<div>
    @include('apps.create')
    @include('apps.delete')

    <div class="row">
        {{-- Alert --}}
        <div class="col-xl-6 col-md-6 col-6">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img"
                        aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <strong>Alert!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        {{-- Add New --}}
        <div class="col-xl-6 col-md-6 col-6 text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                Nuevo registro
            </button>
        </div>
    </div>

    <div class="card shadow mt-3">
        <div class="card-body">
            <form class="input-group mb-3" wire:submit="search">
                <input wire:model="query" type="search" class="form-control" placeholder="Buscar..." aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Buscar</button>

            </form>
            <div class="table-responsive mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Url</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($apps as $app)
                            <tr>
                                <td>{{ $app->id }}</td>
                                <td>
                                    {{ $app->title }}
                                </td>
                                <td>
                                    {{ $app->url }}
                                </td>
                                <td>
                                    <button wire:click="show({{ $app->id }})" data-bs-toggle="modal"
                                        data-bs-target="#myModal" class="btn btn-info btn-sm">View</button>
                                    <button wire:click="edit({{ $app->id }})" data-bs-toggle="modal"
                                        data-bs-target="#myModal" class="btn btn-success btn-sm">Edit</button>
                                    <button wire:click="delete({{ $app->id }})" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" class="btn btn-danger btn-sm">Eliminar</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" align="center">
                                    <span class="text-danger"> No hay registro</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            {{ $apps->links() }}
            </div>
        </div>
    </div>

   {{-- Handle Browser Dispatched Events --}}
    <script>
        window.addEventListener('close-modal', event => {
            $('#myModal').modal('hide');
            $('#deleteModal').modal('hide');
        });
    </script>
</div>
