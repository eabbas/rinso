<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'phoneNumber',
        'password',
        'family',
        'main_image',
        'scan_count',
        'email',
        'parent_id',
        'ref_code'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function careers()
    {
        return $this->hasMany(career::class , 'user_id')->chaperOne();
    }

    public function ecomms()
    {
        return $this->hasMany(ecomm::class)->chaperOne();
    }
    // public function ecomm_categories(){
    //     return $this->hasMany(ecomm_category::class)->chaperOne();
    // }
    public function role()
    {
        return $this->belongsToMany(role::class, 'role_users');

    }

    public function ecomm_categories()
    {
        return $this->hasManyThrough(ecomm_category::class, ecomm::class, 'user_id', 'ecomm_id');
    }

    public function pages()
    {
        return $this->hasMany(pages::class)->chaperOne();
    }

    public function qr_codes()
    {
        return $this->hasMany(qr_code::class);
    }

    public function menus()
    {
        return $this->hasMany(menu::class);
    }

    public function contactUs()
    {
        return $this->hasMany(contactUs::class);
    }

    public function carts()
    {
        return $this->hasMany(cart::class);
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }

    public function addresses()
    {
        return $this->hasMany(address::class);
    }

    public function customers()
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function request()
    {
        return $this->hasOne(requests::class);
    }

    public function refUsers()
    {
        return $this->hasMany(refUser::class);
    }

    public function introCats()
    {
        return $this->hasMany(intro_category::class);
    }

    public function introPros()
    {
        return $this->hasMany(intro_product::class);
    }

    public function specialPages()
    {
        return $this->belongsToMany(pages::class, 'special_users', 'page_id', 'user_id');
    }

    public function checkLists()
    {
        return $this->hasMany(checkList::class);
    }
    public function class_comments(){
        return $this->hasMany(class_comment::class);
    }

    public function institutes(){
        return $this->belongsToMany(institute::class, 'master_institutes' , 'master_id', 'institute_id');
    }

    public function classes(){
        return $this->belongsToMany(lesson_class::class, 'master_classes' , 'master_id', 'class_id');
    }

    public function student_classes(){
        return $this->belongsToMany(lesson_class::class, 'class_students' , 'student_id', 'class_id');
    }

    public function owner_institute(){
        return $this->hasMany(institute::class);
    }

    public function user_institutes(){
        return $this->belongsToMany(institute::class, 'user_institutes' , 'user_id', 'institute_id');

    }

    public function lesson_classes(){
        return $this->hasMany(lesson_class::class , 'master_id');
    }


    public function requests(){
     return $this->belongsToMany(institute::class,'institute_requests',"user_id","institute_id")->withPivot(['status']);
   }

}
