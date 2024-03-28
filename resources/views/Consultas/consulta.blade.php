@extends ('Plantillas.Plantilla')
@section('titulo', 'Consulta')

@section('contenido')

    @if (session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    <h1>Lista de consulta</h1>

    <div class="contenedor d-flex justify-content-between align-items-center">
        <div>
            <div class="form-group">
                <form action="{{ route('consulta.buscar') }}" method="GET" class="d-flex">
                    <input type="text" name="busqueda" id="busqueda" oninput="submitForm()" placeholder="Buscar consulta"
                           value="{{ request('busqueda') }}">
                    <input type="date" name="desde" id="desde" oninput="submitForm()" value="{{ request('desde', Carbon\Carbon::now()->subMonth()->toDateString()) }}">
                    <input type="date" name="hasta" id="hasta" oninput="submitForm()" value="{{ request('hasta', Carbon\Carbon::now()->toDateString()) }}">
                </form>
            </div>

            <script>
                function submitForm() {
                    document.querySelector('form').submit();
                }
            </script>
        </div>
        <div>
            <a type="button" href="{{ route('consulta.create') }}" class="btn btn-warning"><i class="bi bi-person-add"></i>
                Agregar</a>
        </div>
    </div>
    <br>


    <table class="table">
        <thead class="table table-dark table-strid">
            <tr>

                <th scope="col">Nombre</th>
                <th scope="col">DNI</th>
                <th scope="col">Fecha visita</th>
                <th>Ver consulta</th>


            </tr>
        </thead>
        <tbody>

            @forelse($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->paciente->nombres }}</td>
                    <td>{{ $consulta->paciente->dni }}</td>
                    <td>{{ $consulta->fecha_visita }}</td>
                    <td><a href="{{ route('consulta.mostrar', ['id' => $consulta->id]) }}">Ver consulta</a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay consultas que mostrar</td>
                </tr>
            @endforelse

        </tbody>

    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            @if ($consultas->onFirstPage())
                <li class="page-item disabled"><span class="page-link">Anterior</span></li>
            @else
                <li class="page-item"><a class="page-link"
                        href="{{ $consultas->appends(request()->input())->previousPageUrl() }}"
                        aria-label="Página anterior">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $consultas->lastPage(); $i++)
                <li class="page-item @if ($consultas->currentPage() == $i) active @endif">
                    <a class="page-link"
                        href="{{ $consultas->appends(request()->input())->url($i) }}">{{ $i }}</a>
                </li>
            @endfor

            @if ($consultas->hasMorePages())
                <li class="page-item"><a class="page-link"
                        href="{{ $consultas->appends(request()->input())->nextPageUrl() }}"
                        aria-label="Siguiente">Siguiente</a></li>
            @else
                <li class="page-item disabled"><span class="page-link">Siguiente</span></li>
            @endif
        </ul>
    </nav>
    <script>
        let consultasOriginales = @json($consultas);

        document.getElementById('texto').addEventListener('input', function() {
            let query = this.value.trim().toLowerCase();
            if (query !== '') {
                fetch(`{{ route('consulta.buscar') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            texto: query
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Verificar si se reciben los resultados correctamente
                        let resultados = filtrarYMostrar(data, query);

                        // Insertar los resultados en la tabla
                        document.querySelector('tbody').innerHTML = resultados;

                        // Si no hay resultados, restaurar la tabla original
                        if (data.length === 0) {
                            cargarTablaOriginal();
                        }
                    });
            } else {
                // Si la búsqueda está vacía, restaurar la tabla original
                cargarTablaOriginal();
            }
        });

        // Evitar la recarga de la página al presionar enter en el input
        document.getElementById('texto').addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                // Si la búsqueda está vacía, restaurar la tabla original
                if (this.value.trim() === '') {
                    cargarTablaOriginal();
                }
            }
        });

       

@endsection
