<?php

namespace App\DataTables;

use App\Models\Permission;
use App\Models\Role_has_permission;
use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubjectDataTable extends DataTable
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
            // ->addColumn('action', 'student.action');
            ->addColumn('action', function ($user) use ($admin) {

                $result = '<div class="btn-group">';
                if ($admin->can('subject_delete')) {
                    $result .= "<button dataid='$user->id' class='rounded delete btn btn-danger mr-2 ' style='height:40px'>Delete</button>";
                }
                if ($admin->can('subject_update')) {
                    $result .= "<button data-target='#edit' data-toggle='modal' dataid=' $user->id ' class='rounded edit btn btn-success mr-2' data-backdrop='static' data-keyboard='false'style='height:40px' >Edit</button>";
                }
                
                if ($admin->can('test_create')) {
                    $result .= "<a dataid='$user->slug' class='add_question rounded add btn btn-primary col-4 mr-2 ' style='height:40px; width: 90px; background-color:#5369f8; color:white;'>Add Ques</a>";
                }
                if ($admin->can('test_view')) {
                    $result .= "<a dataid='$user->slug' class='rounded display btn btn-success mr-2' href='" . route('admin.alltest', $user->slug) . "' style='height:40px;width:100px;'>View Test</a>";
                }


                $result .= '</div>';
                return $result;
            })
            ->editColumn('image', function ($data) {
                return '<a href="' . asset('/public/' . $data->image) . '" target="_blank"><img src="' . asset('/public/' . $data->image) . '" style="height: 50px; width:50px;"></a>';
            })
            ->rawColumns(['image', 'action'])
            ->addIndexColumn();
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Subject $model)
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
            ->setTableId('student-table')
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
            Column::make('subject_name'),
            Column::make('image'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
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
        return 'Student_' . date('YmdHis');
    }
}
