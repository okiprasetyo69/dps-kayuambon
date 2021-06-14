<?php

namespace App\Http\Controllers\Api\QueryFilters;

use App\Http\Controllers\Api\QueryFilters\BaseQueryFilter;

class DpsQueryFilter extends BaseQueryFilter
{
    private $id;
    private $nama;

    function __construct($request)
    {
        parent::__construct($request);
        $this->id = isset($request['id']) ? $request['id'] : 0;
        $this->nama = isset($request['nama']) ? $request['nama'] : null;
    }

    public function get_user_id()
    {
        return $this->id;
    }

    public function get_user_name()
    {
        return $this->nama;
    }
}
