<?php


namespace DuoLee\Table\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

abstract class TableAbstract extends DataTable
{
    protected $model;

    protected $table;

    protected $tableId;

    public function __construct(DataTables $table, Model $model)
    {
        $this->table = $table;
        $this->model = $model;
    }

    protected function getTableId()
    {
        return $this->tableId ?? \Str::camel(\Str::afterLast(get_class($this), '\\'));
    }

    public function html()
    {
        return $this->builder()
            ->setTableId($this->getTableId())
            ->columns($this->columns())
            ->ajax(['url' => $this->ajaxUrl()])
            ->parameters([
                'dom' => $this->dom(),
                'buttons' => $this->buttons(),
                'initComplete' => $this->initComplete(),
                'drawCallback' => $this->drawCallback(),
                'paging' => true,
                'searching' => true,
                'info' => true,
                'searchDelay' => 350,
                'processing' => true,
                'serverSide' => true,
                'bServerSide' => true,
                'bDeferRender' => true,
                'bProcessing' => true,
                'language' => [
                    'emptyTable' => trans('table::table.emptyTable'),
                    'info' => trans('table::table.info'),
                    'infoEmpty' => trans('table::table.infoEmpty'),
                    'lengthMenu' => trans('table::table.lengthMenu'),
                    'infoFiltered' => trans('table::table.infoFiltered'),
                    'loadingRecords' => trans('table::table.loadingRecords'),
                    'processing' => trans('table::table.processing'),
                    'search' => trans('table::table.search'),
                    'zeroRecords' => trans('table::table.zeroRecords'),
                    "paginate" => [
                        'first' => trans('table::table.paginate.first'),
                        'last' => trans('table::table.paginate.last'),
                        "next" => trans('table::table.paginate.next'),
                        "previous" => trans('table::table.paginate.previous')
                    ]
                ]
            ]);
    }

    /**
     * @return string
     */
    protected function dom()
    {
        return '<"datatable-header"fBl><"datatable-scroll"t><"datatable-footer"ip>';
    }

    /**
     * @return array
     */
    protected function buttons(): array
    {
        return [];
    }

    /**
     * @return array
     */
    abstract protected function columns(): array;

    /**
     * @return mixed
     */
    abstract public function renderTable();

    /**
     * @return mixed
     */
    abstract protected function ajaxUrl(): string;

    /**
     * @return mixed
     */
    abstract public function dataTable();

    protected function initComplete()
    {
        return 'function(){}';
    }

    protected function drawCallback()
    {
        return 'function(){}';
    }

}