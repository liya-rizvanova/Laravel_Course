<!DOCTYPE html>
<html>
<head>
    <title>Log Viewer</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1em;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 0.5em;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Список логов</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Time</th>
            <th>Duration (s)</th>
            <th>IP</th>
            <th>URL</th>
            <th>Method</th>
            <th>Input</th>
        </tr>
        @foreach ($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->time }}</td>
            <td>{{ $log->duration }}</td>
            <td>{{ $log->ip }}</td>
            <td>{{ $log->url }}</td>
            <td>{{ $log->method }}</td>
            <td>{{ $log->input }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
