<?php

use App\Models\Employee;

Route::get('/test_database', function () {
    $employee = new Employee();
    $employee->name = 'Иван Иванов';
    $employee->position = 'Разработчик';
    $employee->save();

    return 'Сотрудник добавлен!';
});

