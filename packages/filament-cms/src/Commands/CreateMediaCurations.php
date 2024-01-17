<?php

namespace Hup234design\FilamentCms\Commands;

use Hup234design\FilamentCms\Actions\GenerateMediaCurations;
use Hup234design\FilamentCms\Models\CustomMedia;
use Illuminate\Console\Command;

class CreateMediaCurations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:create-media-curations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all media curations';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Processing all Media images...');

        $this->newLine();

        $progressBar = $this->output->createProgressBar(CustomMedia::count());

        CustomMedia::all()->each(function ($media) use ($progressBar) {
            GenerateMediaCurations::execute($media->id);
            $progressBar->advance();
        });

        $progressBar->finish();

        $this->newLine(2);

        $this->info('Processing complete!');
    }
}
