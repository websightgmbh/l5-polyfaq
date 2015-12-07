<?php

namespace Websight\Polyfaq;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 *
 * @property integer $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $title
 * @property string $content
 *
 * @package Websight\Polyfaq
 */
class Faq extends Model
{

    /**
     * Returns the associated FAQ items for that item
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function polyfaqable()
    {
        return $this->morphTo('polyfaqable');
    }
}
