<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'review_id',
        'reviewer_id',
        'reviewee_id',
    ];

    public function reviews(){
        return $this->belongsTo(PerformanceReview::class , 'review_id' ,'id');
    }

    public function reviewees(){
        return $this->belongsTo(User::class , 'reviewee_id' ,'id');
    }

    public function reviewers(){
        return $this->belongsTo(User::class , 'reviewer_id' ,'id');
    }
}
