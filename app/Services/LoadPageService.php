<?php
namespace App\Services;

use App\Component\Download\Client;
use App\Exceptions\EmptyListTarget;
use App\Models\Target;

class LoadPageService
{
    public function run()
    {
        $client = new Client();
        $model = new Target();
        $list = $model->getList();

        if (sizeof($list) < 1) {
            throw new EmptyListTarget();
        }

        foreach ($list as $value) {
            $content = $client->get($value->getUrl());

            if (!$client->isValid()) {
                echo $client . "\n";
            }

            var_dump($content);
        }

        echo "start load target\n";
    }
}