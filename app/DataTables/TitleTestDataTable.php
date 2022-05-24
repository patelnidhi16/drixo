<?php

namespace App\DataTables;

use App\Models\Question;
use App\Models\Subject;
use PhpOffice\PhpSpreadsheet\Chart\Title as ChartTitle;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TitleTestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $admin = Auth()->guard('admin')->user();
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function($user){
                if( Auth()->guard('admin')->user()->can('test_view')){

                    return '<a class="display_title btn btn-primary" title="{{$user["title"]}}" dataid="{{$user["subject_id"]}}" href="'.route("admin.display_title",[$user["getsubject"][0]["slug"],$user["slug"]]).' " style="width:120px;">View Question</a>';
                }
               
            })
            ->rawColumns(['action'])
    ->addIndexColumn();
    }  
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Title $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Question $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('title-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            
            Column::make('id')->data('DT_RowIndex'),
            Column::make('title'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(80)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Title_' . date('YmdHis');
    }
}
