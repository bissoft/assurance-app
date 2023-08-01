<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomField extends Model
{
    protected $fillable = [
        'name',
        'type',
        'module',
        'options',
        'order',
        'module_id',
        'section_id',
        'created_by',
    ];

    public static $fieldTypes = [
        'text' => 'Text',
        'email' => 'Email',
        'number' => 'Number',
        'date' => 'Date',
        'textarea' => 'Textarea',
        'select' => 'Select',
    ];

    public static $modules = [
        'bisness a' => 'bisness a',
        'business 2' => 'business 2',
        
    ];

    protected function options(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    } 

    public static function saveData($obj, $data)
    {
        if($data)
        {
            $RecordId = $obj->id;
            foreach($data as $fieldId => $value)
            {
                if($value!=null){

                    
                    \DB::insert(
                        'insert into custom_field_values (`record_id`, `field_id`,`value`,`created_at`,`updated_at`) values (?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE `value` = VALUES(`value`),`updated_at` = VALUES(`updated_at`) ', [
                                                                                                                                                                                                                                    $RecordId,
                                                                                                                                                                                                                                    $fieldId,
                                                                                                                                                                                                                                    $value,
                                                                                                                                                                                                                                    date('Y-m-d H:i:s'),
                                                                                                                                                                                                                                    date('Y-m-d H:i:s'),
                                                                                                                                                                                                                                ]
                    );
                }
            }
        }
    }

    public static function getData($obj, $module)
    {
        // return 
        return \DB::table('custom_field_values')->select(
            [
                'custom_field_values.value',
                'custom_fields.id',
            ]
        )->join('custom_fields', 'custom_field_values.field_id', '=', 'custom_fields.id')->where('custom_fields.module_id', '=', $module)->where('record_id', '=', $obj->id)->get()->pluck('value', 'id');
        
    }
}
