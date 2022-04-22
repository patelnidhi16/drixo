<?php

namespace App\DataTables;

use App\Models\Attempttest;
use App\Models\Student;
use App\Models\Result;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReturnresultDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('<input type="checkbox" id="all">', function ($user) {
                return "<input type='checkbox' dataid='$user->id' name='assign_test[]' class='assign_test'>";
            })
            ->rawColumns(['<input type="checkbox" id="all">'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Attempttest $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Result $model,Request $request)
    {
        // dd($request->all());
           if($request->subject && $request->title==''){
            return $model->where('subject',$request->subject);
          }
         else if($request->subject && $request->title){
            return $model->where('subject',$request->subject)->where('title',$request->title);
          }
          else{
              return $model->newQuery();
          }
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('attempttest-table')
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
            Column::computed('<input type="checkbox" id="all">')
            ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
            Column::make('id')->data('DT_RowIndex'),
            Column::make('user_id'),
            Column::make('subject'),
            Column::make('title'),
            Column::make('result'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Attempttest_' . date('YmdHis');
    }
}
