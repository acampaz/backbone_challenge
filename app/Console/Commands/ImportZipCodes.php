<?php

namespace App\Console\Commands;

use App\Imports\ZipCodesImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ImportZipCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command imports data from excel file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Here we import the Excel data
        try {
            //Here we select the file to import
            (new ZipCodesImport)->import('CPdescarga.xlsx');
            Log::info('File imported successfully!');
            return 'Success';

        } catch (\Exception $e) {
            Log::error($e);
            return Command::FAILURE;
        }
    }
}
