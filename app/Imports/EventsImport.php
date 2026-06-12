<?php

namespace App\Imports;

use App\Models\Event;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EventsImport implements ToCollection, WithHeadingRow
{
    protected $userId;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Event([
            //
        ]);
    }


    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function collection(Collection $rows) 
    {
        foreach ($rows as $row) {
            Event::create([
                'user_id' => $this->userId,
                'title' => $row['title'],
                'description' => $row['description'],
                'address' => $row['address'],
                'city' => $row['city'],
                'state' => $row['state'],
                'country' => $row['country'],
                'date' => $row['date'],
                'start' => $row['start'],
                'end' => $row['end'],
                'price' => $row['price'],
                'capacity' => $row['capacity'],
                'contact_number' => $row['contact_number']
            ]);
        }
    }
}
