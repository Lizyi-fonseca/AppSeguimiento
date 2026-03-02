<!DOCTYPE html>
<html>
<head>
    <title>EPS</title>
 
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
<h1>EPS</h1>


{{-- 
<div class="mb-3">
    <label for="nis" class="form-label">Seleccionar una EPS</label>
    <select name="nis" class="form-select">
        <option value="">Favor seleccionar una EPS</option>
 
        @foreach($roles as $rol)
            <option value="{{ $rol->nis }}">
                {{ $rol->descripcion }}
            </option>
        @endforeach
    </select>
</div> --}}

<table class="table">
    <thead>
        <tr>
            <th scope="col">NIS</th>
            <th scope="col">Documento</th>
            <th scope="col">Denominación</th>
            <th scope="col">Observaciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($eps as $item)
            <tr>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->numd }}</td>
                <td>{{ $item->denominacion }}</td>
                <td>
                    @if ($item->observaciones)

                     {{ $item->observaciones }}
                        
                    @else

                    <p class="text-secondary">No tiene información</p>
                        
                    @endif
                    
                    
                   </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
</body>
</html>
