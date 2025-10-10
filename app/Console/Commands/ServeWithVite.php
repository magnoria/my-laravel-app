<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeWithVite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serve:hmr';// 터미널에서 명령을 실행할때 이름

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start server and run Vite compiler simultaneously.';// 설명 설정

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() //여기에 실행될때 작성하는 코드
    {

        //Process::start('npm run dev');// 백그라운드에 npm run dev실행     // Process use Illuminate\Support\Facades\Process;를 사용해야함
        $process = new Process(['npm', 'run', 'dev']);
        $process->start();
        
        $this->call('serve');

        return Command::SUCCESS;
    }
}
