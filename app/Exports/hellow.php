<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategorizedNumbersExport implements FromCollection, WithHeadings
{
    protected $categorizedNumbers;

    // Modify the constructor to accept an array
    public function __construct(array $categorizedNumbers)
    {
        $this->categorizedNumbers = $categorizedNumbers;
    }

    // Convert the array to a collection and map it for Excel export
    public function collection(): Collection
    {
        $exportArray = [];

        // Loop through categories
        foreach ($this->categorizedNumbers as $category => $numbers) {
            // Loop through each number in the category
            foreach ($numbers as $numberData) {
                // Directly add the category and number (numberData is a string, no need for array access)
                $exportArray[] = [
                    'Category' => $category,
                    'Number' => $numberData,
                ];
            }
        }

        // Return a collection of the formatted data
        return collect($exportArray);
    }

    // Define the headings for the Excel file
    public function headings(): array
    {
        return [
            'Category',
            'Number',
        ];
    }
}
