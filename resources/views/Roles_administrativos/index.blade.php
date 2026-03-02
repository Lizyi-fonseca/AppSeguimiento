<!DOCTYPE html>
<html>
<head>
    <title>Roles administrativos</title>
 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>

<div class="container">
<h1 class="text-center text-secondary">Lista De Roles Administrativos</h1>


<div class="px-5">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table class="table">
  <a href="{{route('Roles_administrativos.create')}}" class="btn btn-success btn-sm">Crear<i class="fa-solid fa-circle-plus px-2"></i></a>
  <thead>
    <tr class=" text-secondary">
      <th scope="col">nis</th>
      <th scope="col">descripcion</th>
    </tr>
  </thead>
  <tbody>
    

    @forelse($roles as $rol)
            <tr>
                <td>{{ $rol->nis }}</td>
                <td>{{ $rol->descripcion }}</td>
                <td>
                   @if ($rol->descripcion)
                    {{ $rol->descripcion }}
                  @else
                  <p class="text-secondary">No tiene información</p>
                    
                  @endif

                <td>
                  <form action="{{ route('Roles_administrativos.delete', $programa->nis) }}" method="POST" class="form-eliminar">
                      @csrf
                      @method('DELETE')

                      <button type="button" class="btn btn-danger btn-eliminar">
    <i class="fa-regular fa-trash-can"></i>
</button>

              </form>
                  <a href="{{route('programas.edit', $rol->nis)}}">
                  <i class="fa-solid fa-pen-clip btn btn-success"></i>
                  </a>
                  <a href="{{route('programas.show', $rol->nis)}}">
                  <i class="fa-solid fa-eye btn btn-primary"></i>
                  </a>
                </td>
            </tr>
        @empty

        <tr>
          <td>No hay informacion</td>
        </tr>
        @endforelse


         </tbody>
</table>
</div>
</div>


    <script src="{{asset('js/sweetalert2.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
<script>
document.addEventListener("DOMContentLoaded", function () {

    const botones = document.querySelectorAll(".btn-eliminar");

    botones.forEach(function(boton) {
        boton.addEventListener("click", function () {

            const formulario = this.closest("form");

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede deshacer",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    formulario.submit();
                }
            });

        });
    });

});
</script>

<div class="mb-3">
    <label for="nis" class="form-label">Seleccionar Rol</label>
    <select name="nis" class="form-select">
        <option value="">Favor Seleccionar Un Rol</option>
 
        @foreach($roles as $rol)
            <option value="{{ $rol->nis }}">
                {{ $rol->descripcion }}
            </option>
        @endforeach
    </select>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">NIS</th>
            <th scope="col">Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $rol)
            <tr>
                <td>{{ $roles->nis }}</td>
                <td>{{ $roles->descripcion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
