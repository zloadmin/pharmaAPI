<?php

namespace App\Imports\Student;

use App\Mail\Student\StudentAccessEmail;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;


class StudentImport extends DefaultValueBinder implements
//    ToModel,
    WithValidation,
//    SkipsOnError,
    SkipsEmptyRows,
    WithCustomValueBinder,
    WithCalculatedFormulas,
    WithStartRow,
    OnEachRow,
    SkipsOnFailure//,
//    WithHeadingRow
{
//    use SkipsErrors;
    use Importable;

    public array $rowResult = [];


    public function bindValue(Cell $cell, $value)
    {

        if (is_numeric($value)) {
            $cell->setValueExplicit(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('d.m.Y'), DataType::TYPE_STRING);
            return true;
        }

        // else return default behavior
        return parent::bindValue($cell, $value);
    }

    /**
     * @param array $row
     *
     * @return Student
     */
    public function model(array $row, string $password): Student
    {


        return new Student([
            'full_name'     => $row[0],
            'date_of_birth' => $row[1],
            'email'         => $row[2],
            'password'      => Hash::make($password)
        ]);
    }


    public function rules(): array
    {
        return [
            '0' => ['required', 'string', 'max:250'], // full_name
            '1' => ['required', 'date', 'date_format:d.m.Y'], // date_of_birth
            '2' => ['required', 'email', Rule::unique('users', 'email')], // email
        ];
    }

    public function customValidationMessages()
    {
        return [
            '0.required'    => 'Поле фио обязательно для заполнения.',
            '0.string'      => 'Значение поля фио должно быть строкой.',
            '0.max'         => 'Количество символов в поле фио не может превышать 250.',
            '1.required'    => 'Поле дата рождения обязательно для заполнения.',
            '1.date'        => 'Значение поля дата рождения не является датой.',
            '1.date_format' => 'Значение поля дата рождения не соответствует формату даты d.m.Y.',
            '2.required'    => 'Поле email обязательно для заполнения.',
            '2.email'       => 'Значение поля email должно быть действительным электронным адресом.',
            '2.unique'      => 'Такое значение поля email уже существует.',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        if (is_array($failures)) {
            foreach ($failures as $item) {
                $this->rowResult[] = [
                    'row'    => intval($item->row()) - 2,
                    'status' => false,
                    'errors' => $item->errors()
                ];
            }
        }

    }

    public function startRow(): int
    {
        return 2;
    }

    public function onRow(Row $row)
    {
        $password = Str::random();
        $student = $this->model($row->toArray(), $password);
        $student->save();

        Mail::queue(new StudentAccessEmail($student, $password));

        $this->rowResult[] = [
            'row'    => intval($row->getRowIndex()) - 2,
            'status' => true
        ];
    }
}
