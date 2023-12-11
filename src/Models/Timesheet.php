<?php

namespace Dcodegroup\LaravelTimesheet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Timesheet extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'start' => 'datetime',
        'stop' => 'datetime',
    ];

    /**
     * Xero Timesheet Statuses
     * Used by dcodegroup/laravel-xero-timesheet-sync
     */
    public const XERO_TIMESHEET_STATUS_DRAFT = 'DRAFT';

    public const XERO_TIMESHEET_STATUS_PROCESSED = 'PROCESSED';

    public const XERO_TIMESHEET_STATUS_APPROVED = 'APPROVED';

    public function timesheetable(): MorphTo
    {
        return $this->morphTo();
    }
}
