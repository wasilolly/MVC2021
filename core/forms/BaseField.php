<?php

namespace app\core\forms;
use app\core\Model;

abstract class BaseField {

    public Model $model;
    public string $attribute;

    /**
     * @param \app\core\model $model
     * @param string $attribute
     */
    public function __construct(Model $model, $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    abstract public function renderInput():string;

    public function  __toString()
    {
        return sprintf('
            <div class="mb-3 form-check">
                <label>%s</label>
                %s
                <div class="invalid-feedback">
                    %s
                </div>
            </div> '
            ,
            $this->model->getLabel($this->attribute),
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }

}