<?php

namespace App\Console\Commands\db;

use Illuminate\Console\Command;

class CreateDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:create {--f|force : すでにデータベースが存在した場合でも再作成する}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create database for current environment.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            if (!file_exists('/.dockerenv')) {
                $this->error('この環境はDocker環境ではありません。このコマンドはLaravelを動かすコンテナ内で実行してください。');
                return 1;
            }

            $isForce = $this->option('force');

            $pdo = new \PDO(sprintf('pgsql:host=%s port=%s', env('DB_HOST'), env('DB_PORT')), env('DB_USERNAME'), env('DB_PASSWORD'));
            $statement = $pdo->prepare('select count(*) from pg_database where datname=?');
            $statement->execute([env('DB_DATABASE')]);
            $isExisitingDatabase = ($statement->fetchColumn() > 0);

            if ($isExisitingDatabase) {
                if (!$isForce) {
                    $this->error('データベースがすでに存在しています。再作成するには -f オプションを付けて実行してください。');
                    return 2;
                } else {
                    $statement = $pdo->prepare('drop database ?');
                    $statement->execute([env('DB_DATABASE')]);
                }
            }

            $statement = $pdo->prepare('create database ' . env('DB_DATABASE') . ' encoding \'UTF8\'');
            $statement->execute();
        } catch(\Exception $exception) {
            echo $exception->getMessage();
        }
    }
}
