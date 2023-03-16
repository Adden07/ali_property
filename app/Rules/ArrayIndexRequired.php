<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArrayIndexRequired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $first_arr  = null;
    protected $second_arr = null;
    protected $type       = null;
    protected $key        = null;
    protected $is_true    = null;
    public function __construct($first_arr, $second_arr, $type, $is_true)
    {   
        $this->first_arr  = $first_arr;
        $this->second_arr = $second_arr;
        $this->type       = $type;
        $this->is_true    = $is_true;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {   
        if(is_check($this->is_true)){
            foreach($this->first_arr AS $key=>$arr){
                if(empty($arr) xor empty($this->second_arr[$key])){//if any of them is empty then thorugh error not both
                    $this->key  = $key+1;//plus 1 to tell the accurate line of add ons
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Please fill the {$this->type} inputs properly on add ons row {$this->key}";
    }
}
