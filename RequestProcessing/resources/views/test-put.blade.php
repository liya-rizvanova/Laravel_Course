@extends('layouts.default')

@section('content')
    <h2>Test PUT Request</h2>
    <button id="sendRequest">Send PUT Request</button>

    <script>
        document.getElementById('sendRequest').addEventListener('click', function () {
            fetch('/user/1', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: 'John',
                    email: 'john@example.com',
                    surname: 'Doe',
                    position: 'Developer',
                    address: '123 Main St',
                    workData: 'PHP, Laravel',
                    jsonData: JSON.stringify({
                        address: {
                            street: "Kullas Light",
                            suite: "Apt. 556",
                            city: "Gwenborough",
                            zipcode: "92998-3874",
                            geo: {
                                lat: "-37.3159",
                                lng: "81.1496"
                            }
                        }
                    })
                })
            })
            .then(response => response.text())
            .then(data => alert('Server response: ' + data))
            .catch(error => console.error('Error:', error));
        });
    </script>
@endsection
