<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AttendeesExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $attendees;

    public function __construct($attendees)
    {
        $this->attendees = $attendees;
    }

    public function collection()
    {
        return $this->attendees;
    }

    public function headings(): array
    {
        return [
            'Attendee ID',
            'Name',
            'Phone',
            'Ticket ID',
            'Payment Status',
        ];
    }

    public function map($attendee): array
    {
        return [
            'Attendee ID' => $attendee->attendee->id,
            'Name' => $attendee->attendee->name,
            'Phone' => $attendee->attendee->phone,
            'Ticket ID' => $attendee->ticket_id,
            'Payment Status' => $attendee->status,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Apply styling to the header row
        $sheet->getStyle('A1:E1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => '008000'],
            ],
        ]);

        // Apply styling to the data rows
        $sheet->getStyle('A2:E' . ($this->attendees->count() + 1))->applyFromArray([
            'font' => [
                'color' => ['rgb' => '000000'],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['rgb' => 'FFFF00'],
            ],
        ]);
    }
}
