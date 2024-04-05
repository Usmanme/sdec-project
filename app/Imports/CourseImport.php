<?php

namespace App\Imports;

use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CourseImport implements ToCollection, WithHeadingRow, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public $failure_records = 0;
    public function collection(Collection $row)
    {
        foreach( $row as $crs )
        {
            // dd(excelDateConversion((int)$crs['start_date']));
            // dd()
            $check_course= Course::whereTitle($crs['title'])->count();
            if( $check_course==0 && !is_null( $crs['title'] ) && !empty( $crs['title'] ) && !is_null($crs['start_date']) && !is_null($crs['end_date']) && !is_null( countryCity( $crs['venue'] )[0] ) && !empty( countryCity( $crs['venue'] )[0] ) )
            {
                $start_date = excelDateConversion($crs['start_date']);
                $end_date = excelDateConversion($crs['end_date']);

                if( $start_date<$end_date ) {
                    $course = new Course();
                    $course->title = $crs['title'] ?? null;
                    $course->description = $crs['description'] ?? null;
                    $course->program_code = $crs['program_code'] ?? null;
                    $course->venue = countryCity($crs['venue'])[0];
                    $course->fee = $crs['fees'] ?? null;
                    $course->start_date = $start_date;
                    $course->end_date = $end_date;
                    $course->status = "active";
                    $course->user_id = auth()?->user()->id ?? 1;
                    $course->created_at = now();
                    $course->updated_at = now();
                    $course->save();
                }
            }
            else {
                $this->failure_records+=1;
            }

        }
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    public function batchSize(): int
    {
        return 1000;
    }

    public function getFailureRecords () {
        return $this->failure_records;
    }
}
