<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = "programs";
    protected $fillable = [
        'program_type',
        'date',
        'state',
        'district',
        'donar_organisation',
        'project',
        'support_partner',
        'gender',
        'team_member_name',
        'beneficiary_name',
        'age',
        'caste',
        'mobile_number',
        'religion',
        'occupation',
        'family_income',
    ];

    public function livelihoods()
    {
        return $this->hasMany(Livelihoods::class);
    }
    public function digitalLiteracies()
    {
        return $this->hasMany(DigitalLiteracies::class);
    }
    public function communities()
    {
        return $this->hasMany(Communities::class);
    }
    public function socialProtections()
    {
        return $this->hasMany(SocialProtection::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_member_name');
    }

    public function csr()
    {
        return $this->belongsTo(CSRPartner::class, 'donar_organisation');
    }

    public function partnerOrg()
    {
        return $this->belongsTo(PartnerOrgnization::class, 'support_partner');
    }
}
