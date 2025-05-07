@extends('layouts.default')

@section('content')
<h2>Employee Form</h2>
<form name="employee-form" id="employee-form" method="post" action="{{ url('store-form') }}">
    @csrf
    <div class="form-group">
        <label for="name">Имя</label><br>
        <input type="text" id="name" name="name" class="form-control" required="true"><br><br>
    </div>
    <div class="form-group">
        <label for="surname">Фамилия</label><br>
        <input type="text" id="surname" name="surname" class="form-control" required="true"><br><br>
    </div>
    <div class="form-group">
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" class="form-control" required="true"><br><br>
    </div>
    <div class="form-group">
        <label for="position">Должность</label><br>
        <input type="text" id="position" name="position" class="form-control" required="true"><br><br>
    </div>
    <div class="form-group">
        <label for="address">Адрес</label><br>
        <input type="text" id="address" name="address" class="form-control" required="true"><br><br>
    </div>
    <div class="form-group">
        <label for="workData">Work Data</label><br>
        <textarea name="workData" class="form-control" required="true"></textarea><br><br>
    </div>
    <div class="form-group">
        <label for="jsonData">JSON данные</label><br>
        <textarea name="jsonData" class="form-control" required="true" rows="8"><br><br>
{
  "address" : {
    "street": "Kullas Light",
    "suite": "Apt. 556",
    "city": "Gwenborough",
    "zipcode": "92998-3874",
    "geo": {
        "lat": "-37.3159",
        "lng": "81.1496"
    }
  }
}
        </textarea><br><br>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button><br><br>
</form>
@endsection
