<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
	protected $fillable = [
		'name', 'email', 'contact','address','gender','ssc_board','ssc_year','sss_grade','hsc_board','hsc_year','hsc_grade',
		'graduation_board','experience',
		'graduation_year','graduation_grade',
		'degree_board','degree_year',
		'degree_grade','languages','technology','location',
		'ectc','cctc','notice_period'
	];
}
