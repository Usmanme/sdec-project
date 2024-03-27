<?php

namespace App\DataTables\Category;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoryDataTable extends DataTable
{
    public function dataTable(QueryBuilder $query)
    {
        $columns = array_column($this->getColumns(), 'data');
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($row) {
                return editDateColumn($row->created_at);
            })
            ->editColumn('check', function ($row) {
                return $row;
            })
            ->editColumn('actions', function ($row) {
                return view('app.admin-panel.category.action', ['id' => $row->id]);
            })
            ->editColumn('image', function ($row) {
                return view('app.admin-panel.category.image', ['id' => $row->id]);
            })
            ->editColumn('banner', function ($row) {
                return view('app.admin-panel.category.banner', ['id' => $row->id]);
            })
            ->editColumn('image', function ($row) {
                return view('app.admin-panel.category.image', ['id' => $row->id]);
            })
            ->editColumn('status', function ($category) {
                return $category->status == 1 ? '<span class="badge rounded-pill badge-light-success">ON</span>' : '<span class="badge rounded-pill badge-light-danger">OFF</span>';
            })
            ->editColumn('details', function ($row) {
                return view('app.admin-panel.category.details', ['id' => $row->id]);
            })
            ->setRowId('id')
            ->rawColumns(array_merge($columns, ['check','image','banner', 'status','details' ,'actions']));
    }


    public function query(Category $model): QueryBuilder
    {
        return $model->newQuery();
    }


    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId("categories-table")
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->serverSide()
            ->processing()
            ->deferRender()
            ->dom('BlfrtipC')
            ->lengthMenu([5,10,15,20,25,30])
            ->dom('<"card-header pt-0"<"head-label"><"dt-action-buttons text-end"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>> C<"clear">')
            ->buttons(
                // Button::make('export')->addClass('btn btn-relief-outline-secondary dropdown-toggle')->buttons([
                //     Button::make('print')->addClass('dropdown-item'),
                //     // Button::make('copy')->addClass('dropdown-item'),
                //     // Button::make('csv')->addClass('dropdown-item'),
                //     // Button::make('excel')->addClass('dropdown-item'),
                //     Button::make('pdf')->addClass('dropdown-item'),
                // ]),

                // Button::make('reload')->addClass('btn btn-relief-outline-primary'),

                Button::raw('delete-selected')
                    ->addClass('btn btn-relief-outline-danger')
                    ->text('<i class="bi bi-trash3-fill"></i> Delete Selected')->attr([
                        'onclick' => 'deleteSelected()',
                    ]),

                Button::raw('create-new')
                    ->addClass('btn btn-relief-outline-primary')
                    ->text('<i class="bi bi-plus"></i> Create New Category')->attr([
                        'onclick' => 'createNewCategory()',
                    ]),
            )

            ->scrollX()
            ->columnDefs([
                [
                    'targets' => 0,
                    'className' => 'text-center text-primary',
                    'width' => '10%',
                    'orderable' => false,
                    'searchable' => false,
                    'responsivePriority' => 3,
                    'render' => "function (data, type, full, setting) {
                        var dataValue = JSON.parse(data);
                        return '<div class=\"form-check\"> <input class=\"form-check-input dt-checkboxes\" onchange=\"changeTableRowColor(this)\" type=\"checkbox\" value=\"' + dataValue.id + '\" name=\"chkData[]\" id=\"chkData_' + dataValue.id + '\" /><label class=\"form-check-label\" for=\"chkData_' + dataValue.id + '\"></label></div>';
                    }",
                    'checkboxes' => [
                        'selectAllRender' =>  '<div class="form-check"> <input class="form-check-input" onchange="changeAllTableRowColor()" type="checkbox" value="" id="checkboxSelectAll" /><label class="form-check-label" for="checkboxSelectAll"></label></div>',
                    ]
                ],
            ])

            ->orders([
                [2, 'desc'],
            ]);
    }


    protected function getColumns(): array
    {
        $colArray = [
            Column::computed('check')->exportable(false)->printable(false)->width(60),
            Column::make('name')->searchable(true)->title('Category'),
            // Column::make('description')->title('Description')->orderable(false)->searchable(true),
            Column::make('meta_title')->title('Meta Title')->orderable(false)->searchable(true),
            Column::make('meta_keyword')->title('Meta Keyword')->orderable(false)->searchable(true),
            // Column::make('meta_description')->title('Meta Description')->orderable(false)->searchable(true),
            Column::make('status')->title('Status')->orderable(false)->searchable(true),
            Column::make('details')->title('Details')->orderable(false)->searchable(true),
            Column::make('image')->title('Image')->orderable(false)->searchable(false),
            Column::make('created_at')->title('Created At'),
        ];
        $colArray[] = Column::computed('actions')->exportable(false)->printable(false)->width(60)->addClass('text-center');
        return $colArray;
    }
}
