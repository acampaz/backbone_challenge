<?php

namespace App\Console\Commands;

use App\Http\Controllers\ImportController;
use Illuminate\Console\Command;

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
        //Calling the import function from ImportController to import the data from Excel.
        $controller = new ImportController();
        return $controller->import();
    }
}
