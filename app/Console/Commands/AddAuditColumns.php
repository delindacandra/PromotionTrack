<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddAuditColumns extends Command
{

    protected $signature = 'app:add-audit-columns';

    protected $description = 'Menambahkan createdby, editedby, dan deletedby pada tabel yang sudah ada';

    public function handle()
    {
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        $skipTables = ['migrations', 'password_reset_tokens', 'personal_access_tokens', 'failed_jobs'];

        foreach ($tables as $table) {
            if (in_array($table, $skipTables)) {
                $this->warn("Melewati tabel sistem: $table");
                continue;
            }

            $this->info("Memproses tabel: $table");

            Schema::table($table, function (Blueprint $tableBlueprint) use ($table) {
                if (!Schema::hasColumn($table, 'createdby')) {
                    $tableBlueprint->string('createdby')->nullable()->after('updated_at');
                }
                if (!Schema::hasColumn($table, 'editedby')) {
                    $tableBlueprint->string('editedby')->nullable()->after('createdby');
                }
            });
            $this->info("Kolom audit berhasil ditambahkan ke tabel: $table");
        }

        $this->info('Selesai menambahkan kolom ke semua tabel.');
    }
}
