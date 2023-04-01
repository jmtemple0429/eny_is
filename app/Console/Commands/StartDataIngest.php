<?php namespace App\Console\Commands;
    use Illuminate\Console\Command;
    use Carbon\Carbon;
    use App\Models\Ingest;

    class StartDataIngest extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'is:start-data-ingest';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Create a new Ingest Instance, causing videos';

        /**
         * Execute the console command.
         */
        public function handle(): void
        {
            $startDate = Carbon::now()->subDays(30)->format('mdy');
            $endDate = Carbon::now()->format('mdy');

            $ingest = Ingest::create([
                'key'       => "{$startDate}x{$endDate}"
            ]);

            cache()->remember('ingest', 36000, function() use ($ingest) {
                return $ingest;
            });

            $this->info("The Ingest Process has been started.");
        }
    }
