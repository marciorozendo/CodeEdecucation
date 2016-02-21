<?php
/**
 * Created by PhpStorm.
 * User: Sezefredo
 * Date: 21/02/2016
 * Time: 14:38
 */

namespace CodeEducation\Presenters;
use CodeEducation\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProjectTransformer();
    }
}