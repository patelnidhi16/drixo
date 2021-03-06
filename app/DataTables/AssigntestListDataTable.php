<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AssigntestListDataTable extends DataTable
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
            ->addIndexColumn();
           
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\AssigntestList $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Student $model, Request $request )
    {
        if($request->subject_id && $request->title==''){
            return $model->where('subject_id',$request->subject_id);
          }
         else if($request->subject_id && $request->title){
            return $model->where('subject_id',$request->subject_id)->where('title',$request->title);
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
                    ->setTableId('assigntestlist-table')
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
            Column::make('student_id'),
            Column::make('subject_id'),
            Column::make('title'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'AssigntestList_' . date('YmdHis');
    }
}
