@extends('plantillas.plantilla')

@section('titulo', 'Consulta')

@section('contenido')
    <div class="card m-3 p-3">
        <div class="wrapper wrapper--w960">
            <div class="card border-radius-sm border-0" style="">
                <div class="card-body border-radius-sm border-0">
                    <h4 class="font-robo t" style="margin: 0; padding:0">Datos de la Consulta: </h4>
                    <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                    <div style="width: 100%; max-width: 1200px; margin: 0 auto;">



                        <div>
                            @if (session('mensaje'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('mensaje') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="card-body border-radius-sm border-0">
                                <form method="POST" action="{{ route('consulta.update', ['id' => $consulta->id]) }}"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="col-6">
                                        <div class="font-robo form-group">
                                            <label for="paciente_id">Número de Identidad de paciente:</label>
                                            <input class="form-control border-radius-sm" id="paciente_id" name="paciente_id"
                                                placeholder="Ingrese Número Identidad" minlength="3" maxlength="100"
                                                required value="{{ $consulta->paciente->dni }}">
                                            @error('paciente_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-4">
                                        <div class="font-robo form-group">
                                            <label for="atendido" style="margin-left: 0;">Seleccione el médico: </label>
                                            <select name="atendido" id="atendido" class="form-control form-select"
                                                required>
                                                @if ($medicos->count() > 0)
                                                    @foreach ($medicos as $id => $nombre)
                                                        <option value="{{ $id }}">{{ $nombre }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">No hay médicos disponibles</option>
                                                @endif
                                            </select>
                                            @error('atendido')
                                                <strong class="menerr" style="color:red">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-4">
                                        <div class="font-robo form-group" style="margin-bottom: 5px">
                                            <label for="fecha_visita" style="margin-left: 0;">Fecha de visita: </label>
                                            <input class="form-control border-radius-sm" type="date"
                                                placeholder="Ingrese la fecha de visita" name="fecha_visita"
                                                id="fecha_visita" value="{{ old('fecha_visita', $consulta->fecha_visita) }}"
                                                max="" now() required>
                                            @error('fecha_visita')
                                                <strong class="menerr" style="color:red">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="font-robo form-group">
                                            <label for="motivo_visita" style="margin-left: 0;">Motivo para asistir a
                                                consulta: </label>
                                            <textarea class="form-control border-radius-sm" type="text" placeholder="Ingrese motivo" name="motivo_visita"
                                                id="motivo_visita" minlength="3" maxlength="200" required>{{ old('motivo_visita', $consulta->motivo_visita) }}  </textarea>
                                            @error('motivo_visita')
                                                <strong class="menerr" style="color:red">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                            </div>

                            <hr class="m-1" style="border: 0.5px solid rgba(111, 143, 175, 0.600)">
                            <div style="float: right ; margin-top: 5px">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#cancelarB"><i class="fas fa-cancel"></i> Cancelar</button>
                                <button type="reset" class="btn btn-warning"><i class="fas fa-eraser"></i>
                                    Limpiar</button>
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
                            </div>
                            </form>

                            <!-- Modal -->
                            <div class="modal fade" id="cancelarB" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Cancelar</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea cancelar lo que esta haciendo?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">No</button>
                                            <a type="button" href="{{ route('consulta.index') }}"
                                                class="btn btn-danger">Si</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection
