<?php

namespace Sequelone\VkGeo\Models;

/**
 * Class City.
 */
class City extends AbstractModel
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'title', 'region_id', 'country_id', 'area'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
