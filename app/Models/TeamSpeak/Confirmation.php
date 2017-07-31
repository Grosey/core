<?php

namespace App\Models\TeamSpeak;

use App\Traits\RecordsActivity;

/**
 * App\Models\TeamSpeak\Confirmation
 *
 * @property int $registration_id
 * @property string $privilege_key
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\TeamSpeak\Registration $registration
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamSpeak\Confirmation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamSpeak\Confirmation wherePrivilegeKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamSpeak\Confirmation whereRegistrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\TeamSpeak\Confirmation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Confirmation extends \App\Models\Model
{
    use RecordsActivity;

    public $incrementing = false;
    protected $table = 'teamspeak_confirmation';
    protected $primaryKey = 'registration_id';

    public function registration()
    {
        return $this->belongsTo(Registration::class, 'registration_id', 'id');
    }
}
