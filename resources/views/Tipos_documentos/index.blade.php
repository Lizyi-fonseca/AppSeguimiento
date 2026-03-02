<!DOCTYPE html>
<html>
<head>
    <title>Tipos de Documentos</title>

    <!-- Bootstrap 5.2.3 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <h1>Lista de Tipos de Documentos</h1>

    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Denominación</th>
                <th scope="col">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tipos as $tipo)
                <tr>
                    <td>{{ $tipo->nis }}</td>
                    <td>{{ $tipo->denominacion }}</td>
                    <td>{{ $tipo->observaciones }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No hay información disponible</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
