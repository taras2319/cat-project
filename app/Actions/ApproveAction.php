<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ApproveAction extends AbstractAction
{
    public function getTitle()
    {
        return 'Approve'; // Назва кнопки
    }

    public function getIcon()
    {
        return 'voyager-check'; // Іконка для кнопки
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-success pull-right edit', // Клас кнопки
            'style' => 'margin-right: 5px;', // Додаємо інлайн-стиль
        ];
    }

    public function getDefaultRoute()
    {
        return route($this->data->getTable() . '.approve', $this->data->id);
    }


    public function shouldActionDisplayOnRow($row)
    {
// Логіка відображення кнопки (наприклад, тільки для записів зі статусом "Очікує перевірки")
        return $row->status === 'pending' || $row->status === 'rejected';

    }
}
