<?php

namespace Vanthao03596\HCVN\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Province;
use Vanthao03596\HCVN\Models\Ward;

class Install extends Command
{
    protected $signature = 'hcvn:install';

    protected $description = 'Seed all data';

    public function handle()
    {
        Province::truncate();
        District::truncate();
        Ward::truncate();

        $provincesData = $this->getContent('tinh_tp.json');
        $districtsData = $this->getContent('quan_huyen.json');
        $wardsData = $this->getContent('xa_phuong.json');

        $tableNames = config('hcvn.table_names');
        $this->insert($tableNames['provinces'], $provincesData);
        $this->insert($tableNames['districts'], $districtsData);

        foreach (collect($wardsData)->chunk(1000) as $wards) {
            $this->insert($tableNames['wards'], $wards);
        }

        $this->info('All done.');
    }

    private function getContent($fileName): array
    {
        return json_decode(file_get_contents(__DIR__ . "/../../resources/data/{$fileName}"), true);
    }

    private function insert(string $tableName, $data)
    {
        foreach ($data as $id => $row) {
            // Fix tỉnh quảng ngãi giải thể cấp xã
            if (empty($row['code'])) {
                continue;
            }
            $row['id'] = $id;
            $mapData[] = $row;
        }
        DB::table($tableName)->insert($mapData);
    }
}
