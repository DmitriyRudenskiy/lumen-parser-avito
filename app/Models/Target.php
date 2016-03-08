<?php
namespace App\Models;

use App\Component\Download\ResourceInterface;
use Illuminate\Database\Eloquent\Model;

class Target extends Model implements ResourceInterface
{
    protected $table = 'target';

    public $timestamps = false;

    public function getNext()
    {
        return self::orderBy('last_check')->take(1)->get()->first();
    }

    /**
     * @return ResourceInterface[]
     */
    public function getList()
    {
        return self::orderBy('last_check')->get();
    }

    public function getUrl()
    {
        return $this->url;
    }


}
