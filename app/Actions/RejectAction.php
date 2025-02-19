<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class RejectAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Reject'; // Назва кнопки
    }

    public function getIcon()
    {
        return 'voyager-x'; // Іконка для кнопки
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-danger pull-right edit custom-approve',
            'style' => 'margin-right: 5px;',// CSS-клас кнопки
        ];
    }

    public function getDefaultRoute()
    {
        return route($this->data->getTable() . '.reject', $this->data->id);
    }

    public function shouldActionDisplayOnRow($row)
    {
// Логіка відображення кнопки (наприклад, тільки для записів зі статусом "Очікує перевірки")
        return $row->status === 'pending' || $row->status === 'approved';

    }
}
