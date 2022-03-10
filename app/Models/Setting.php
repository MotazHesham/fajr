<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Setting extends Model implements HasMedia
{
    use SoftDeletes;
    use HasMediaTrait;

    public $table = 'settings';

    protected $appends = [
        'chairman_img',
        'about_fajr',
        'logo',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'email',
        'phone',
        'address',
        'twitter',
        'facebook',
        'instagram',
        'tik_tok',
        'snapchat',
        'experience',
        'projects',
        'clients',
        'solutions',
        'projects_text',
        'news_text',
        'building_text',
        'trmem',
        'fix_text',
        'decore_text',
        'about_us',
        'our_message',
        'our_values',
        'our_vision',
        'our_strategy',
        'chairman_word',
        'crew_text',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
        $this->addMediaConversion('preview2')->fit('crop', 523, 675);
    }

    public function getChairmanImgAttribute()
    {
        return $this->getMedia('chairman_img')->last();
    }

    public function getAboutFajrAttribute()
    {
        $file = $this->getMedia('about_fajr')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
            $file->preview2   = $file->getUrl('preview2');
        }

        return $file;
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
