@if ($paginatedChamados->count() <= 0)
    <div class="alert alert-info text-center mt-1">
        Nenhum chamado {{ strtolower($status) }}.
    </div>
@else
    <div class="table-responsive">
        <table class="table table-sm table-dark table-striped">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Título</th>
                    <th>Usuário</th>
                    <th>Categoria</th>
                    <th>Técnico</th>
                    <th>Criado em</th>
                    <th>Atualização</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($paginatedChamados as $chamado)
                    <tr>
                        <td>{{ $chamado->id }}</td>
                        <td>{{ $chamado->titulo }}</td>
                        <td>{{ $chamado->user->name }}</td>
                        <td>{{ $chamado->categoria }}</td>
                        <td>{{ $chamado->tecnico->name ?? 'Não atribuído' }}</td>
                        <td>{{ $chamado->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $chamado->updated_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('service-desk.show', $chamado->id) }}" class="btn btn-sm btn-primary">Ver</a>
                            @if ($chamado->status == 'Aberto')
                                <a href="{{ route('service-desk.edit', $chamado->id) }}" class="btn btn-sm btn-warning">Atender</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row bg-dark d-flex justify-content-center text-white p-3">
        {{ $paginatedChamados->appends(['search' => $request->search ?? ''])->links('pagination::bootstrap-5') }}
    </div>
@endif
