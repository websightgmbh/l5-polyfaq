<?php
/**
 * Created by IntelliJ IDEA.
 * User: cziel
 * Date: 07.12.15
 * Time: 14:50
 */

namespace Websight\Polyfaq;

/**
 * Class FaqableTrait
 * Mix this in to allow FAQs with your model.
 *
 * @package Websight\Polyfaq
 */
trait FaqableTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function faqs()
    {
        return $this->morphMany('Websight\Polyfaq\Faq', 'faqable');
    }
}
